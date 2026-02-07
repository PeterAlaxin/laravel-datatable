<div class="text-center py-4">
    <div class="mb-3">
        <i class="ti ti-database-off text-muted" style="font-size: 3rem;"></i>
    </div>
    <h3 class="text-muted">{{ __('datatable::datatable.no_records') }}</h3>
    <p class="text-muted">
        @if($search || count($activeFilters) > 0)
            {{ __('datatable::datatable.no_records_try_filter') }}
        @else
            {{ __('datatable::datatable.no_records_empty') }}
        @endif
    </p>
</div>
