<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::with('usuario')->get();
        return view('reportes.index', compact('reportes'));
    }

    public function create()
    {
        return view('reportes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'datos_reporte' => 'required|json',
            'tipo_reporte' => 'required|string|max:255',
            'fecha_generacion' => 'required|date',
            'descripcion' => 'nullable|string',
        ]);

        Reporte::create($request->all());
        return redirect()->route('reportes.index')->with('success', 'Reporte creado exitosamente.');
    }

    public function show(Reporte $reporte)
    {
        return view('reportes.show', compact('reporte'));
    }

    public function edit(Reporte $reporte)
    {
        return view('reportes.edit', compact('reporte'));
    }

    public function update(Request $request, Reporte $reporte)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'datos_reporte' => 'required|json',
            'tipo_reporte' => 'required|string|max:255',
            'fecha_generacion' => 'required|date',
            'descripcion' => 'nullable|string',
        ]);

        $reporte->update($request->all());
        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado exitosamente.');
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado exitosamente.');
    }
}
