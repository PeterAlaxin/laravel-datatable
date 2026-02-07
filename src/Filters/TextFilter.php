<?php

namespace PeterAlaxin\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;

class TextFilter extends Filter
{
    protected string $type = 'text';

    /** @var array<string, string|null> */
    protected array $operatorKeys = [
        'contains' => null,
        'starts_with' => null,
        'ends_with' => null,
        'equals' => null,
        'not_equals' => null,
        'not_contains' => null,
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
            'contains' => $query->where($column, 'LIKE', "%{$value}%"),
            'starts_with' => $query->where($column, 'LIKE', "{$value}%"),
            'ends_with' => $query->where($column, 'LIKE', "%{$value}"),
            'equals' => $query->where($column, '=', $value),
            'not_equals' => $query->where($column, '!=', $value),
            'not_contains' => $query->where($column, 'NOT LIKE', "%{$value}%"),
            'is_empty' => $query->where(fn($q) => $q->whereNull($column)->orWhere($column, '')),
            'is_not_empty' => $query->where(fn($q) => $q->whereNotNull($column)->where($column, '!=', '')),
            default => $query,
        };
    }
}
