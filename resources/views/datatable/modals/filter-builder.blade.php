<div class="modal modal-blur fade show" style="display: block;" tabindex="-1"
     x-data="{
         selectedColumn: '',
         selectedOperator: '',
         filterValue: '',
         filterValueTo: '',
         filterValueMulti: [],

         get currentFilter() {
             return @js($filters->keyBy(fn($f) => $f->getColumn())->map(fn($f) => $f->toArray())->toArray())[this.selectedColumn] || null;
         },

         get operators() {
             return this.currentFilter?.operators || {};
         },

         get needsValueInput() {
             return !['is_empty', 'is_not_empty', 'today', 'yesterday', 'this_week', 'last_week', 'this_month', 'last_month', 'this_year', 'is_true', 'is_false', 'is_null'].includes(this.selectedOperator);
         },

         get needsSecondValue() {
             return this.selectedOperator === 'between';
         },

         get needsMultiSelect() {
             return ['in', 'not_in'].includes(this.selectedOperator) && this.currentFilter?.type === 'select';
         },

         addFilter() {
             if (!this.selectedColumn || !this.selectedOperator) return;

             let value = this.filterValue;
             if (this.needsSecondValue) {
                 value = [this.filterValue, this.filterValueTo];
             } else if (this.needsMultiSelect) {
                 value = this.filterValueMulti;
             }

             $wire.addFilter(this.selectedColumn, this.selectedOperator, value);
             this.reset();
         },

         reset() {
             this.selectedColumn = '';
             this.selectedOperator = '';
             this.filterValue = '';
             this.filterValueTo = '';
             this.filterValueMulti = [];
         }
     }">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('datatable::datatable.filters_title') }}</h5>
                <button type="button" class="btn-close" wire:click="$set('showFilterBuilder', false)"></button>
            </div>
            <div class="modal-body">
                {{-- Existujúce filtre --}}
                @if(count($activeFilters) > 0)
                    <div class="mb-4">
                        <h6 class="mb-2">{{ __('datatable::datatable.active_filters') }}</h6>
                        <div class="d-flex flex-wrap gap-2">
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
                                <span class="badge bg-primary-lt d-flex align-items-center gap-1">
                                    {{ $filterDef?->getLabel() ?? $filter['column'] }}
                                    {{ mb_strtolower($operatorLabel) }}
                                    @if(!in_array($filter['operator'], ['is_empty', 'is_not_empty', 'today', 'yesterday', 'this_week', 'last_week', 'this_month', 'last_month', 'this_year', 'is_true', 'is_false', 'is_null']))
                                        "{{ $displayValue }}"
                                    @endif
                                    <button type="button" class="btn-close btn-close-sm" wire:click="removeFilter({{ $index }})"></button>
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                @endif

                {{-- Pridanie nového filtra --}}
                <h6 class="mb-3">{{ __('datatable::datatable.add_filter') }}</h6>

                <div class="row g-3">
                    {{-- Výber stĺpca --}}
                    <div :class="needsSecondValue ? 'col-md-3' : 'col-md-4'">
                        <label class="form-label">{{ __('datatable::datatable.column') }}</label>
                        <select class="form-select" x-model="selectedColumn" @change="selectedOperator = ''; filterValue = ''; filterValueMulti = []">
                            <option value="">{{ __('datatable::datatable.select_column') }}</option>
                            @foreach($filters as $filter)
                                <option value="{{ $filter->getColumn() }}">{{ $filter->getLabel() }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Výber operátora --}}
                    <div :class="needsSecondValue ? 'col-md-3' : 'col-md-4'">
                        <label class="form-label">{{ __('datatable::datatable.condition') }}</label>
                        <select class="form-select" x-model="selectedOperator" :disabled="!selectedColumn" @change="filterValue = ''; filterValueMulti = []">
                            <option value="">{{ __('datatable::datatable.select_condition') }}</option>
                            <template x-for="(label, key) in operators" :key="key">
                                <option :value="key" x-text="label"></option>
                            </template>
                        </select>
                    </div>

                    {{-- Hodnota --}}
                    <div :class="needsSecondValue ? 'col-md-3' : 'col-md-4'" x-show="needsValueInput">
                        <label class="form-label" x-text="needsSecondValue ? '{{ __('datatable::datatable.from') }}' : '{{ __('datatable::datatable.value') }}'"></label>
                        <template x-if="currentFilter?.type === 'date'">
                            <input type="date" class="form-control" x-model="filterValue">
                        </template>
                        <template x-if="currentFilter?.type === 'number' || currentFilter?.type === 'money'">
                            <input type="number" step="0.01" class="form-control" x-model="filterValue">
                        </template>
                        <template x-if="currentFilter?.type === 'select' && !needsMultiSelect">
                            <select class="form-select" x-model="filterValue">
                                <option value="">{{ __('datatable::datatable.select') }}</option>
                                <template x-for="(label, key) in currentFilter.options" :key="key">
                                    <option :value="key" x-text="label"></option>
                                </template>
                            </select>
                        </template>
                        <template x-if="currentFilter?.type === 'select' && needsMultiSelect">
                            <select class="form-select" x-model="filterValueMulti" multiple size="5">
                                <template x-for="(label, key) in currentFilter.options" :key="key">
                                    <option :value="key" x-text="label"></option>
                                </template>
                            </select>
                        </template>
                        <template x-if="!['date', 'number', 'money', 'select', 'boolean'].includes(currentFilter?.type)">
                            <input type="text" class="form-control" x-model="filterValue" placeholder="{{ __('datatable::datatable.enter_value') }}">
                        </template>
                    </div>

                    {{-- Druhá hodnota pre 'between' --}}
                    <template x-if="needsSecondValue">
                        <div class="col-md-3">
                            <label class="form-label">{{ __('datatable::datatable.to') }}</label>
                            <template x-if="currentFilter?.type === 'date'">
                                <input type="date" class="form-control" x-model="filterValueTo">
                            </template>
                            <template x-if="currentFilter?.type !== 'date'">
                                <input type="text" class="form-control" x-model="filterValueTo">
                            </template>
                        </div>
                    </template>
                </div>

                <div class="mt-3 text-end">
                    <button type="button"
                            class="btn btn-primary"
                            @click="addFilter()"
                            :disabled="!selectedColumn || !selectedOperator">
                        <i class="ti ti-plus me-1"></i>
                        {{ __('datatable::datatable.add_filter') }}
                    </button>
                </div>

                {{-- Uložiť filter --}}
                <hr>
                <form wire:submit.prevent="saveNamedFilter" class="d-flex align-items-center gap-2">
                    <input type="text"
                           class="form-control"
                           wire:model="newFilterName"
                           placeholder="{{ __('datatable::datatable.filter_name') }}"
                           @if(count($activeFilters) === 0) disabled @endif>
                    <button type="submit"
                            class="btn btn-outline-primary text-nowrap"
                            @if(count($activeFilters) === 0) disabled @endif>
                        <i class="ti ti-device-floppy me-1"></i>
                        {{ __('datatable::datatable.save_filter') }}
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="$set('showFilterBuilder', false)">
                    {{ __('datatable::datatable.close') }}
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" wire:click="$set('showFilterBuilder', false)"></div>
