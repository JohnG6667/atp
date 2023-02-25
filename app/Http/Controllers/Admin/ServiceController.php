<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:services',
            'description' => 'required|max:255'
        ]);

        $service = Service::create($request->all());

        Cache::flush();

        return redirect()->route('admin.services.edit', $service)->with('info', 'El servicio se creó con éxito');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => "required|max:255|unique:services,name,$service->id",
            'description' => 'required|max:255'
        ]);

        $service->update($request->all());

        Cache::flush();

        return redirect()->route('admin.services.edit', $service)->with('info', 'El servicio se actualizó con éxito');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        Cache::flush();

        return redirect()->route('admin.services.index')->with('info', 'El servicio se eliminó con éxito');
    }
}
