<?php
namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RecursoController extends Controller
{
    public function index()
    {
        $recursos = Recurso::all();
        return view('recursos.index', compact('recursos'));
    }

    public function create()
    {
        Gate::authorize('create', Recurso::class);
        return view('recursos.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Recurso::class);
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|string|max:100',
            'url' => 'required|url',
            'categoria' => 'required|string|max:100',
            'fecha_creacion' => 'required|date',
        ]);

        Recurso::create($request->all());

        return redirect()->route('recursos.index')->with('success', 'Recurso creado exitosamente.');
    }

    public function show(Recurso $recurso)
    {
        return view('recursos.show', compact('recurso'));
    }

    public function edit(Recurso $recurso)
    {
        Gate::authorize('update', $recurso);
        return view('recursos.edit', compact('recurso'));
    }

    public function update(Request $request, Recurso $recurso)
    {
        Gate::authorize('update', $recurso);
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|string|max:100',
            'url' => 'required|url',
            'categoria' => 'required|string|max:100',
            'fecha_creacion' => 'required|date',
        ]);

        $recurso->update($request->all());

        return redirect()->route('recursos.index')->with('success', 'Recurso actualizado exitosamente.');
    }

    public function destroy(Recurso $recurso)
    {
        Gate::authorize('delete', $recurso);
        $recurso->delete();

        return redirect()->route('recursos.index')->with('success', 'Recurso eliminado exitosamente.');
    }
}
