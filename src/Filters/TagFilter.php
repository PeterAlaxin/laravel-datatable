<?php

namespace PeterAlaxin\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;

class TagFilter extends SelectFilter
{
    protected bool $multiple = true;

    protected string $tagRelation = 'tags';

    protected string $tagKey = 'tags.id';

    /** @var array<string, string|null> */
    protected array $operatorKeys = [
        'in' => 'datatable::datatable.tag_in',
        'not_in' => 'datatable::datatable.tag_not_in',
    ];

    public function tagRelation(string $relation): static
    {
        $this->tagRelation = $relation;

        return $this;
    }

    public function tagKey(string $key): static
    {
        $this->tagKey = $key;

        return $this;
    }

    /**
     * @param Builder<covariant \Illuminate\Database\Eloquent\Model> $query
     *
     * @return Builder<covariant \Illuminate\Database\Eloquent\Model>
     */
    public function apply(Builder $query, string $operator, mixed $value): Builder
    {
        $tagIds = (array) $value;
        $tagRelation = $this->tagRelation;
        $tagKey = $this->tagKey;

        return match ($operator) {
            'in' => $query->whereHas($tagRelation, function ($q) use ($tagIds, $tagKey) {
                $q->whereIn($tagKey, $tagIds);
            }),
            'not_in' => $query->whereDoesntHave($tagRelation, function ($q) use ($tagIds, $tagKey) {
                $q->whereIn($tagKey, $tagIds);
            }),
            default => $query,
        };
    }
}
