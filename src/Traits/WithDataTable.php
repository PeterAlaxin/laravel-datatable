<?php

namespace PeterAlaxin\DataTable\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use PeterAlaxin\DataTable\Columns\Column;
use PeterAlaxin\DataTable\Columns\RelationColumn;
use PeterAlaxin\DataTable\Filters\Filter;
use PeterAlaxin\DataTable\Models\SavedFilter;
use PeterAlaxin\DataTable\Models\TableSetting;
use RuntimeException;

trait WithDataTable
{
    use WithPagination;

    public string $sortColumn = '';

    public string $sortDirection = 'asc';

    public string $search = '';

    public int $perPage = 25;

    /**
     * @var array<int, array{column: string, operator: string, value: mixed}>
     */
    public array $activeFilters = [];

    /**
     * @var array<int, array{key: string, visible: bool, show_sum: bool}>
     */
    public array $columnSettings = [];

    public bool $showColumnSettings = false;

    public bool $showFilterBuilder = false;

    public bool $showSaveFilterModal = false;

    public string $newFilterName = '';

    public ?int $selectedSavedFilterId = null;

    /** @var array<int, int> */
    public array $selectedRows = [];

    public bool $selectAll = false;

    protected string $paginationTheme = 'bootstrap';

    /** @var Collection<int, Column>|null */
    protected ?Collection $cachedColumns = null;

    /** @var Collection<int, Filter>|null */
    protected ?Collection $cachedFilters = null;

    public function mountWithDataTable(): void
    {
        $this->perPage = config('datatable.default_per_page', 25);
        $this->loadColumnSettings();
        $this->initializeSort();
    }

    abstract public function getTableIdentifier(): string;

    public function getSettingsIdentifier(): string
    {
        return $this->getTableIdentifier();
    }

    /**
     * @return Collection<int, Column>
     */
    public function getColumns(): Collection
    {
        if ($this->cachedColumns === null) {
            $columns = collect($this->defineColumns());

            if (! empty($this->columnSettings)) {
                $order = collect($this->columnSettings)->pluck('key')->toArray();
                if (! empty($order)) {
                    $columns = $columns->sortBy(function (Column $column) use ($order) {
                        $pos = array_search($column->getKey(), $order);

                        return $pos === false ? 999 : $pos;
                    });
                }
            }

            $this->cachedColumns = $columns->values();
        }

        return $this->cachedColumns;
    }

    /**
     * @return Collection<int, Filter>
     */
    public function getFilters(): Collection
    {
        if ($this->cachedFilters === null) {
            $this->cachedFilters = collect($this->defineFilters());
        }

        return $this->cachedFilters;
    }

    /**
     * @return Collection<int, Column>
     */
    public function getVisibleColumns(): Collection
    {
        return $this->getColumns()->filter(function (Column $col) {
            $setting = collect($this->columnSettings)->firstWhere('key', $col->getKey());
            if ($setting) {
                return $setting['visible'];
            }

            return $col->isVisible();
        });
    }

    public function sortBy(string $column): void
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }

        $this->resetPage();
        $this->saveSettings();
    }

    public function addFilter(string $column, string $operator, mixed $value): void
    {
        $this->activeFilters[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
        ];
        $this->selectedSavedFilterId = null;
        $this->resetPage();
        $this->saveSettings();
    }

    public function removeFilter(int $index): void
    {
        unset($this->activeFilters[$index]);
        $this->activeFilters = array_values($this->activeFilters);
        $this->selectedSavedFilterId = null;
        $this->resetPage();
        $this->saveSettings();
    }

    public function clearFilters(): void
    {
        $this->activeFilters = [];
        $this->selectedSavedFilterId = null;
        $this->resetPage();
        $this->saveSettings();
    }

    /**
     * @return Collection<int, SavedFilter>
     */
    public function getSavedFilters(): Collection
    {
        return SavedFilter::where('user_id', Auth::id())
            ->where('table_identifier', $this->getSettingsIdentifier())
            ->orderBy('name')
            ->get();
    }

    public function saveNamedFilter(): void
    {
        $this->validate([
            'newFilterName' => 'required|string|max:100',
        ], [
            'newFilterName.required' => __('datatable::datatable.filter_name_required'),
            'newFilterName.max' => __('datatable::datatable.filter_name_max'),
        ]);

        if (empty($this->activeFilters)) {
            $this->dispatch('notify', type: 'warning', message: __('datatable::datatable.no_filters_to_save'));

            return;
        }

        $existingFilter = SavedFilter::where('user_id', Auth::id())
            ->where('table_identifier', $this->getSettingsIdentifier())
            ->where('name', $this->newFilterName)
            ->first();

        $savedFilter = SavedFilter::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'table_identifier' => $this->getSettingsIdentifier(),
                'name' => $this->newFilterName,
            ],
            [
                'filters' => $this->activeFilters,
            ],
        );

        $this->selectedSavedFilterId = $savedFilter->id;
        $this->newFilterName = '';
        $this->showSaveFilterModal = false;

        if ($existingFilter) {
            $this->dispatch('notify', type: 'success', message: __('datatable::datatable.filter_updated'));
        } else {
            $this->dispatch('notify', type: 'success', message: __('datatable::datatable.filter_saved'));
        }
    }

    public function loadSavedFilter(int $filterId): void
    {
        $savedFilter = SavedFilter::where('id', $filterId)
            ->where('user_id', Auth::id())
            ->where('table_identifier', $this->getSettingsIdentifier())
            ->first();

        if ($savedFilter) {
            /** @var array<int, array{column: string, operator: string, value: mixed}> $filters */
            $filters = $savedFilter->filters;
            $this->activeFilters = $filters;
            $this->selectedSavedFilterId = $filterId;
            $this->resetPage();
            $this->saveSettings();
        }
    }

    #[On('deleteSavedFilter')]
    public function deleteSavedFilter(int $filterId): void
    {
        SavedFilter::where('id', $filterId)
            ->where('user_id', Auth::id())
            ->where('table_identifier', $this->getSettingsIdentifier())
            ->delete();

        if ($this->selectedSavedFilterId === $filterId) {
            $this->selectedSavedFilterId = null;
        }

        $this->dispatch('notify', type: 'success', message: __('datatable::datatable.filter_deleted'));
    }

    /**
     * @param array<int, array{key: string, visible: bool, show_sum: bool}> $settings
     */
    public function updateColumnSettings(array $settings): void
    {
        $this->columnSettings = $settings;
        $this->cachedColumns = null;
        $this->saveSettings();
    }

    public function toggleColumnVisibility(string $key): void
    {
        $found = false;
        foreach ($this->columnSettings as &$setting) {
            if ($setting['key'] === $key) {
                $setting['visible'] = ! $setting['visible'];
                $found = true;
                break;
            }
        }

        if (! $found) {
            $column = collect($this->defineColumns())->first(fn($col) => $col->getKey() === $key);
            if ($column) {
                $this->columnSettings[] = [
                    'key' => $key,
                    'visible' => ! $column->isVisible(),
                    'show_sum' => false,
                ];
            }
        }

        $this->cachedColumns = null;
        $this->saveSettings();
    }

    /**
     * @param array<int, string> $order
     */
    public function reorderColumns(array $order): void
    {
        $newSettings = [];
        foreach ($order as $key) {
            $setting = collect($this->columnSettings)->firstWhere('key', $key);
            if ($setting) {
                $newSettings[] = $setting;
            } else {
                $newSettings[] = [
                    'key' => $key,
                    'visible' => true,
                    'show_sum' => false,
                ];
            }
        }
        $this->columnSettings = $newSettings;
        $this->cachedColumns = null;
        $this->saveSettings();
    }

    public function toggleColumnSum(string $key): void
    {
        foreach ($this->columnSettings as &$setting) {
            if ($setting['key'] === $key) {
                $setting['show_sum'] = ! $setting['show_sum'];
                break;
            }
        }
        $this->saveSettings();
    }

    /**
     * @return LengthAwarePaginator<int, \Illuminate\Database\Eloquent\Model>
     */
    public function getData(): LengthAwarePaginator
    {
        $query = $this->baseQuery();

        $relations = $this->getColumns()
            ->filter(fn(Column $col) => $col->getRelation() !== null)
            ->map(fn(Column $col) => $col->getRelation())
            ->filter()
            ->unique()
            ->toArray();

        if (! empty($relations)) {
            $query->with($relations);
        }

        if ($this->search) {
            $searchableColumns = $this->getColumns()
                ->filter(fn(Column $col) => $col->isSearchable());

            if ($searchableColumns->isNotEmpty()) {
                $search = $this->search;
                $query->where(function ($q) use ($searchableColumns, $search) {
                    foreach ($searchableColumns as $column) {
                        if ($column instanceof RelationColumn) {
                            $q->orWhereHas($column->getRelationName(), function ($relQuery) use ($column, $search) {
                                $relQuery->where($column->getRelationColumn(), 'LIKE', "%{$search}%");
                            });
                        } else {
                            $q->orWhere($column->getKey(), 'LIKE', "%{$search}%");
                        }
                    }
                });
            }
        }

        $negativeOperators = ['not_equals', 'not_contains', 'is_not_empty'];
        $groupedFilters = collect($this->activeFilters)->groupBy('column');

        foreach ($groupedFilters as $column => $columnFilters) {
            $filterDef = $this->getFilters()->first(fn(Filter $f) => $f->getColumn() === $column);
            if ($filterDef) {
                if ($columnFilters->count() === 1) {
                    $filter = $columnFilters->first();
                    if ($filter !== null) {
                        $query = $filterDef->apply($query, $filter['operator'], $filter['value']);
                    }
                } else {
                    $allNegative = $columnFilters->every(fn($f) => in_array($f['operator'], $negativeOperators));

                    if ($allNegative) {
                        foreach ($columnFilters as $filter) {
                            $query = $filterDef->apply($query, $filter['operator'], $filter['value']);
                        }
                    } else {
                        $query->where(function ($q) use ($columnFilters, $filterDef) {
                            foreach ($columnFilters as $index => $filter) {
                                $method = $index === 0 ? 'where' : 'orWhere';
                                $q->$method(function ($subQ) use ($filter, $filterDef) {
                                    $filterDef->apply($subQ, $filter['operator'], $filter['value']);
                                });
                            }
                        });
                    }
                }
            }
        }

        if ($this->sortColumn) {
            $column = $this->getColumns()->first(fn(Column $c) => $c->getKey() === $this->sortColumn);
            if ($column && $column->isSortable()) {
                $query->reorder();
                if ($column->hasSortUsing()) {
                    /** @phpstan-ignore argument.type */
                    $query = $column->applySortUsing($query, $this->sortDirection);
                } elseif ($column instanceof RelationColumn) {
                    $relationName = $column->getRelationName();
                    $relationColumn = $column->getRelationColumn();
                    $model = $query->getModel();
                    $relation = $model->{$relationName}();

                    if ($relation instanceof \Illuminate\Database\Eloquent\Relations\BelongsTo) {
                        $relatedTable = $relation->getRelated()->getTable();
                        $foreignKey = $relation->getForeignKeyName();
                        $ownerKey = $relation->getOwnerKeyName();

                        $query->orderBy(
                            $relation->getRelated()->newQuery()
                                ->select($relationColumn)
                                ->whereColumn(
                                    $relatedTable.'.'.$ownerKey,
                                    $model->getTable().'.'.$foreignKey,
                                )
                                ->limit(1),
                            $this->sortDirection,
                        );
                    }
                } else {
                    $query->orderBy($this->sortColumn, $this->sortDirection);
                }
            }
        }

        return $query->paginate($this->perPage);
    }

    /**
     * @return array<string, float|int|string>
     */
    public function getSums(): array
    {
        $sums = [];

        $summableColumns = $this->getColumns()
            ->filter(fn(Column $col) => $col->isSummable());

        $negativeOperators = ['not_equals', 'not_contains', 'is_not_empty'];

        foreach ($summableColumns as $column) {
            $setting = collect($this->columnSettings)->firstWhere('key', $column->getKey());
            if ($setting && $setting['show_sum']) {
                $query = $this->baseQuery();
                $groupedFilters = collect($this->activeFilters)->groupBy('column');
                foreach ($groupedFilters as $filterColumn => $columnFilters) {
                    $filterDef = $this->getFilters()->first(fn(Filter $f) => $f->getColumn() === $filterColumn);
                    if ($filterDef) {
                        if ($columnFilters->count() === 1) {
                            $filter = $columnFilters->first();
                            if ($filter !== null) {
                                $query = $filterDef->apply($query, $filter['operator'], $filter['value']);
                            }
                        } else {
                            $allNegative = $columnFilters->every(fn($f) => in_array($f['operator'], $negativeOperators));

                            if ($allNegative) {
                                foreach ($columnFilters as $filter) {
                                    $query = $filterDef->apply($query, $filter['operator'], $filter['value']);
                                }
                            } else {
                                $query->where(function ($q) use ($columnFilters, $filterDef) {
                                    foreach ($columnFilters as $index => $filter) {
                                        $method = $index === 0 ? 'where' : 'orWhere';
                                        $q->$method(function ($subQ) use ($filter, $filterDef) {
                                            $filterDef->apply($subQ, $filter['operator'], $filter['value']);
                                        });
                                    }
                                });
                            }
                        }
                    }
                }

                if ($column->hasSumUsing()) {
                    $callback = $column->getSumUsing();
                    if ($callback) {
                        $sums[$column->getKey()] = $callback($query->get());
                    }
                } else {
                    $sums[$column->getKey()] = $query->sum($column->getKey());
                }
            }
        }

        return $sums;
    }

    public function getExportFilename(): string
    {
        return $this->getTableIdentifier();
    }

    public function exportToCsv(): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $filename = $this->getExportFilename().'_'.date('Y-m-d_H-i-s').'.csv';
        $csvSeparator = config('datatable.csv_separator', ';');

        return response()->streamDownload(function () use ($csvSeparator) {
            $handle = fopen('php://output', 'w');
            if ($handle === false) {
                throw new RuntimeException('Failed to open output stream for CSV export');
            }

            fwrite($handle, "\xEF\xBB\xBF");

            $columns = $this->getVisibleColumns();
            $headers = $columns->map(fn(Column $col) => $col->getLabel())->toArray();
            fputcsv($handle, $headers, $csvSeparator);

            $query = $this->baseQuery();

            $relations = $this->getColumns()
                ->filter(fn(Column $col) => $col->getRelation() !== null)
                ->map(fn(Column $col) => $col->getRelation())
                ->filter()
                ->unique()
                ->toArray();

            if (! empty($relations)) {
                $query->with($relations);
            }

            if ($this->search) {
                $searchableColumns = $this->getColumns()
                    ->filter(fn(Column $col) => $col->isSearchable());

                if ($searchableColumns->isNotEmpty()) {
                    $search = $this->search;
                    $query->where(function ($q) use ($searchableColumns, $search) {
                        foreach ($searchableColumns as $column) {
                            if ($column instanceof RelationColumn) {
                                $q->orWhereHas($column->getRelationName(), function ($relQuery) use ($column, $search) {
                                    $relQuery->where($column->getRelationColumn(), 'LIKE', "%{$search}%");
                                });
                            } else {
                                $q->orWhere($column->getKey(), 'LIKE', "%{$search}%");
                            }
                        }
                    });
                }
            }

            $negativeOperators = ['not_equals', 'not_contains', 'is_not_empty'];
            $groupedFilters = collect($this->activeFilters)->groupBy('column');

            foreach ($groupedFilters as $filterColumn => $columnFilters) {
                $filterDef = $this->getFilters()->first(fn(Filter $f) => $f->getColumn() === $filterColumn);
                if ($filterDef) {
                    if ($columnFilters->count() === 1) {
                        $filter = $columnFilters->first();
                        if ($filter !== null) {
                            $query = $filterDef->apply($query, $filter['operator'], $filter['value']);
                        }
                    } else {
                        $allNegative = $columnFilters->every(fn($f) => in_array($f['operator'], $negativeOperators));

                        if ($allNegative) {
                            foreach ($columnFilters as $filter) {
                                $query = $filterDef->apply($query, $filter['operator'], $filter['value']);
                            }
                        } else {
                            $query->where(function ($q) use ($columnFilters, $filterDef) {
                                foreach ($columnFilters as $index => $filter) {
                                    $method = $index === 0 ? 'where' : 'orWhere';
                                    $q->$method(function ($subQ) use ($filter, $filterDef) {
                                        $filterDef->apply($subQ, $filter['operator'], $filter['value']);
                                    });
                                }
                            });
                        }
                    }
                }
            }

            if ($this->sortColumn) {
                $column = $this->getColumns()->first(fn(Column $c) => $c->getKey() === $this->sortColumn);
                if ($column && $column->isSortable() && ! $column->getRelation()) {
                    $query->reorder()->orderBy($this->sortColumn, $this->sortDirection);
                }
            }

            foreach ($query->cursor() as $row) {
                $rowData = [];
                foreach ($columns as $column) {
                    $value = data_get($row, $column->getKey());
                    $formatted = $column->format($value, $row);

                    if (is_string($formatted)) {
                        $formatted = strip_tags($formatted);
                        $formatted = html_entity_decode($formatted, ENT_QUOTES, 'UTF-8');
                    }

                    $rowData[] = $formatted;
                }
                fputcsv($handle, $rowData, $csvSeparator);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    public function toggleSelectAll(): void
    {
        if ($this->selectAll) {
            $this->selectedRows = [];
            $this->selectAll = false;
        } else {
            $this->selectedRows = $this->getData()->pluck('id')->toArray();
            $this->selectAll = true;
        }
    }

    public function toggleRowSelection(int $id): void
    {
        if (in_array($id, $this->selectedRows)) {
            $this->selectedRows = array_values(array_diff($this->selectedRows, [$id]));
        } else {
            $this->selectedRows[] = $id;
        }
        $this->selectAll = false;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
        $this->saveSettings();
    }

    public function getRowUrl(\Illuminate\Database\Eloquent\Model $row): ?string
    {
        return null;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model|null $row
     *
     * @return array<int, array{method: string, label: string, icon: string, color?: string}>
     */
    public function rowActions($row = null): array
    {
        return [];
    }

    /**
     * @return array<int, array{method: string, label: string, icon?: string}>
     */
    public function bulkActions(): array
    {
        return [];
    }

    /**
     * Render extra modals from project-specific tables.
     * Override in concrete table classes to add custom modals.
     */
    public function renderExtraModals(): string
    {
        return '';
    }

    /**
     * @return array<int, Column>
     */
    abstract protected function defineColumns(): array;

    /**
     * @return array<int, Filter>
     */
    abstract protected function defineFilters(): array;

    /**
     * @return \Illuminate\Database\Eloquent\Builder<covariant \Illuminate\Database\Eloquent\Model>
     */
    abstract protected function baseQuery(): \Illuminate\Database\Eloquent\Builder;

    protected function loadColumnSettings(): void
    {
        $columnSetting = TableSetting::where('user_id', Auth::id())
            ->where('table_identifier', $this->getSettingsIdentifier())
            ->first();

        if ($columnSetting) {
            /** @var array<int, array{key: string, visible: bool, show_sum: bool}> $columns */
            $columns = $columnSetting->columns ?? [];
            $this->columnSettings = $columns;
            $this->perPage = $columnSetting->per_page ?? config('datatable.default_per_page', 25);

            if ($columnSetting->sort_column) {
                $this->sortColumn = $columnSetting->sort_column;
                $this->sortDirection = $columnSetting->sort_direction ?? 'asc';
            }
        } else {
            $this->columnSettings = collect($this->defineColumns())
                ->map(fn(Column $col) => [
                    'key' => $col->getKey(),
                    'visible' => $col->isVisible(),
                    'show_sum' => false,
                ])
                ->toArray();
        }

        if ($this->getTableIdentifier() !== $this->getSettingsIdentifier()) {
            $filterSetting = TableSetting::where('user_id', Auth::id())
                ->where('table_identifier', $this->getTableIdentifier())
                ->first();

            if ($filterSetting) {
                if ($filterSetting->filters) {
                    /** @var array<int, array{column: string, operator: string, value: mixed}> $filters */
                    $filters = $filterSetting->filters;
                    $this->activeFilters = $filters;
                }
                $this->selectedSavedFilterId = $filterSetting->selected_saved_filter_id;
            }
        } elseif ($columnSetting) {
            if ($columnSetting->filters) {
                /** @var array<int, array{column: string, operator: string, value: mixed}> $filters */
                $filters = $columnSetting->filters;
                $this->activeFilters = $filters;
            }
            $this->selectedSavedFilterId = $columnSetting->selected_saved_filter_id;
        }
    }

    protected function saveSettings(): void
    {
        TableSetting::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'table_identifier' => $this->getSettingsIdentifier(),
            ],
            [
                'columns' => $this->columnSettings,
                'filters' => $this->getTableIdentifier() === $this->getSettingsIdentifier() ? $this->activeFilters : null,
                'sort_column' => $this->sortColumn,
                'sort_direction' => $this->sortDirection,
                'per_page' => $this->perPage,
                'selected_saved_filter_id' => $this->getTableIdentifier() === $this->getSettingsIdentifier() ? $this->selectedSavedFilterId : null,
            ],
        );

        if ($this->getTableIdentifier() !== $this->getSettingsIdentifier()) {
            TableSetting::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'table_identifier' => $this->getTableIdentifier(),
                ],
                [
                    'filters' => $this->activeFilters,
                    'selected_saved_filter_id' => $this->selectedSavedFilterId,
                ],
            );
        }
    }

    protected function initializeSort(): void
    {
        if (empty($this->sortColumn)) {
            $firstSortable = $this->getColumns()->first(fn(Column $col) => $col->isSortable());
            if ($firstSortable) {
                $this->sortColumn = $firstSortable->getKey();
            }
        }
    }
}
