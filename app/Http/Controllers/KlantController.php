<?php

namespace App\Http\Controllers;

use App\Models\KlantModel;
use Illuminate\Http\Request;

class KlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Klant.index', 
        [
            'title' => 'klant'
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KlantModel $klantModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KlantModel $klantModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KlantModel $klantModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KlantModel $klantModel)
    {
        //
    }
}
