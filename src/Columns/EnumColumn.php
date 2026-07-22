<?php

namespace PeterAlaxin\DataTable\Columns;

class EnumColumn extends Column
{
    protected string $type = 'enum';

    /** @var array<array-key, string> */
    protected array $options = [];

    /** @var array<array-key, string> */
    protected array $colors = [];

    /**
     * @param array<array-key, string> $options
     */
    public function options(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @param array<array-key, string> $colors
     */
    public function colors(array $colors): static
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * @return array<array-key, string>
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
