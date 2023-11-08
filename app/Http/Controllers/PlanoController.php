<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use App\Http\Requests\StorePlanoRequest;
use App\Http\Requests\UpdatePlanoRequest;

class PlanoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Plano::orderBy('preco', 'asc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Plano $plano)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plano $plano)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanoRequest $request, Plano $plano)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plano $plano)
    {
        //
    }
}
