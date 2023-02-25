<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PicturesWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PicturesWorkController extends Controller
{

    public function index()
    {
        return view('admin.pictures-work.index');
    }

    public function create()
    {
        return view('admin.pictures-work.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:pictures_works',
            'file' => 'image'
        ]);

        $picture = PicturesWork::create($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('pictures_works', $request->file('file'));

            $picture->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.pictures.edit', $picture)->with('info', 'La picture se creó con éxito');
    }

    public function show(PicturesWork $picture)
    {
        //
    }

    public function edit(PicturesWork $picture)
    {
        return view('admin.pictures-work.edit', compact('picture'));
    }

    public function update(Request $request, PicturesWork $picture)
    {
        $request->validate([
            'name' => "required|max:255|unique:pictures_works,name,$picture->id",
            'file' => 'image'
        ]);

        $picture->update($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('pictures_works', $request->file('file'));

            if ($picture->image) {
                Storage::delete($picture->image->url);

                $picture->image->update([
                    'url' => $url
                ]);
            } else {
                $picture->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.pictures.edit', $picture)->with('info', 'La picture se actualizó con éxito');
    }

    public function destroy(PicturesWork $picture)
    {
        $picture->delete();

        Cache::flush();

        return redirect()->route('admin.pictures.index')->with('info', 'La picture se eliminó con éxito');
    }
}
