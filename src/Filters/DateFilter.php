<?php

namespace PeterAlaxin\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;

class DateFilter extends Filter
{
    protected string $type = 'date';

    /** @var array<string, string|null> */
    protected array $operatorKeys = [
        'equals' => null,
        'before' => null,
        'after' => null,
        'between' => null,
        'today' => null,
        'yesterday' => null,
        'this_week' => null,
        'last_week' => null,
        'this_month' => null,
        'last_month' => null,
        'this_year' => null,
        'is_empty' => null,
        'is_not_empty' => null,
    ];

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
            'equals' => $query->whereDate($column, '=', $value),
            'before' => $query->whereDate($column, '<', $value),
            'after' => $query->whereDate($column, '>', $value),
            'between' => $query->whereBetween($column, (array) $value),
            'today' => $query->whereDate($column, today()),
            'yesterday' => $query->whereDate($column, today()->subDay()),
            'this_week' => $query->whereBetween($column, [now()->startOfWeek(), now()->endOfWeek()]),
            'last_week' => $query->whereBetween($column, [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]),
            'this_month' => $query->whereBetween($column, [now()->startOfMonth(), now()->endOfMonth()]),
            'last_month' => $query->whereBetween($column, [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]),
            'this_year' => $query->whereBetween($column, [now()->startOfYear(), now()->endOfYear()]),
            'is_empty' => $query->whereNull($column),
            'is_not_empty' => $query->whereNotNull($column),
            default => $query,
        };
    }
}
