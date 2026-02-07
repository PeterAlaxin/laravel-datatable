@php
    $type = $column->getType();
@endphp

<div>
    @switch($type)
        @case('boolean')
            @include('datatable::datatable.partials.cells.boolean')
            @break

        @case('enum')
            @include('datatable::datatable.partials.cells.enum')
            @break

        @case('money')
            @include('datatable::datatable.partials.cells.money')
            @break

        @case('date')
        @case('datetime')
            @include('datatable::datatable.partials.cells.date')
            @break

        @case('number')
            @include('datatable::datatable.partials.cells.number')
            @break

        @case('relation')
            @include('datatable::datatable.partials.cells.relation')
            @break

        @case('text')
            @include('datatable::datatable.partials.cells.text')
            @break

        @default
            {{ $column->format($value, $row) }}
    @endswitch

    @if($column->hasHint() && $column->getHint($value, $row))
        <div class="text-muted small">{!! $column->getHint($value, $row) !!}</div>
    @endif
</div>
