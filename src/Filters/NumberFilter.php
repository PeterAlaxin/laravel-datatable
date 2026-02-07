<?php

namespace PeterAlaxin\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;

class NumberFilter extends Filter
{
    protected string $type = 'number';

    protected float $approximatePercent = 5.0;

    /** @var array<string, string|null> */
    protected array $operatorKeys = [
        'equals' => '=',
        'not_equals' => "\u{2260}",
        'greater_than' => null,
        'greater_or_equal' => null,
        'less_than' => null,
        'less_or_equal' => null,
        'between' => null,
        'approximately' => null,
        'is_empty' => null,
        'is_not_empty' => null,
    ];

    public function approximatePercent(float $percent): static
    {
        $this->approximatePercent = $percent;

        return $this;
    }

    /**
     * @param Builder<covariant \Illuminate\Database\Eloquent\Model> $query
     *
     * @return Builder<covariant \Illuminate\Database\Eloquent\Model>
     */
    public function apply(Builder $query, string $operator, mixed $value): Builder
    {
        $column = $this->column;

        if ($this->relation) {
            return $query->whereHas($this->relation, function ($q) use ($column, $operator, $value) {
                $this->applyCondition($q, $column, $operator, $value);
            });
        }

        return $this->applyCondition($query, $column, $operator, $value);
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
            'greater_than' => $query->where($column, '>', $value),
            'greater_or_equal' => $query->where($column, '>=', $value),
            'less_than' => $query->where($column, '<', $value),
            'less_or_equal' => $query->where($column, '<=', $value),
            'between' => $query->whereBetween($column, (array) $value),
            'approximately' => $this->applyApproximately($query, $column, $value),
            'is_empty' => $query->whereNull($column),
            'is_not_empty' => $query->whereNotNull($column),
            default => $query,
        };
    }

    /**
     * @param Builder<covariant \Illuminate\Database\Eloquent\Model> $query
     *
     * @return Builder<covariant \Illuminate\Database\Eloquent\Model>
     */
    protected function applyApproximately(Builder $query, string $column, mixed $value): Builder
    {
        $margin = abs((float) $value * ($this->approximatePercent / 100));

        return $query->whereBetween($column, [(float) $value - $margin, (float) $value + $margin]);
    }
}
