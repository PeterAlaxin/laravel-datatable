<?php

namespace PeterAlaxin\DataTable;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use PeterAlaxin\DataTable\Traits\WithDataTable;

abstract class BaseDataTable extends Component
{
    use WithDataTable;

    public function mount(): void
    {
        $this->mountWithDataTable();
    }

    public function render(): View
    {
        /** @phpstan-ignore argument.type */
        return view('datatable::datatable.table', [
            'data' => $this->getData(),
            'columns' => $this->getVisibleColumns(),
            'allColumns' => $this->getColumns(),
            'filters' => $this->getFilters(),
            'sums' => $this->getSums(),
        ]);
    }
}
