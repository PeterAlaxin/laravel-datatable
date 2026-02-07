<?php

namespace PeterAlaxin\DataTable\Columns;

class MoneyColumn extends NumberColumn
{
    protected string $type = 'money';

    protected string $currency = '';

    protected string $currencyColumn = '';

    public function __construct(string $key, ?string $label = null)
    {
        parent::__construct($key, $label);
        $this->decimals = 2;
    }

    public function currency(string $currency): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function currencyFromColumn(string $column): static
    {
        $this->currencyColumn = $column;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency ?: config('datatable.default_currency', 'EUR');
    }

    public function getCurrencyColumn(): string
    {
        return $this->currencyColumn;
    }

    public function format(mixed $value, mixed $row): mixed
    {
        if ($this->formatUsing) {
            return ($this->formatUsing)($value, $row);
        }

        if ($value === null) {
            return '-';
        }

        $currency = $this->currencyColumn
            ? data_get($row, $this->currencyColumn, $this->getCurrency())
            : $this->getCurrency();

        $decimalSep = $this->decimalSeparator ?: config('datatable.number_decimal_separator', ',');
        $thousandsSep = $this->thousandsSeparator ?: config('datatable.number_thousands_separator', ' ');

        return number_format((float) $value, 2, $decimalSep, $thousandsSep).' '.$currency;
    }

    protected function defaultFormat(mixed $value): mixed
    {
        if ($value === null) {
            return '-';
        }

        $decimalSep = $this->decimalSeparator ?: config('datatable.number_decimal_separator', ',');
        $thousandsSep = $this->thousandsSeparator ?: config('datatable.number_thousands_separator', ' ');

        return number_format((float) $value, 2, $decimalSep, $thousandsSep).' '.$this->getCurrency();
    }
}
