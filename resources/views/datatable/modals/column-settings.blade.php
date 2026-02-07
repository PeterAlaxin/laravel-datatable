<div class="modal modal-blur fade show" style="display: block;" tabindex="-1"
     x-data="{
         dragging: null,
         dragOver: null,
         items: @js($allColumns->map(fn($col) => ['key' => $col->getKey(), 'label' => $col->getLabel()])->values()->toArray()),

         handleDragStart(e, index) {
             this.dragging = index;
             e.dataTransfer.effectAllowed = 'move';
         },

         handleDragOver(e, index) {
             e.preventDefault();
             this.dragOver = index;
         },

         handleDrop(e, index) {
             e.preventDefault();
             if (this.dragging !== null && this.dragging !== index) {
                 const item = this.items.splice(this.dragging, 1)[0];
                 this.items.splice(index, 0, item);
                 $wire.reorderColumns(this.items.map(i => i.key));
             }
             this.dragging = null;
             this.dragOver = null;
         },

         handleDragEnd() {
             this.dragging = null;
             this.dragOver = null;
         }
     }">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('datatable::datatable.column_settings_title') }}</h5>
                <button type="button" class="btn-close" wire:click="$set('showColumnSettings', false)"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-3">{{ __('datatable::datatable.column_settings_hint') }}</p>

                <div class="list-group">
                    @foreach($allColumns as $index => $column)
                        @php
                            $setting = collect($columnSettings)->firstWhere('key', $column->getKey());
                            $isVisible = $setting ? ($setting['visible'] ?? true) : $column->isVisible();
                            $showSum = $setting['show_sum'] ?? false;
                        @endphp
                        <div class="list-group-item d-flex align-items-center"
                             wire:key="col-{{ $column->getKey() }}"
                             draggable="true"
                             x-on:dragstart="handleDragStart($event, {{ $index }})"
                             x-on:dragover="handleDragOver($event, {{ $index }})"
                             x-on:drop="handleDrop($event, {{ $index }})"
                             x-on:dragend="handleDragEnd()"
                             :class="{ 'bg-light': dragOver === {{ $index }} }">
                            <span class="cursor-move me-2" style="cursor: grab;">
                                <i class="ti ti-grip-vertical text-muted"></i>
                            </span>

                            <span class="flex-grow-1">{{ $column->getLabel() }}</span>

                            {{-- Visibility toggle --}}
                            <button type="button"
                                    class="btn btn-sm btn-ghost-{{ $isVisible ? 'primary' : 'secondary' }}"
                                    wire:click="toggleColumnVisibility('{{ $column->getKey() }}')"
                                    title="{{ $isVisible ? __('datatable::datatable.hide') : __('datatable::datatable.show') }}">
                                <i class="ti ti-{{ $isVisible ? 'eye' : 'eye-off' }}"></i>
                            </button>

                            {{-- Sum toggle --}}
                            @if($column->isSummable())
                                <button type="button"
                                        class="btn btn-sm btn-ghost-{{ $showSum ? 'primary' : 'secondary' }}"
                                        wire:click="toggleColumnSum('{{ $column->getKey() }}')"
                                        title="{{ __('datatable::datatable.show_sum') }}">
                                    <i class="ti ti-sum"></i>
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="$set('showColumnSettings', false)">
                    {{ __('datatable::datatable.close') }}
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" wire:click="$set('showColumnSettings', false)"></div>
