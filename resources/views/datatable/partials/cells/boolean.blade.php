@if($column->usesIcons())
    @if($value)
        <span class="text-success">
            <i class="ti ti-{{ $column->getTrueIcon() }}"></i>
        </span>
    @else
        <span class="text-muted">
            <i class="ti ti-{{ $column->getFalseIcon() }}"></i>
        </span>
    @endif
@else
    <span class="badge bg-{{ $value ? 'success' : 'secondary' }}-lt">
        {{ $value ? $column->getTrueLabel() : $column->getFalseLabel() }}
    </span>
@endif
