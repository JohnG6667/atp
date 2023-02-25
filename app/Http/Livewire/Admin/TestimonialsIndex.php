<?php

namespace App\Http\Livewire\Admin;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class TestimonialsIndex extends Component
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
        $testimonials = Testimonial::where('name', 'LIKE', '%' . $this->search . '%')
        ->latest('id')->paginate(8);

        return view('livewire.admin.testimonials-index', compact('testimonials'));
    }
}
