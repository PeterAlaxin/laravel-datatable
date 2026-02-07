<?php

namespace PeterAlaxin\DataTable\Columns;

class NumberColumn extends Column
{
    protected string $type = 'number';

    protected int $decimals = 0;

    protected string $decimalSeparator = '';

    protected string $thousandsSeparator = '';

    public function __construct(string $key, ?string $label = null)
    {
        parent::__construct($key, $label);
        $this->alignment = 'right';
        $this->summable = true;
    }

    public function decimals(int $decimals): static
    {
        $this->decimals = $decimals;

        return $this;
    }

    public function separators(string $decimal, string $thousands): static
    {
        $this->decimalSeparator = $decimal;
        $this->thousandsSeparator = $thousands;

        return $this;
    }

    protected function defaultFormat(mixed $value): mixed
    {
        if ($value === null) {
            return '-';
        }

        $decimalSep = $this->decimalSeparator ?: config('datatable.number_decimal_separator', ',');
        $thousandsSep = $this->thousandsSeparator ?: config('datatable.number_thousands_separator', ' ');

        return number_format(
            (float) $value,
            $this->decimals,
            $decimalSep,
            $thousandsSep,
        );
    }
}
