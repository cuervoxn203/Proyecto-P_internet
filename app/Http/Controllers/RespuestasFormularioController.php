<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\RespuestasFormulario;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class RespuestasFormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $respuestas = auth()->user()->respuestasFormulario;
        return view('respuestas_formularios.index', compact('respuestas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $formulario_id = $request->query('formulario_id');
        $formulario = Formulario::findOrFail($formulario_id);
        $preguntas = json_decode($formulario->preguntas, true);
        return view('respuestas_formularios.create', compact('formulario', 'preguntas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'formulario_id' => 'required|exists:formularios,id',
            'respuestas' => 'required|array',
            'respuestas.*' => 'required|string',
            'fecha' => 'required|date',
        ]);

        $data = $request->all();
        $data['respuestas'] = json_encode($request->input('respuestas'));

        RespuestasFormulario::create($data);

        return redirect()->route('respuestas_formularios.index')->with('success', 'Respuestas guardadas correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RespuestasFormulario $respuestasFormulario)
    {
        return view('respuestas_formularios.show', compact('respuestasFormulario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RespuestasFormulario $respuestasFormulario)
    {
        Gate::authorize('update', RespuestasFormulario::class);

        return view('respuestas_formularios.edit', compact('respuestasFormulario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RespuestasFormulario $respuestasFormulario)
    {
        Gate::authorize('update', RespuestasFormulario::class);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'formulario_id' => 'required|exists:formularios,id',
            'respuestas' => 'required|json',
            'fecha' => 'required|date',
        ]);

        $respuestasFormulario->update($request->all());

        return redirect()->route('respuestas_formularios.index')
                         ->with('success', 'Respuesta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RespuestasFormulario $respuestasFormulario)
    {
        Gate::authorize('delete', RespuestasFormulario::class);

        $respuestasFormulario->delete();

        return redirect()->route('respuestas_formularios.index')
                         ->with('success', 'Respuesta eliminada exitosamente.');
    }
}
