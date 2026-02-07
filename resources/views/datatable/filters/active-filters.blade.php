@if(count($activeFilters) > 0)
    <div class="d-flex flex-wrap gap-1 align-items-center">
        @foreach($activeFilters as $index => $filter)
            @php
                $filterDef = $filters->first(fn($f) => $f->getColumn() === $filter['column']);
                $operatorLabel = $filterDef?->getOperators()[$filter['operator']] ?? $filter['operator'];

                $displayValue = $filter['value'];
                if ($filterDef && method_exists($filterDef, 'getOptions')) {
                    $options = $filterDef->getOptions();
                    if (is_array($filter['value'])) {
                        $displayValue = array_map(fn($v) => $options[$v] ?? $v, $filter['value']);
                        $displayValue = implode(', ', $displayValue);
                    } else {
                        $displayValue = $options[$filter['value']] ?? $filter['value'];
                    }
                } elseif (is_array($filter['value'])) {
                    $displayValue = implode(' - ', $filter['value']);
                }
            @endphp
            <span class="badge bg-blue-lt">
                {{ $filterDef?->getLabel() ?? $filter['column'] }}
                {{ mb_strtolower($operatorLabel) }}
                @if(!in_array($filter['operator'], ['is_empty', 'is_not_empty', 'today', 'yesterday', 'this_week', 'last_week', 'this_month', 'last_month', 'this_year', 'is_true', 'is_false', 'is_null']))
                    "{{ $displayValue }}"
                @endif
                <a href="#" class="ms-1 text-reset" wire:click.prevent="removeFilter({{ $index }})">
                    <i class="ti ti-x"></i>
                </a>
            </span>
        @endforeach
    </div>
@endif
