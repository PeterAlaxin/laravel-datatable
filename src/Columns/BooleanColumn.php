<?php

namespace PeterAlaxin\DataTable\Columns;

class BooleanColumn extends Column
{
    protected string $type = 'boolean';

    protected string $trueLabel = '';

    protected string $falseLabel = '';

    protected string $trueIcon = 'check';

    protected string $falseIcon = 'x';

    protected bool $useIcons = true;

    public function labels(string $true, string $false): static
    {
        $this->trueLabel = $true;
        $this->falseLabel = $false;

        return $this;
    }

    public function icons(string $true, string $false): static
    {
        $this->trueIcon = $true;
        $this->falseIcon = $false;

        return $this;
    }

    public function useLabels(): static
    {
        $this->useIcons = false;

        return $this;
    }

    public function getTrueLabel(): string
    {
        return $this->trueLabel ?: __('datatable::datatable.yes');
    }

    public function getFalseLabel(): string
    {
        return $this->falseLabel ?: __('datatable::datatable.no');
    }

    public function getTrueIcon(): string
    {
        return $this->trueIcon;
    }

    public function getFalseIcon(): string
    {
        return $this->falseIcon;
    }

    public function usesIcons(): bool
    {
        return $this->useIcons;
    }

    protected function defaultFormat(mixed $value): mixed
    {
        return (bool) $value;
    }
}
