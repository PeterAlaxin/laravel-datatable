@if($column->usesIcons())
    @if($value)
        <span class="text-success">
            <i class="{{ dticon($column->getTrueIcon()) }}"></i>
        </span>
    @else
        <span class="text-muted">
            <i class="{{ dticon($column->getFalseIcon()) }}"></i>
        </span>
    @endif
@else
    <span class="badge bg-{{ $value ? 'success' : 'secondary' }}-lt">
        {{ $value ? $column->getTrueLabel() : $column->getFalseLabel() }}
    </span>
@endif
