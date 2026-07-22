<?php

namespace PeterAlaxin\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;

class BooleanFilter extends Filter
{
    protected string $type = 'boolean';

    /** @var array<string, string|null> */
    protected array $operatorKeys = [
        'is_true' => null,
        'is_false' => null,
        'is_null' => null,
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
            return $query->whereHas($this->relation, function ($q) use ($column, $operator) {
                $this->applyCondition($q, $column, $operator);
            });
        }

        return $this->applyCondition($query, $column, $operator);
    }

    /**
     * @param Builder<covariant \Illuminate\Database\Eloquent\Model> $query
     *
     * @return Builder<covariant \Illuminate\Database\Eloquent\Model>
     */
    protected function applyCondition(Builder $query, string $column, string $operator): Builder
    {
        return match ($operator) {
            'is_true' => $query->where($column, true),
            'is_false' => $query->where($column, false),
            'is_null' => $query->whereNull($column),
            default => $query,
        };
    }
}
