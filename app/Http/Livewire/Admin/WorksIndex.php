<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Work;

use Livewire\WithPagination;

class WorksIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $works = Work::where('name', 'LIKE', '%' . $this->search . '%')
            ->latest('id')->paginate(8);

        return view('livewire.admin.works-index', compact('works'));
    }
}
