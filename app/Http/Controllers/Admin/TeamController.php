<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        return view('admin.teams.index');
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:teams',
            'position' => 'required|max:255',
            'facebook' => 'max:255',
            'instagram' => 'max:255',
            'google' => 'max:255',
            'file' => 'image'
        ]);

        $team = Team::create($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('teams', $request->file('file'));

            $team->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.teams.edit', $team)->with('info', 'El miembro se creó con éxito');
    }

    public function show(Team $team)
    {
        //
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => "required|max:255|unique:teams,name,$team->id",
            'position' => 'required|max:255',
            'facebook' => 'max:255',
            'instagram' => 'max:255',
            'google' => 'max:255',
            'file' => 'image'
        ]);

        $team->update($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('teams', $request->file('file'));

            if ($team->image) {
                Storage::delete($team->image->url);

                $team->image->update([
                    'url' => $url
                ]);
            } else {
                $team->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.teams.edit', $team)->with('info', 'El miembro se actualizó con éxito');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        Cache::flush();

        return redirect()->route('admin.teams.index')->with('info', 'El miembro se eliminó con éxito');
    }
}
