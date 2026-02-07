<?php

namespace PeterAlaxin\DataTable\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    protected string $column;

    protected string $label;

    protected string $type;

    protected ?string $relation = null;

    /** @var array<string, string|null> Operator keys mapped to their translation keys or static labels */
    protected array $operatorKeys = [];

    public function __construct(string $column, ?string $label = null)
    {
        $this->column = $column;
        $this->label = $label ?? ucfirst(str_replace('_', ' ', $column));
    }

    public static function make(string $column, ?string $label = null): static
    {
        /** @phpstan-ignore new.static */
        return new static($column, $label);
    }

    public function relation(string $relation): static
    {
        $this->relation = $relation;

        return $this;
    }

    public function getColumn(): string
    {
        return $this->column;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array<string, string>
     */
    public function getOperators(): array
    {
        $operators = [];
        foreach ($this->operatorKeys as $key => $translationKey) {
            // If translationKey is null, use the key itself as translation key
            // If translationKey doesn't start with 'datatable::', it's a static label (like '=' or '≠')
            if ($translationKey === null) {
                $operators[$key] = __('datatable::datatable.'.$key);
            } elseif (!str_starts_with($translationKey, 'datatable::')) {
                $operators[$key] = $translationKey;
            } else {
                $operators[$key] = __($translationKey);
            }
        }

        return $operators;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    /**
     * @param Builder<covariant \Illuminate\Database\Eloquent\Model> $query
     *
     * @return Builder<covariant \Illuminate\Database\Eloquent\Model>
     */
    abstract public function apply(Builder $query, string $operator, mixed $value): Builder;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'column' => $this->column,
            'label' => $this->label,
            'type' => $this->type,
            'operators' => $this->getOperators(),
            'relation' => $this->relation,
        ];
    }
}
