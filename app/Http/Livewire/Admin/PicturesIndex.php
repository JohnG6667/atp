<?php

namespace App\Http\Livewire\Admin;

use App\Models\PicturesWork;
use Livewire\Component;
use Livewire\WithPagination;

class PicturesIndex extends Component
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
        $pictures = PicturesWork::where('name', 'LIKE', '%' . $this->search . '%')
            ->latest('id')->paginate(8);

        return view('livewire.admin.pictures-index', compact('pictures'));
    }
}
