<?php

namespace PeterAlaxin\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;

class SelectFilter extends Filter
{
    protected string $type = 'select';

    /** @var array<int|string, string> */
    protected array $options = [];

    protected bool $multiple = false;

    /** @var (\Closure(Builder<covariant \Illuminate\Database\Eloquent\Model>, string, mixed): Builder<covariant \Illuminate\Database\Eloquent\Model>)|null */
    protected ?\Closure $queryUsing = null;

    /** @var array<string, string|null> */
    protected array $operatorKeys = [
        'equals' => 'datatable::datatable.is',
        'not_equals' => 'datatable::datatable.is_not',
        'in' => 'datatable::datatable.is_one_of',
        'not_in' => 'datatable::datatable.is_none_of',
    ];

    /**
     * @param array<int|string, string> $options
     */
    public function options(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function multiple(bool $multiple = true): static
    {
        $this->multiple = $multiple;

        return $this;
    }

    /**
     * @return array<int|string, string>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    public function isMultiple(): bool
    {
        return $this->multiple;
    }

    /**
     * @param \Closure(Builder<covariant \Illuminate\Database\Eloquent\Model>, string, mixed): Builder<covariant \Illuminate\Database\Eloquent\Model> $callback
     */
    public function queryUsing(\Closure $callback): static
    {
        $this->queryUsing = $callback;

        return $this;
    }

    /**
     * @param Builder<covariant \Illuminate\Database\Eloquent\Model> $query
     *
     * @return Builder<covariant \Illuminate\Database\Eloquent\Model>
     */
    public function apply(Builder $query, string $operator, mixed $value): Builder
    {
        if ($this->queryUsing) {
            return ($this->queryUsing)($query, $operator, $value);
        }

        $column = $this->column;

        if ($this->relation) {
            return $query->whereHas($this->relation, function ($q) use ($column, $operator, $value) {
                $this->applyCondition($q, $column, $operator, $value);
            });
        }

        return $this->applyCondition($query, $column, $operator, $value);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'options' => $this->options,
            'multiple' => $this->multiple,
        ]);
    }

    /**
     * @param Builder<covariant \Illuminate\Database\Eloquent\Model> $query
     *
     * @return Builder<covariant \Illuminate\Database\Eloquent\Model>
     */
    protected function applyCondition(Builder $query, string $column, string $operator, mixed $value): Builder
    {
        return match ($operator) {
            'equals' => $query->where($column, '=', $value),
            'not_equals' => $query->where($column, '!=', $value),
            'in' => $query->whereIn($column, (array) $value),
            'not_in' => $query->whereNotIn($column, (array) $value),
            default => $query,
        };
    }
}
