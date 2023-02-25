<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FactController extends Controller
{
    public function index()
    {
        $facts = Fact::all();

        return view('admin.facts.index', compact('facts'));
    }

    public function create()
    {
        return view('admin.facts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:facts',
            'logo' => 'required|max:255',
            'number' => 'required',
        ]);

        $fact = Fact::create($request->all());

        Cache::flush();

        return redirect()->route('admin.facts.edit', $fact)->with('info', 'El fact se creó con éxito');
    }

    public function show(Fact $fact)
    {
        return view('admin.facts.show', compact('fact'));
    }

    public function edit(Fact $fact)
    {
        return view('admin.facts.edit', compact('fact'));
    }

    public function update(Request $request, Fact $fact)
    {
        $request->validate([
            'name' => "required|max:255|unique:facts,name,$fact->id",
            'logo' => 'required|max:255',
            'number' => 'required',
        ]);

        $fact->update($request->all());

        Cache::flush();

        return redirect()->route('admin.facts.edit', $fact)->with('info', 'El fact se actualizó con éxito');
    }

    public function destroy(Fact $fact)
    {
        $fact->delete();

        Cache::flush();

        return redirect()->route('admin.facts.index')->with('info', 'El fact se eliminó con éxito');
    }
}
