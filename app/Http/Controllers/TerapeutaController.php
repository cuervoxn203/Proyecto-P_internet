<?php

namespace App\Http\Controllers;

use App\Models\Terapeuta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('create', Terapeuta::class);
        return view('terapeutas.create'); // Vista para el formulario
    }

    /**
     * Almacenar un nuevo terapeuta en la base de datos.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Terapeuta::class);
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:terapeutas',
            'especialidad' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'telefono' => 'required|numeric|digits:10', // Cambiado a digits:10
        ], [
            'nombre.regex' => 'El campo nombre solo puede contener letras y espacios.',
            'especialidad.regex' => 'El campo especialidad solo puede contener letras y espacios.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.numeric' => 'El campo teléfono debe contener solo números.',
            'telefono.digits' => 'El campo teléfono debe tener exactamente 10 dígitos.', // Mensaje actualizado
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
    public function edit($id)
    {
        Gate::authorize('update', Terapeuta::class);
        $terapeuta = Terapeuta::findOrFail($id); // Esto cargará el terapeuta correspondiente
        return view('terapeutas.edit', compact('terapeuta')); // Asegúrate de que la vista edit exista
    }

    /**
     * Actualizar un terapeuta existente en la base de datos.
     */
    public function update(Request $request, Terapeuta $terapeuta)
    {
        Gate::authorize('update', $terapeuta);
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
            'telefono' => 'required|numeric|digits:10', // Cambiado a digits:10
        ], [
            'nombre.regex' => 'El campo nombre solo puede contener letras y espacios.',
            'especialidad.regex' => 'El campo especialidad solo puede contener letras y espacios.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.numeric' => 'El campo teléfono debe contener solo números.',
            'telefono.digits' => 'El campo teléfono debe tener exactamente 10 dígitos.',
        ]);

        // Actualizar los datos en la base de datos
        $terapeuta->update($validated);

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('terapeutas.index')->with('success', 'Terapeuta actualizado exitosamente');
    }



    /**
     * Eliminar un terapeuta de la base de datos.
     */
    public function destroy(Terapeuta $terapeuta)
    {
        Gate::authorize('delete', $terapeuta);
        // Eliminar el terapeuta
        $terapeuta->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('terapeutas.index')->with('success', 'Terapeuta eliminado exitosamente');
    }
}
