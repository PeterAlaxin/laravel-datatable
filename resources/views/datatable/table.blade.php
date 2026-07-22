@assets
    @if(config('datatable.ui') === 'adminlte')
        {{-- AdminLTE / Bootstrap 5 kompatibilná vrstva pre Tabler triedy použité v balíku --}}
        <style>
            :root {
                --tblr-border-color: var(--bs-border-color);
                --tblr-bg-surface: var(--bs-body-bg);
                --tblr-bg-surface-secondary: var(--bs-secondary-bg);
                --tblr-primary-rgb: var(--bs-primary-rgb);
            }
            .btn-ghost-secondary { color: var(--bs-secondary-color); background: transparent; border-color: transparent; }
            .btn-ghost-secondary:hover { background-color: var(--bs-secondary-bg); }
            .btn-ghost-primary { color: var(--bs-primary); background: transparent; border-color: transparent; }
            .btn-ghost-primary:hover { background-color: rgba(var(--bs-primary-rgb), .1); }
            .btn-ghost-danger { color: var(--bs-danger); background: transparent; border-color: transparent; }
            .btn-ghost-danger:hover { background-color: rgba(var(--bs-danger-rgb), .1); }
            .btn-icon { display: inline-flex; align-items: center; justify-content: center; padding-left: .5rem; padding-right: .5rem; }
            .btn-list { display: flex; flex-wrap: wrap; align-items: center; gap: .5rem; }
            .input-icon { position: relative; display: flex; }
            .input-icon .form-control { padding-left: 2.5rem; }
            .input-icon-addon { position: absolute; top: 0; left: 0; height: 100%; width: 2.5rem; display: flex; align-items: center; justify-content: center; color: var(--bs-secondary-color); pointer-events: none; z-index: 4; }
            .table-vcenter td, .table-vcenter th { vertical-align: middle; }
            /* Bootstrap 4 -> 5: balík generuje text-right/text-left, BS5 pozná len text-end/text-start */
            .text-right { text-align: right !important; }
            .text-left { text-align: left !important; }
            .badge-notification { position: absolute; top: 0; right: 0; transform: translate(50%, -50%); }
            .badge-pill { border-radius: 50rem; }
            .badge-filter-count { font-size: .625rem; padding: .2em .45em; }
            .modal-blur { backdrop-filter: blur(2px); }
            .cursor-move { cursor: grab; }
            .bg-blue-lt { background-color: var(--bs-primary-bg-subtle) !important; color: var(--bs-primary-text-emphasis) !important; }
            .bg-primary-lt { background-color: var(--bs-primary-bg-subtle) !important; color: var(--bs-primary-text-emphasis) !important; }
            .bg-success-lt { background-color: var(--bs-success-bg-subtle) !important; color: var(--bs-success-text-emphasis) !important; }
            .bg-secondary-lt { background-color: var(--bs-secondary-bg-subtle) !important; color: var(--bs-secondary-text-emphasis) !important; }
            .bg-danger-lt { background-color: var(--bs-danger-bg-subtle) !important; color: var(--bs-danger-text-emphasis) !important; }
            .bg-warning-lt { background-color: var(--bs-warning-bg-subtle) !important; color: var(--bs-warning-text-emphasis) !important; }
            .bg-info-lt { background-color: var(--bs-info-bg-subtle) !important; color: var(--bs-info-text-emphasis) !important; }
        </style>
    @endif

    {{-- Self-contained confirm modal (Bootstrap 5). Reaguje na window event 'open-confirm-modal'. --}}
    <script>
        (function () {
            if (window.__dtConfirmModalInit) return;
            window.__dtConfirmModalInit = true;

            window.addEventListener('open-confirm-modal', function (e) {
                var d = e.detail || {};
                var old = document.getElementById('dt-confirm-modal');
                if (old) old.remove();

                var iconHtml = d.icon ? '<i class="' + d.icon + ' me-2"></i>' : '';
                var color = d.confirmColor || 'danger';

                var wrapper = document.createElement('div');
                wrapper.innerHTML =
                    '<div class="modal fade" id="dt-confirm-modal" tabindex="-1" aria-hidden="true">' +
                        '<div class="modal-dialog modal-dialog-centered">' +
                            '<div class="modal-content">' +
                                '<div class="modal-header">' +
                                    '<h5 class="modal-title">' + iconHtml + (d.title || '') + '</h5>' +
                                    '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
                                '</div>' +
                                '<div class="modal-body"></div>' +
                                '<div class="modal-footer">' +
                                    '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button>' +
                                    '<button type="button" class="btn btn-' + color + '" data-dt-confirm></button>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';

                var modalEl = wrapper.firstElementChild;
                modalEl.querySelector('.modal-body').textContent = d.message || '';
                modalEl.querySelector('[data-bs-dismiss="modal"].btn-secondary').textContent = d.cancelText || 'Zrušiť';
                var confirmBtn = modalEl.querySelector('[data-dt-confirm]');
                confirmBtn.textContent = d.confirmText || 'OK';

                document.body.appendChild(modalEl);
                var modal = new window.bootstrap.Modal(modalEl);

                confirmBtn.addEventListener('click', function () {
                    if (d.onConfirmEmit) {
                        window.Livewire.dispatch(d.onConfirmEmit, d.onConfirmParams || {});
                    }
                    modal.hide();
                });
                modalEl.addEventListener('hidden.bs.modal', function () { modalEl.remove(); });

                modal.show();
            });
        })();
    </script>
@endassets

<div>
    <style>
        .datatable-zebra tbody tr:nth-child(odd) {
            background-color: #fff;
        }
        .datatable-zebra tbody tr:nth-child(even) {
            background-color: #f1f5f9;
        }
        [data-bs-theme="dark"] .datatable-zebra tbody tr:nth-child(odd) {
            background-color: var(--tblr-bg-surface);
        }
        [data-bs-theme="dark"] .datatable-zebra tbody tr:nth-child(even) {
            background-color: var(--tblr-bg-surface-secondary);
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .icon-spin {
            animation: spin 1s linear infinite;
        }
        .datatable-row-clickable {
            cursor: pointer;
        }
        .datatable-row-clickable:hover {
            background-color: rgba(var(--tblr-primary-rgb), 0.04) !important;
        }
        .saved-filter-item:hover {
            background-color: var(--tblr-bg-surface-secondary);
        }

        /* Tabler-like header: malé sivé kapitálky s decentným rozstupom */
        .datatable-zebra thead th {
            font-size: 0.6875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: var(--tblr-secondary-color, #6c757d);
            white-space: nowrap;
            vertical-align: middle;
        }
        /* Zoraďovací odkaz zdedí sivú farbu hlavičky, pri hoveri stmavne */
        .datatable-zebra thead th a.table-sort {
            color: inherit;
        }
        .datatable-zebra thead th a.table-sort:hover {
            color: var(--tblr-body-color, #182433);
        }
        /* Neutrálna dvojšípka je nenápadná, aktívna je výraznejšia */
        .datatable-zebra thead th a.table-sort .sort-icon {
            font-size: 0.75rem;
            transition: opacity .15s ease;
        }
        .datatable-zebra thead th a.table-sort .sort-icon.sort-neutral {
            opacity: 0.35;
        }
        .datatable-zebra thead th a.table-sort:hover .sort-icon.sort-neutral {
            opacity: 0.65;
        }
        .datatable-zebra thead th a.table-sort.asc,
        .datatable-zebra thead th a.table-sort.desc {
            color: var(--tblr-primary, #206bc4);
        }

        /* Kompaktné štvorcové akčné tlačidlá v riadku (28×28 px) */
        .datatable-row-actions .btn {
            width: 28px;
            height: 28px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }
        .datatable-row-actions .btn i {
            font-size: 0.8125rem !important;
        }
    </style>

    {{-- Header s vyhľadávaním a akciami --}}
    <div class="mb-2">
        <div class="d-flex align-items-center">
            <div class="row align-items-center w-100 g-2">
                {{-- Vyhľadávanie --}}
                <div class="col-auto">
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <i class="{{ dticon('search') }}"></i>
                        </span>
                        <input type="text"
                               class="form-control"
                               placeholder="{{ __('datatable::datatable.search') }}"
                               wire:model.live.debounce.300ms="search">
                    </div>
                </div>

                {{-- Aktívne filtre --}}
                <div class="col">
                    @include('datatable::datatable.filters.active-filters')
                </div>

                {{-- Akcie --}}
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        {{-- Vlastné toolbar akcie (globálne, nezávislé od výberu riadkov) --}}
                        @foreach($this->toolbarActions() as $action)
                            @php
                                $btnClass = isset($action['color']) ? 'btn-' . $action['color'] : 'btn-ghost-secondary';
                            @endphp
                            @if(isset($action['url']))
                                <a href="{{ $action['url'] }}"
                                   class="btn {{ $btnClass }}"
                                   title="{{ $action['label'] }}">
                                    @isset($action['icon'])<i class="{{ dticon($action['icon']) }} me-1"></i>@endisset
                                    {{ $action['label'] }}
                                </a>
                            @elseif(isset($action['confirm']))
                                <button type="button"
                                        class="btn {{ $btnClass }}"
                                        title="{{ $action['label'] }}"
                                        onclick="window.dispatchEvent(new CustomEvent('open-confirm-modal', { detail: { title: '{{ $action['label'] }}', message: '{{ addslashes($action['confirm']) }}', onConfirmEmit: '{{ $action['method'] }}Confirmed', onConfirmParams: {}, confirmText: '{{ $action['label'] }}', confirmColor: '{{ $action['color'] ?? 'primary' }}', icon: '{{ isset($action['icon']) ? dticon($action['icon']) : '' }}' } })); return false;">
                                    @isset($action['icon'])<i class="{{ dticon($action['icon']) }} me-1"></i>@endisset
                                    {{ $action['label'] }}
                                </button>
                            @else
                                <button type="button"
                                        class="btn {{ $btnClass }}"
                                        wire:click="{{ $action['method'] }}"
                                        wire:loading.attr="disabled"
                                        title="{{ $action['label'] }}">
                                    @isset($action['icon'])<i class="{{ dticon($action['icon']) }} me-1"></i>@endisset
                                    {{ $action['label'] }}
                                </button>
                            @endif
                        @endforeach

                        {{-- Saved Filters Dropdown --}}
                        @php $savedFilters = $this->getSavedFilters(); @endphp
                        @if($savedFilters->count() > 0)
                            <div class="dropdown">
                                <button type="button"
                                        class="btn btn-ghost-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    @if($selectedSavedFilterId)
                                        @php $currentSavedFilter = $savedFilters->firstWhere('id', $selectedSavedFilterId); @endphp
                                        <i class="{{ dticon('filter-star') }} me-1"></i>
                                        {{ $currentSavedFilter?->name ?? __('datatable::datatable.saved_filters') }}
                                    @else
                                        <i class="{{ dticon('filter-star') }} me-1"></i>
                                        {{ __('datatable::datatable.saved_filters') }}
                                    @endif
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @foreach($savedFilters as $savedFilter)
                                        <li class="d-flex align-items-center saved-filter-item" @if($selectedSavedFilterId === $savedFilter->id) style="background-color: var(--tblr-bg-surface-secondary);" @endif>
                                            <a href="#"
                                               class="dropdown-item flex-grow-1"
                                               wire:click.prevent="loadSavedFilter({{ $savedFilter->id }})">
                                                {{ $savedFilter->name }}
                                                <small class="text-muted ms-2">({{ count($savedFilter->filters) }})</small>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-sm btn-ghost-danger p-1 me-2"
                                                    onclick="window.dispatchEvent(new CustomEvent('open-confirm-modal', { detail: { title: '{{ __('datatable::datatable.delete_filter') }}', message: '{{ __('datatable::datatable.confirm_delete_filter') }}', onConfirmEmit: 'deleteSavedFilter', onConfirmParams: { filterId: {{ $savedFilter->id }} }, confirmText: '{{ __('datatable::datatable.delete') }}', confirmColor: 'danger', icon: '{{ dticon('trash') }}' } })); return false;"
                                                    title="{{ __('datatable::datatable.delete') }}">
                                                <i class="{{ dticon('trash') }} fs-4"></i>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Clear filters button --}}
                        @if(count($activeFilters) > 0)
                            <button type="button"
                                    class="btn btn-ghost-danger btn-icon"
                                    wire:click="clearFilters"
                                    title="{{ __('datatable::datatable.clear_filter') }}">
                                <i class="{{ dticon('x') }} fs-5"></i>
                            </button>
                        @endif

                        {{-- Filter button --}}
                        <button type="button"
                                class="btn btn-ghost-secondary btn-icon position-relative"
                                wire:click="$toggle('showFilterBuilder')"
                                title="{{ __('datatable::datatable.filter') }}">
                            <i class="{{ dticon('filter') }} fs-5 text-body-tertiary"></i>
                            @if(count($activeFilters) > 0)
                                <span class="badge bg-primary text-white badge-notification badge-pill badge-filter-count">{{ count($activeFilters) }}</span>
                            @endif
                        </button>

                        {{-- Refresh button --}}
                        <button type="button"
                                class="btn btn-ghost-secondary btn-icon"
                                wire:click="$refresh"
                                wire:loading.attr="disabled"
                                title="{{ __('datatable::datatable.refresh') }}">
                            <i class="{{ dticon('refresh') }} fs-5 text-body-tertiary" wire:loading.class="icon-spin"></i>
                        </button>

                        {{-- Export CSV button --}}
                        <button type="button"
                                class="btn btn-ghost-secondary btn-icon"
                                wire:click="exportToCsv"
                                wire:loading.attr="disabled"
                                title="{{ __('datatable::datatable.export_csv') }}">
                            <i class="{{ dticon('file-export') }} fs-5 text-body-tertiary"></i>
                        </button>

                        {{-- Column settings --}}
                        <button type="button"
                                class="btn btn-ghost-secondary btn-icon"
                                wire:click="$toggle('showColumnSettings')"
                                title="{{ __('datatable::datatable.column_settings') }}">
                            <i class="{{ dticon('settings') }} fs-5 text-body-tertiary"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabuľka --}}
        <div class="table-responsive border rounded">
            <table class="table table-vcenter table-hover table-borderless mb-0 datatable-zebra">
                <thead style="border-bottom: 1px solid var(--tblr-border-color);">
                    <tr style="--tblr-table-bg: transparent; background: transparent !important;">
                        {{-- Column headers --}}
                        @foreach($columns as $column)
                            <th class="@if($column->getAlignment() !== 'left') text-{{ $column->getAlignment() }} @endif"
                                style="background: transparent !important;@if($column->getWidth()) width: {{ $column->getWidth() }}px;@endif">
                                @if($column->isSortable())
                                    <a href="#"
                                       class="table-sort text-decoration-none d-inline-flex align-items-center gap-1 @if($sortColumn === $column->getKey()) {{ $sortDirection === 'asc' ? 'asc' : 'desc' }} @endif"
                                       wire:click.prevent="sortBy('{{ $column->getKey() }}')">
                                        {{ $column->getLabel() }}
                                        @if($sortColumn === $column->getKey())
                                            <i class="{{ $sortDirection === 'asc' ? dticon('sort-asc') : dticon('sort-desc') }} sort-icon"></i>
                                        @else
                                            <i class="{{ dticon('sort') }} sort-icon sort-neutral"></i>
                                        @endif
                                    </a>
                                @else
                                    {{ $column->getLabel() }}
                                @endif
                            </th>
                        @endforeach

                        {{-- Row actions column --}}
                        @if(count($this->rowActions()) > 0)
                            <th class="w-1" style="background: transparent !important;"></th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $row)
                        @php
                            $rowUrl = $this->getRowUrl($row);
                            $rowClickAction = method_exists($this, 'getRowClickAction') ? $this->getRowClickAction($row) : null;
                        @endphp
                        <tr wire:key="row-{{ $row->id }}"
                            @if($rowUrl)
                                class="datatable-row-clickable"
                                onclick="window.location.href='{{ $rowUrl }}'"
                            @elseif($rowClickAction)
                                class="datatable-row-clickable"
                                wire:click="{{ $rowClickAction }}"
                            @endif
                        >
                            {{-- Cell values --}}
                            @foreach($columns as $column)
                                <td class="@if($column->getAlignment() !== 'left') text-{{ $column->getAlignment() }} @endif">
                                    @include('datatable::datatable.partials.cell', [
                                        'column' => $column,
                                        'value' => data_get($row, $column->getKey()),
                                        'row' => $row,
                                    ])
                                </td>
                            @endforeach

                            {{-- Row actions --}}
                            @if(count($this->rowActions()) > 0)
                                <td>
                                    @php $rowActions = $this->rowActions($row); @endphp
                                    @if(count($rowActions) > 0)
                                        <div class="btn-list flex-nowrap justify-content-end datatable-row-actions">
                                            @foreach($rowActions as $action)
                                                @php
                                                    $btnClass = 'btn-outline-' . ($action['color'] ?? 'secondary');
                                                    $confirmMessage = $action['confirm'] ?? null;
                                                @endphp
                                                @if(isset($action['url']))
                                                    <a href="{{ $action['url'] }}"
                                                       class="btn btn-sm {{ $btnClass }}"
                                                       title="{{ $action['label'] }}"
                                                       onclick="event.stopPropagation()">
                                                        <i class="{{ dticon($action['icon']) }} fs-5"></i>
                                                    </a>
                                                @elseif($confirmMessage)
                                                    <a href="#"
                                                       class="btn btn-sm {{ $btnClass }}"
                                                       onclick="event.stopPropagation(); window.dispatchEvent(new CustomEvent('open-confirm-modal', { detail: { title: '{{ $action['label'] }}', message: '{{ addslashes($confirmMessage) }}', onConfirmEmit: '{{ $action['method'] }}Confirmed', onConfirmParams: { id: {{ $row->id }} }, confirmText: '{{ $action['label'] }}', confirmColor: '{{ $action['color'] ?? 'danger' }}', icon: '{{ dticon($action['icon']) }}' } })); return false;"
                                                       title="{{ $action['label'] }}">
                                                        <i class="{{ dticon($action['icon']) }} fs-5"></i>
                                                    </a>
                                                @else
                                                    <a href="#"
                                                       class="btn btn-sm {{ $btnClass }}"
                                                       wire:click.prevent="{{ $action['method'] }}({{ $row->id }})"
                                                       onclick="event.stopPropagation()"
                                                       title="{{ $action['label'] }}">
                                                        <i class="{{ dticon($action['icon']) }} fs-5"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($columns) + (count($this->rowActions()) > 0 ? 1 : 0) }}">
                                @include('datatable::datatable.partials.empty')
                            </td>
                        </tr>
                    @endforelse
                </tbody>

                {{-- Footer so súčtami --}}
                @if(!empty($sums))
                    <tfoot style="border-top: 1px solid var(--tblr-border-color);">
                        <tr>
                            @foreach($columns as $column)
                                <td class="@if($column->getAlignment() !== 'left') text-{{ $column->getAlignment() }} @endif fw-bold" style="background: transparent !important;">
                                    @if(isset($sums[$column->getKey()]))
                                        {{ $column->format($sums[$column->getKey()], null) }}
                                    @endif
                                </td>
                            @endforeach
                            @if(count($this->rowActions()) > 0)
                                <td style="background: transparent !important;"></td>
                            @endif
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>

    {{-- Pagination --}}
    <div class="d-flex align-items-center justify-content-between mt-3">
        <p class="m-0 text-muted">
            {{ __('datatable::datatable.showing', [
                'from' => $data->firstItem() ?? 0,
                'to' => $data->lastItem() ?? 0,
                'total' => $data->total(),
            ]) }}
        </p>

        {{-- Pagination links --}}
        <div>
            {{ $data->links(config('datatable.pagination_view', 'vendor.livewire.simple')) }}
        </div>

        {{-- Per page selector --}}
        <select class="form-select form-select-sm"
                style="width: auto;"
                wire:model.live="perPage">
            @foreach(config('datatable.per_page_options', [10, 25, 50, 100]) as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>

    {{-- Column Settings Modal --}}
    @if($showColumnSettings)
        @include('datatable::datatable.modals.column-settings')
    @endif

    {{-- Filter Builder Modal --}}
    @if($showFilterBuilder)
        @include('datatable::datatable.modals.filter-builder')
    @endif

    {{-- Extra modals from project-specific tables --}}
    {!! $this->renderExtraModals() !!}
</div>
