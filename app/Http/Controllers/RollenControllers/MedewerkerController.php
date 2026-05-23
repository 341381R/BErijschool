<?php

namespace App\Http\Controllers;

use App\Models\MedewerkerModel;
use Illuminate\Http\Request;

class MedewerkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Medewerker.index', 
        [
            'title' => 'medweerker'
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
    public function show(MedewerkerModel $medewerkerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedewerkerModel $medewerkerModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedewerkerModel $medewerkerModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedewerkerModel $medewerkerModel)
    {
        //
    }
}
