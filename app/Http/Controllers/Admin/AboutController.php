<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();

        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:255|unique:abouts',
        ]);

        $about = About::create($request->all());

        Cache::flush();

        return redirect()->route('admin.abouts.edit', $about)->with('info', 'El about se creó con éxito');
    }

    public function show(About $about)
    {
        return view('admin.abouts.show');
    }

    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'description' => "required|max:255|unique:abouts,description,$about->id",
        ]);

        $about->update($request->all());

        Cache::flush();

        return redirect()->route('admin.abouts.edit', $about)->with('info', 'El about se actualizó con éxito');
    }

    public function destroy(About $about)
    {
        $about->delete();

        Cache::flush();

        return redirect()->route('admin.abouts.index')->with('info', 'El about se eliminó con éxito');
    }
}
