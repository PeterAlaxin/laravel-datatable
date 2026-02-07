<?php

namespace PeterAlaxin\DataTable\Columns;

use Carbon\Carbon;

class DateColumn extends Column
{
    protected string $type = 'date';

    protected string $dateFormat = '';

    public function dateFormat(string $format): static
    {
        $this->dateFormat = $format;

        return $this;
    }

    public function getDateFormat(): string
    {
        return $this->dateFormat ?: config('datatable.date_format', 'd.m.Y');
    }

    protected function defaultFormat(mixed $value): mixed
    {
        if (! $value) {
            return '-';
        }

        if (! $value instanceof Carbon) {
            $value = Carbon::parse($value);
        }

        return $value->format($this->getDateFormat());
    }
}
