<?php

namespace App\Http\Livewire\Admin;

use App\Models\Skill;
use Livewire\Component;
use Livewire\WithPagination;

class SkillsIndex extends Component
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
        $skills = Skill::where('name', 'LIKE', '%' . $this->search . '%')
        ->latest('id')->paginate(8);

        return view('livewire.admin.skills-index', compact('skills'));
    }
}
