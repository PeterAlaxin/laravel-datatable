<?php

namespace PeterAlaxin\DataTable\Columns;

class TextColumn extends Column
{
    protected string $type = 'text';

    protected int $maxLength = 0;

    public function limit(int $maxLength): static
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    protected function defaultFormat(mixed $value): mixed
    {
        if ($this->maxLength > 0 && is_string($value) && mb_strlen($value) > $this->maxLength) {
            return mb_substr($value, 0, $this->maxLength).'...';
        }

        return $value;
    }
}
