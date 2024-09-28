<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;

class FormularioController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los formularios disponibles
        $formularios = Formulario::all();

        // Retornar la vista con los formularios
        return view('formularios.index', compact('formularios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formularios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'preguntas' => 'required|array', 
            'preguntas.*' => 'required|string|max:255', 
        ]);

        // Crear un nuevo formulario
        $formulario = new Formulario();
        $formulario->nombre = $request->nombre;
        $formulario->descripcion = $request->descripcion;
        $formulario->preguntas = json_encode($request->preguntas); // Guardar las preguntas como un JSON
        $formulario->save(); // Guardar en la base de datos

        return redirect()->route('formularios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formulario $formulario)
    {
        return view('formularios.show', compact('formulario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formulario $formulario)
    {
        return view('formularios.edit', compact('formulario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formulario $formulario)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'preguntas' => 'required|array', 
            'preguntas.*' => 'required|string|max:255', 
        ]);

        // Actualiza el formulario
        $formulario->nombre = $request->nombre;
        $formulario->descripcion = $request->descripcion;
        $formulario->preguntas = json_encode($request->preguntas); // Guardar las preguntas como un JSON
        $formulario->save();

        return redirect()->route('formularios.show', $formulario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formulario $formulario)
    {
        $formulario->delete();
        return redirect()->route('formularios.index');
    }
}
