<?php

namespace App\Http\Controllers;

use App\Models\VoertuigModel;
use Illuminate\Http\Request;

class VoertuigController extends Controller
{
    private $voertuigModel;

    public function __construct()
    {
        $this->voertuigModel = new VoertuigModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voertuigen = $this->voertuigModel->SP_GetAllVoertuigen();

        return view('Voertuig.index', 
        [
            'title' => 'Alle voertuigen',
            'voertuigen' => $voertuigen
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
    public function show(VoertuigModel $voertuigModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VoertuigModel $voertuigModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VoertuigModel $voertuigModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VoertuigModel $voertuigModel)
    {
        //
    }
}
