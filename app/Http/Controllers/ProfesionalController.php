<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesionals = Profesional::all();
        return view("profesionals.index-profesional", compact("profesionals"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("profesionals.create-profesional");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Profesional::create($request->all());
        return redirect()->route("profesional.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesional $profesional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profesional $profesional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesional $profesional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesional $profesional)
    {
        //
    }
}
