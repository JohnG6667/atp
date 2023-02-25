<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        return view('admin.skills.index');
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:skills',
            'level' => 'required',
            'file' => 'image'
        ]);

        $skill = Skill::create($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('skills', $request->file('file'));

            $skill->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.skills.edit', $skill)->with('info', 'La skill se creó con éxito');
    }

    public function show(Skill $skill)
    {
        //
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => "required|max:255|unique:skills,name,$skill->id",
            'level' => 'required',
            'file' => 'image'
        ]);

        $skill->update($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('skills', $request->file('file'));

            if ($skill->image) {
                Storage::delete($skill->image->url);

                $skill->image->update([
                    'url' => $url
                ]);
            } else {
                $skill->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.skills.edit', $skill)->with('info', 'La skill se actualizó con éxito');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        Cache::flush();

        return redirect()->route('admin.skills.index')->with('info', 'La skill se eliminó con éxito');
    }
}
