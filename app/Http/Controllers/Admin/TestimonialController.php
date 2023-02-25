<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonials.index');
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:testimonials',
            'description' => 'required|max:255',
            'file' => 'image'
        ]);

        $testimonial = Testimonial::create($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('testimonials', $request->file('file'));

            $testimonial->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.testimonials.edit', $testimonial)->with('info', 'El testimonial se creó con éxito');
    }

    public function show(Testimonial $testimonial)
    {
        //
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => "required|max:255|unique:testimonials,name,$testimonial->id",
            'description' => 'required|max:255',
            'file' => 'image'
        ]);

        $testimonial->update($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('testimonials', $request->file('file'));

            if ($testimonial->image) {
                Storage::delete($testimonial->image->url);

                $testimonial->image->update([
                    'url' => $url
                ]);
            } else {
                $testimonial->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.testimonials.edit', $testimonial)->with('info', 'El testimonial se actualizó con éxito');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        Cache::flush();

        return redirect()->route('admin.testimonials.index')->with('info', 'El testimonial se eliminó con éxito');
    }
}
