<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use App\Models\UsuarioRecurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsuarioRecursoController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recursos = auth()->user()->usuarioRecursos;
        return view('usuario_recurso.index', compact('recursos'));
    }
    /**
     * Display the specified resource.
     */
    public function show(UsuarioRecurso $usuarioRecurso)
    {
        return view('usuario_recurso.show', compact('usuarioRecurso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsuarioRecurso $usuarioRecurso)
    {
        Gate::authorize('update', $usuarioRecurso);
        return view('usuario_recurso.edit', compact('usuarioRecurso'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', UsuarioRecurso::class);
        $recursos = Recurso::all();
        return view('usuario_recurso.create', compact('recursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', UsuarioRecurso::class);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'recurso_id' => 'required|exists:recursos,id',
            'ultimo_acceso' => 'required|date',
        ]);

        $usuarioRecurso = UsuarioRecurso::create($request->all());

        return redirect()->route('usuario_recurso.show', $usuarioRecurso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsuarioRecurso $usuarioRecurso)
    {
        Gate::authorize('update', $usuarioRecurso);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'recurso_id' => 'required|exists:recursos,id',
            'ultimo_acceso' => 'required|date',
        ]);
        $usuarioRecurso->update($request->all());

        return redirect()->route('usuario_recurso.show', $usuarioRecurso);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsuarioRecurso $usuarioRecurso)
    {
        Gate::authorize('delete', $usuarioRecurso);
        $usuarioRecurso->delete();

        return redirect()->route('usuario_recurso.index');
    }
}
