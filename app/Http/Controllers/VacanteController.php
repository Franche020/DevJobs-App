<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Vacante;
use Illuminate\Http\Request;


class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostrar el dashboard con el indice de las vacantes publicadas por el usuario
        return view("/vacantes/index", [

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Creacion de vacantes

        return view("/vacantes/create");
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        //Mostrar las vacantes a todos los usuarios
        return view('vacantes/show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        $this->authorize('update', $vacante);
        // Edicion de las vacantes
        return view('vacantes.edit', [
            'vacante' => $vacante
        ]);
    }
}
