<?php

namespace App\Http\Controllers;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function subir(Request $request)
{
    $request->validate(['archivos.*' => 'required|file|mimes:jpg,png,pdf,docx|max:2048']);

    $archivos = $request->file('archivos');
    foreach ($archivos as $archivo) {
        $ruta = $archivo->store('archivos', 'public');
        Archivo::create([
            'nombre_original' => $archivo->getClientOriginalName(),
            'ruta' => $ruta,
        ]);
    }

    return redirect()->back()->with('success', 'Archivos subidos correctamente.');
}

    public function index()
    {
        $archivos = Archivo::all();
        return view('archivos.index', compact('archivos'));
    }

    public function descargar($id)
    {
    $archivo = Archivo::findOrFail($id);
    return response()->download(storage_path("app/public/{$archivo->ruta}"));
    }

    public function eliminar($id)
    {
    $archivo = Archivo::findOrFail($id);
    Storage::delete("public/{$archivo->ruta}");
    $archivo->delete();

    return redirect()->back()->with('success', 'Archivo eliminado correctamente.');
    }


}
