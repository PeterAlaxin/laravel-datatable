<?php

namespace PeterAlaxin\DataTable\Columns;

use Closure;

class RelationColumn extends Column
{
    protected string $type = 'relation';

    protected string $relationName = '';

    protected string $relationColumn = '';

    protected ?Closure $linkUsing = null;

    public function __construct(string $key, ?string $label = null)
    {
        parent::__construct($key, $label);

        if (str_contains($key, '.')) {
            [$this->relationName, $this->relationColumn] = explode('.', $key, 2);
            $this->relation = $this->relationName;
        }
    }

    public function linkUsing(Closure $callback): static
    {
        $this->linkUsing = $callback;

        return $this;
    }

    public function getRelationName(): string
    {
        return $this->relationName;
    }

    public function getRelationColumn(): string
    {
        return $this->relationColumn;
    }

    public function getLink(mixed $row): ?string
    {
        if ($this->linkUsing) {
            return ($this->linkUsing)($row);
        }

        return null;
    }

    public function hasLink(): bool
    {
        return $this->linkUsing !== null;
    }

    protected function defaultFormat(mixed $value): mixed
    {
        return $value ?? '-';
    }
}
