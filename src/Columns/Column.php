<?php

namespace PeterAlaxin\DataTable\Columns;

use Closure;

abstract class Column
{
    protected string $key;

    protected string $label;

    protected string $type;

    protected bool $sortable = true;

    protected bool $searchable = false;

    protected bool $summable = false;

    protected bool $visible = true;

    protected ?string $relation = null;

    protected ?Closure $formatUsing = null;

    protected ?Closure $hintUsing = null;

    protected ?Closure $linkUsing = null;

    protected ?Closure $sumUsing = null;

    protected ?Closure $sortUsing = null;

    protected int $width = 0;

    protected string $alignment = 'left';

    protected bool $html = false;

    public function __construct(string $key, ?string $label = null)
    {
        $this->key = $key;
        $this->label = $label ?? ucfirst(str_replace('_', ' ', $key));
    }

    public static function make(string $key, ?string $label = null): static
    {
        /** @phpstan-ignore new.static */
        return new static($key, $label);
    }

    public function sortable(bool $sortable = true): static
    {
        $this->sortable = $sortable;

        return $this;
    }

    public function searchable(bool $searchable = true): static
    {
        $this->searchable = $searchable;

        return $this;
    }

    public function summable(bool $summable = true): static
    {
        $this->summable = $summable;

        return $this;
    }

    public function relation(string $relation): static
    {
        $this->relation = $relation;

        return $this;
    }

    public function formatUsing(Closure $callback): static
    {
        $this->formatUsing = $callback;

        return $this;
    }

    public function hintUsing(Closure $callback): static
    {
        $this->hintUsing = $callback;

        return $this;
    }

    public function hasHint(): bool
    {
        return $this->hintUsing !== null;
    }

    public function getHint(mixed $value, mixed $row): ?string
    {
        if ($this->hintUsing) {
            return ($this->hintUsing)($value, $row);
        }

        return null;
    }

    public function linkUsing(Closure $callback): static
    {
        $this->linkUsing = $callback;

        return $this;
    }

    public function hasLink(): bool
    {
        return $this->linkUsing !== null;
    }

    public function getLink(mixed $row): ?string
    {
        if ($this->linkUsing) {
            return ($this->linkUsing)($row);
        }

        return null;
    }

    public function sumUsing(Closure $callback): static
    {
        $this->sumUsing = $callback;

        return $this;
    }

    public function hasSumUsing(): bool
    {
        return $this->sumUsing !== null;
    }

    public function getSumUsing(): ?Closure
    {
        return $this->sumUsing;
    }

    public function sortUsing(Closure $callback): static
    {
        $this->sortUsing = $callback;
        $this->sortable = true;

        return $this;
    }

    public function hasSortUsing(): bool
    {
        return $this->sortUsing !== null;
    }

    /**
     * @template TModel of \Illuminate\Database\Eloquent\Model
     *
     * @param \Illuminate\Database\Eloquent\Builder<TModel> $query
     *
     * @return \Illuminate\Database\Eloquent\Builder<TModel>
     */
    public function applySortUsing(\Illuminate\Database\Eloquent\Builder $query, string $direction): \Illuminate\Database\Eloquent\Builder
    {
        /** @var Closure $sortUsing */
        $sortUsing = $this->sortUsing;

        return $sortUsing($query, $direction);
    }

    public function width(int $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function alignRight(): static
    {
        $this->alignment = 'right';

        return $this;
    }

    public function alignCenter(): static
    {
        $this->alignment = 'center';

        return $this;
    }

    public function hidden(): static
    {
        $this->visible = false;

        return $this;
    }

    public function allowHtml(bool $html = true): static
    {
        $this->html = $html;

        return $this;
    }

    public function isHtml(): bool
    {
        return $this->html;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function isSortable(): bool
    {
        return $this->sortable;
    }

    public function isSearchable(): bool
    {
        return $this->searchable;
    }

    public function isSummable(): bool
    {
        return $this->summable;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function isVisible(): bool
    {
        return $this->visible;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getAlignment(): string
    {
        return $this->alignment;
    }

    public function format(mixed $value, mixed $row): mixed
    {
        if ($this->formatUsing) {
            return ($this->formatUsing)($value, $row);
        }

        return $this->defaultFormat($value);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'key' => $this->key,
            'label' => $this->label,
            'type' => $this->type,
            'sortable' => $this->sortable,
            'searchable' => $this->searchable,
            'summable' => $this->summable,
            'visible' => $this->visible,
            'width' => $this->width,
            'alignment' => $this->alignment,
        ];
    }

    abstract protected function defaultFormat(mixed $value): mixed;
}
