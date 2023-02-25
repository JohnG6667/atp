<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{

    public function index()
    {
        $works = Work::all();

        return view('admin.works.index');
    }

    public function create()
    {
        return view('admin.works.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:works',
            'type' => 'required|max:255',
            'description' => 'required|max:255',
            'facebook' => 'max:255',
            'instagram' => 'max:255',
            'pinterest' => 'max:255',
            'file' => 'image'
        ]);

        $work = Work::create($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('works', $request->file('file'));

            $work->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.works.edit', $work)->with('info', 'El work se creó con éxito');
    }

    public function show(Work $work)
    {
        return view('admin.works.show', compact('work'));
    }

    public function edit(Work $work)
    {
        return view('admin.works.edit', compact('work'));
    }

    public function update(Request $request, Work $work)
    {
        $request->validate([
            'name' => "required|max:255|unique:works,name,$work->id",
            'type' => 'required|max:255',
            'description' => 'required|max:255',
            'facebook' => 'max:255',
            'instagram' => 'max:255',
            'pinterest' => 'max:255',
            'file' => 'image'
        ]);

        $work->update($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('works', $request->file('file'));

            if ($work->image) {
                Storage::delete($work->image->url);

                $work->image->update([
                    'url' => $url
                ]);
            } else {
                $work->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.works.edit', $work)->with('info', 'El work se actualizó con éxito');
    }

    public function destroy(Work $work)
    {
        $work->delete();

        Cache::flush();

        return redirect()->route('admin.works.index')->with('info', 'El work se eliminó con éxito');
    }
}
