@if($column->hasLink() && $column->getLink($row))
    <a href="{{ $column->getLink($row) }}" class="text-reset text-decoration-underline">{{ $column->format($value, $row) }}</a>
@else
    {{ $column->format($value, $row) }}
@endif
