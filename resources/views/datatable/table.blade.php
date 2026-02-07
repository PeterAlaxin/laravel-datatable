<div>
    <style>
        .datatable-zebra tbody tr:nth-child(odd) {
            background-color: #fff;
        }
        .datatable-zebra tbody tr:nth-child(even) {
            background-color: #f1f5f9;
        }
        [data-bs-theme="dark"] .datatable-zebra tbody tr:nth-child(odd) {
            background-color: var(--tblr-bg-surface);
        }
        [data-bs-theme="dark"] .datatable-zebra tbody tr:nth-child(even) {
            background-color: var(--tblr-bg-surface-secondary);
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .icon-spin {
            animation: spin 1s linear infinite;
        }
        .datatable-row-clickable {
            cursor: pointer;
        }
        .datatable-row-clickable:hover {
            background-color: rgba(var(--tblr-primary-rgb), 0.04) !important;
        }
        .saved-filter-item:hover {
            background-color: var(--tblr-bg-surface-secondary);
        }
    </style>

    {{-- Header s vyhľadávaním a akciami --}}
    <div class="mb-2">
        <div class="d-flex align-items-center">
            <div class="row align-items-center w-100 g-2">
                {{-- Vyhľadávanie --}}
                <div class="col-auto">
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <i class="ti ti-search"></i>
                        </span>
                        <input type="text"
                               class="form-control"
                               placeholder="{{ __('datatable::datatable.search') }}"
                               wire:model.live.debounce.300ms="search">
                    </div>
                </div>

                {{-- Aktívne filtre --}}
                <div class="col">
                    @include('datatable::datatable.filters.active-filters')
                </div>

                {{-- Akcie --}}
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        {{-- Saved Filters Dropdown --}}
                        @php $savedFilters = $this->getSavedFilters(); @endphp
                        @if($savedFilters->count() > 0)
                            <div class="dropdown">
                                <button type="button"
                                        class="btn btn-ghost-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    @if($selectedSavedFilterId)
                                        @php $currentSavedFilter = $savedFilters->firstWhere('id', $selectedSavedFilterId); @endphp
                                        <i class="ti ti-filter-star me-1"></i>
                                        {{ $currentSavedFilter?->name ?? __('datatable::datatable.saved_filters') }}
                                    @else
                                        <i class="ti ti-filter-star me-1"></i>
                                        {{ __('datatable::datatable.saved_filters') }}
                                    @endif
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @foreach($savedFilters as $savedFilter)
                                        <li class="d-flex align-items-center saved-filter-item" @if($selectedSavedFilterId === $savedFilter->id) style="background-color: var(--tblr-bg-surface-secondary);" @endif>
                                            <a href="#"
                                               class="dropdown-item flex-grow-1"
                                               wire:click.prevent="loadSavedFilter({{ $savedFilter->id }})">
                                                {{ $savedFilter->name }}
                                                <small class="text-muted ms-2">({{ count($savedFilter->filters) }})</small>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-sm btn-ghost-danger p-1 me-2"
                                                    onclick="window.dispatchEvent(new CustomEvent('open-confirm-modal', { detail: { title: '{{ __('datatable::datatable.delete_filter') }}', message: '{{ __('datatable::datatable.confirm_delete_filter') }}', onConfirmEmit: 'deleteSavedFilter', onConfirmParams: { filterId: {{ $savedFilter->id }} }, confirmText: '{{ __('datatable::datatable.delete') }}', confirmColor: 'danger', icon: 'ti-trash' } })); return false;"
                                                    title="{{ __('datatable::datatable.delete') }}">
                                                <i class="ti ti-trash fs-4"></i>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Clear filters button --}}
                        @if(count($activeFilters) > 0)
                            <button type="button"
                                    class="btn btn-ghost-danger btn-icon"
                                    wire:click="clearFilters"
                                    title="{{ __('datatable::datatable.clear_filter') }}">
                                <i class="ti ti-x fs-2"></i>
                            </button>
                        @endif

                        {{-- Filter button --}}
                        <button type="button"
                                class="btn btn-ghost-secondary btn-icon position-relative"
                                wire:click="$toggle('showFilterBuilder')"
                                title="{{ __('datatable::datatable.filter') }}">
                            <i class="ti ti-filter fs-2"></i>
                            @if(count($activeFilters) > 0)
                                <span class="badge bg-primary text-white badge-notification badge-pill badge-filter-count">{{ count($activeFilters) }}</span>
                            @endif
                        </button>

                        {{-- Refresh button --}}
                        <button type="button"
                                class="btn btn-ghost-secondary btn-icon"
                                wire:click="$refresh"
                                wire:loading.attr="disabled"
                                title="{{ __('datatable::datatable.refresh') }}">
                            <i class="ti ti-refresh fs-2" wire:loading.class="icon-spin"></i>
                        </button>

                        {{-- Export CSV button --}}
                        <button type="button"
                                class="btn btn-ghost-secondary btn-icon"
                                wire:click="exportToCsv"
                                wire:loading.attr="disabled"
                                title="{{ __('datatable::datatable.export_csv') }}">
                            <i class="ti ti-file-export fs-2"></i>
                        </button>

                        {{-- Column settings --}}
                        <button type="button"
                                class="btn btn-ghost-secondary btn-icon"
                                wire:click="$toggle('showColumnSettings')"
                                title="{{ __('datatable::datatable.column_settings') }}">
                            <i class="ti ti-settings fs-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabuľka --}}
        <div class="table-responsive border rounded">
            <table class="table table-vcenter table-hover table-borderless mb-0 datatable-zebra">
                <thead style="border-bottom: 1px solid var(--tblr-border-color);">
                    <tr style="--tblr-table-bg: transparent; background: transparent !important;">
                        {{-- Column headers --}}
                        @foreach($columns as $column)
                            <th class="@if($column->getAlignment() !== 'left') text-{{ $column->getAlignment() }} @endif"
                                style="background: transparent !important;@if($column->getWidth()) width: {{ $column->getWidth() }}px;@endif">
                                @if($column->isSortable())
                                    <a href="#"
                                       class="table-sort @if($sortColumn === $column->getKey()) {{ $sortDirection === 'asc' ? 'asc' : 'desc' }} @endif"
                                       wire:click.prevent="sortBy('{{ $column->getKey() }}')">
                                        {{ $column->getLabel() }}
                                    </a>
                                @else
                                    {{ $column->getLabel() }}
                                @endif
                            </th>
                        @endforeach

                        {{-- Row actions column --}}
                        @if(count($this->rowActions()) > 0)
                            <th class="w-1" style="background: transparent !important;"></th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $row)
                        @php
                            $rowUrl = $this->getRowUrl($row);
                            $rowClickAction = method_exists($this, 'getRowClickAction') ? $this->getRowClickAction($row) : null;
                        @endphp
                        <tr wire:key="row-{{ $row->id }}"
                            @if($rowUrl)
                                class="datatable-row-clickable"
                                onclick="window.location.href='{{ $rowUrl }}'"
                            @elseif($rowClickAction)
                                class="datatable-row-clickable"
                                wire:click="{{ $rowClickAction }}"
                            @endif
                        >
                            {{-- Cell values --}}
                            @foreach($columns as $column)
                                <td class="@if($column->getAlignment() !== 'left') text-{{ $column->getAlignment() }} @endif">
                                    @include('datatable::datatable.partials.cell', [
                                        'column' => $column,
                                        'value' => data_get($row, $column->getKey()),
                                        'row' => $row,
                                    ])
                                </td>
                            @endforeach

                            {{-- Row actions --}}
                            @if(count($this->rowActions()) > 0)
                                <td>
                                    @php $rowActions = $this->rowActions($row); @endphp
                                    @if(count($rowActions) > 0)
                                        <div class="btn-list flex-nowrap">
                                            @foreach($rowActions as $action)
                                                @php
                                                    $btnClass = 'btn-outline-' . ($action['color'] ?? 'secondary');
                                                    $confirmMessage = $action['confirm'] ?? null;
                                                @endphp
                                                @if(isset($action['url']))
                                                    <a href="{{ $action['url'] }}"
                                                       class="btn btn-sm {{ $btnClass }}"
                                                       title="{{ $action['label'] }}"
                                                       onclick="event.stopPropagation()">
                                                        <i class="ti ti-{{ $action['icon'] }} fs-3"></i>
                                                    </a>
                                                @elseif($confirmMessage)
                                                    <a href="#"
                                                       class="btn btn-sm {{ $btnClass }}"
                                                       onclick="event.stopPropagation(); window.dispatchEvent(new CustomEvent('open-confirm-modal', { detail: { title: '{{ $action['label'] }}', message: '{{ addslashes($confirmMessage) }}', onConfirmEmit: '{{ $action['method'] }}Confirmed', onConfirmParams: { id: {{ $row->id }} }, confirmText: '{{ $action['label'] }}', confirmColor: '{{ $action['color'] ?? 'danger' }}', icon: 'ti-{{ $action['icon'] }}' } })); return false;"
                                                       title="{{ $action['label'] }}">
                                                        <i class="ti ti-{{ $action['icon'] }} fs-3"></i>
                                                    </a>
                                                @else
                                                    <a href="#"
                                                       class="btn btn-sm {{ $btnClass }}"
                                                       wire:click.prevent="{{ $action['method'] }}({{ $row->id }})"
                                                       onclick="event.stopPropagation()"
                                                       title="{{ $action['label'] }}">
                                                        <i class="ti ti-{{ $action['icon'] }} fs-3"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($columns) + (count($this->rowActions()) > 0 ? 1 : 0) }}">
                                @include('datatable::datatable.partials.empty')
                            </td>
                        </tr>
                    @endforelse
                </tbody>

                {{-- Footer so súčtami --}}
                @if(!empty($sums))
                    <tfoot style="border-top: 1px solid var(--tblr-border-color);">
                        <tr>
                            @foreach($columns as $column)
                                <td class="@if($column->getAlignment() !== 'left') text-{{ $column->getAlignment() }} @endif fw-bold" style="background: transparent !important;">
                                    @if(isset($sums[$column->getKey()]))
                                        {{ $column->format($sums[$column->getKey()], null) }}
                                    @endif
                                </td>
                            @endforeach
                            @if(count($this->rowActions()) > 0)
                                <td style="background: transparent !important;"></td>
                            @endif
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>

    {{-- Pagination --}}
    <div class="d-flex align-items-center justify-content-between mt-3">
        <p class="m-0 text-muted">
            {{ __('datatable::datatable.showing', [
                'from' => $data->firstItem() ?? 0,
                'to' => $data->lastItem() ?? 0,
                'total' => $data->total(),
            ]) }}
        </p>

        {{-- Pagination links --}}
        <div>
            {{ $data->links(config('datatable.pagination_view', 'vendor.livewire.simple')) }}
        </div>

        {{-- Per page selector --}}
        <select class="form-select form-select-sm"
                style="width: auto;"
                wire:model.live="perPage">
            @foreach(config('datatable.per_page_options', [10, 25, 50, 100]) as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>

    {{-- Column Settings Modal --}}
    @if($showColumnSettings)
        @include('datatable::datatable.modals.column-settings')
    @endif

    {{-- Filter Builder Modal --}}
    @if($showFilterBuilder)
        @include('datatable::datatable.modals.filter-builder')
    @endif

    {{-- Extra modals from project-specific tables --}}
    {!! $this->renderExtraModals() !!}
</div>
