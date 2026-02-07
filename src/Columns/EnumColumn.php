<?php

namespace PeterAlaxin\DataTable\Columns;

class EnumColumn extends Column
{
    protected string $type = 'enum';

    /** @var array<string, string> */
    protected array $options = [];

    /** @var array<string, string> */
    protected array $colors = [];

    /**
     * @param array<string, string> $options
     */
    public function options(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @param array<string, string> $colors
     */
    public function colors(array $colors): static
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    public function getColor(?string $value): string
    {
        if ($value === null) {
            return 'secondary';
        }

        return $this->colors[$value] ?? 'secondary';
    }

    protected function defaultFormat(mixed $value): mixed
    {
        return $this->options[$value] ?? $value;
    }
}
