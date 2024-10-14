<?php

namespace App\Http\Controllers;

use App\Models\Terapeuta;
use Illuminate\Http\Request;

class TerapeutaController extends Controller
{
    /**
     * Mostrar una lista de todos los terapeutas.
     */
    public function index()
    {
        // Obtener todos los terapeutas
        $terapeutas = Terapeuta::all();

        // Retornar la vista con la lista de terapeutas
        return view('terapeutas.index', compact('terapeutas'));
    }

    /**
     * Mostrar el formulario para crear un nuevo terapeuta.
     */
    public function create()
    {
        return view('terapeutas.create'); // Vista para el formulario
    }

    /**
     * Almacenar un nuevo terapeuta en la base de datos.
     */
    public function store(Request $request)
{
    // Validar los datos
    $validated = $request->validate([
        'nombre' => [
            'required',
            'regex:/^[\pL\s]+$/u', // Permite letras y espacios, incluyendo caracteres Unicode
            'max:255',
        ],
        'email' => 'required|email|unique:terapeutas',
        'especialidad' => [
            'required',
            'regex:/^[\pL\s]+$/u', // Permite letras y espacios, incluyendo caracteres Unicode
            'max:255',
        ],
        'telefono' => 'required|numeric|digits_between:7,15',
    ], [
        'nombre.regex' => 'El campo nombre solo puede contener letras y espacios.',
        'especialidad.regex' => 'El campo especialidad solo puede contener letras y espacios.',
    ]);

    // Guardar los datos en la base de datos
    Terapeuta::create($validated);

    // Redirigir con un mensaje de éxito
    return redirect()->route('terapeutas.index')->with('success', 'Terapeuta creado exitosamente');
}


    /**
     * Mostrar un terapeuta específico.
     */
    public function show(Terapeuta $terapeuta)
    {
        // Retornar la vista con los detalles del terapeuta
        return view('terapeutas.show', compact('terapeuta'));
    }

    /**
     * Mostrar el formulario para editar un terapeuta existente.
     */
    public function edit(Terapeuta $terapeuta)
    {
        // Retornar la vista con los datos del terapeuta para editar
        return view('terapeutas.edit', compact('terapeuta'));
    }

    /**
     * Actualizar un terapeuta existente en la base de datos.
     */
    public function update(Request $request, Terapeuta $terapeuta)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre' => [
                'required',
                'regex:/^[\pL\s]+$/u', // Permite letras y espacios, incluyendo caracteres Unicode
                'max:255',
            ],
            'email' => 'required|email|unique:terapeutas,email,' . $terapeuta->id,
            'especialidad' => [
                'required',
                'regex:/^[\pL\s]+$/u', // Permite letras y espacios, incluyendo caracteres Unicode
                'max:255',
            ],
            'telefono' => 'required|numeric|digits_between:7,15',
        ], [
            'nombre.regex' => 'El campo nombre solo puede contener letras y espacios.',
            'especialidad.regex' => 'El campo especialidad solo puede contener letras y espacios.',
        ]);
    
        // Actualizar los datos en la base de datos
        $terapeuta->update($validated);
    
        // Redirigir a la vista de edición con un mensaje de éxito
        return redirect()->route('terapeutas.edit', $terapeuta)->with('success', 'Terapeuta actualizado exitosamente');
    }
    

    /**
     * Eliminar un terapeuta de la base de datos.
     */
    public function destroy(Terapeuta $terapeuta)
    {
        // Eliminar el terapeuta
        $terapeuta->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('terapeutas.index')->with('success', 'Terapeuta eliminado exitosamente');
    }
}
