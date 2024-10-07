<?php

namespace App\Http\Controllers;

use App\Models\Terapeuta;
use Illuminate\Http\Request;

class TerapeutaController extends Controller
{
    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('terapeutas.create'); // Vista para el formulario
    }

    // Método para manejar el envío del formulario y almacenar los datos
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:terapeutas',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        // Guardar los datos en la base de datos
        Terapeuta::create($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('terapeutas.create')->with('success', 'Terapeuta creado exitosamente');
    }

    // Método para mostrar el formulario de edición de un terapeuta
    public function edit($id)
    {
        // Buscar el terapeuta por su ID
        $terapeuta = Terapeuta::findOrFail($id);

        // Retornar la vista con los datos del terapeuta para editar
        return view('terapeutas.edit', compact('terapeuta'));
    }

    // Método para manejar la actualización de los datos del terapeuta
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:terapeutas,email,' . $id,
            'especialidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        // Buscar al terapeuta y actualizar los datos
        $terapeuta = Terapeuta::findOrFail($id);
        $terapeuta->update($validated);

        // Redirigir a la vista de edición con un mensaje de éxito
        return redirect()->route('terapeutas.edit', $terapeuta->id)->with('success', 'Terapeuta actualizado exitosamente');
    }


    public function destroy($id)
    {
    // Buscar al terapeuta por su ID y eliminarlo
    $terapeuta = Terapeuta::findOrFail($id);
    $terapeuta->delete();

    // Redirigir con un mensaje de éxito
    return redirect()->route('terapeutas.create')->with('success', 'Terapeuta eliminado exitosamente');
    }


    public function index()
    {
    // Obtener todos los terapeutas
    $terapeutas = Terapeuta::all();

    // Retornar la vista con la lista de terapeutas
    return view('terapeutas.index', compact('terapeutas'));
    }


}
