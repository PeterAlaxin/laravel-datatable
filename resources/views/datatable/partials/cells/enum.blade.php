@php
    $color = $column->getColor($value);
    $label = $column->format($value, $row);
@endphp

<span class="badge bg-{{ $color }}-lt">
    {{ $label }}
</span>
