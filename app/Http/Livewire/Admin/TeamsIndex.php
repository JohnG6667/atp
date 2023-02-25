<?php

namespace App\Http\Livewire\Admin;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class TeamsIndex extends Component
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
        $teams = Team::where('name', 'LIKE', '%' . $this->search . '%')
        ->latest('id')->paginate(8);

        return view('livewire.admin.teams-index', compact('teams'));
    }
}
