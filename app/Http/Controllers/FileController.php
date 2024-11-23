<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        // Recupera todos los usuarios con su foto de perfil
        $users = User::select('id', 'name', 'profile_photo_path')->paginate(10);

        // Lista de archivos huérfanos
        $allFiles = Storage::disk('public')->allFiles('profile_photos');
        $referencedFiles = User::whereNotNull('profile_photo_path')->pluck('profile_photo_path')->toArray();
        $orphanFiles = array_diff($allFiles, $referencedFiles);

        return view('files.index', compact('users', 'orphanFiles'));
    }

    public function destroy($id)
    {   
        $user = User::findOrFail($id);

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path); // Elimina el archivo físico
            $user->update(['profile_photo_path' => null]); // Limpia la referencia en la BD
        }

        return redirect()->route('files.index')->with('message', 'Archivo eliminado correctamente.');
    }

    public function cleanOrphans()
    {
        // Obtén todos los archivos en la carpeta de almacenamiento
        $allFiles = Storage::disk('public')->allFiles('profile_photos');
        $referencedFiles = User::whereNotNull('profile_photo_path')->pluck('profile_photo_path')->toArray();
        $orphanFiles = array_diff($allFiles, $referencedFiles);

        // Elimina archivos huérfanos
        foreach ($orphanFiles as $file) {
            Storage::disk('public')->delete($file);
        }

        return redirect()->route('files.index')->with('message', 'Archivos huérfanos eliminados correctamente.');
    }
}
