<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use App\Models\Terapeuta;
use Illuminate\Support\Facades\Gate;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén todas las consultas con el terapeuta asociado
        $consultas = Consulta::with('terapeuta')->get();
        // Pasar las consultas a la vista
        return view('consultas.index', compact('consultas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Consulta::class);
        $terapeutas = Terapeuta::all(); // Obtiene todos los terapeutas
        return view('consultas.create', compact('terapeutas'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Consulta::class);
        // Validacion
        $request->validate([
            'paciente_id' => 'required|exists:users,id',
            'descripcion' => 'required|string',
            'fecha_hora' => 'required|date',
            'terapeuta_id' => 'required|exists:terapeutas,id',
        ]);

        Consulta::create([
            'paciente_id' => $request->paciente_id,
            'descripcion' => $request->descripcion,
            'fecha_hora' => $request->fecha_hora,
            'terapeuta_id' => $request->terapeuta_id,
        ]);

        return redirect()->route('consultas.index')->with('success', 'Consulta creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encontrar la consulta por ID con su terapeuta relacionado
        $consulta = Consulta::with('terapeuta')->findOrFail($id);

        // Pasar la consulta a la vista
        return view('consultas.show', compact('consulta'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        Gate::authorize('update', Consulta::class);
        {
            // Encontrar la consulta por ID con su terapeuta relacionado
            $consulta = Consulta::with('terapeuta')->findOrFail($id);
            $terapeutas = Terapeuta::all();

            // Pasar la consulta y terapeutas a la vista
            return view('consultas.edit', compact('consulta', 'terapeutas'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('update', Consulta::class);
        // Validar los datos recibidos
        $request->validate([
            'paciente_id' => 'required|exists:users,id',
            'descripcion' => 'required|string',
            'fecha_hora' => 'required|date',
            'terapeuta_id' => 'required|exists:terapeutas,id',
        ]);
        // Encontrar la consulta y actualizarla
        $consulta = Consulta::findOrFail($id);
        $consulta->update($request->all());

        // Redirigir con mensaje de éxito
        return redirect()->route('consultas.index')->with('success', 'Consulta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('delete', Consulta::class);
        // Encontrar la consulta por ID y eliminarla
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('consultas.index')->with('success', 'Consulta eliminada exitosamente.');
    }
}
