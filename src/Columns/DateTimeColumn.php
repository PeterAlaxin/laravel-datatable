<?php

namespace PeterAlaxin\DataTable\Columns;

class DateTimeColumn extends DateColumn
{
    protected string $type = 'datetime';

    public function getDateFormat(): string
    {
        return $this->dateFormat ?: config('datatable.datetime_format', 'd.m.Y H:i');
    }
}
