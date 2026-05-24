<?php

namespace App\Http\Controllers;

use App\Models\InstructeurModel;
use Illuminate\Http\Request;

class InstructeurController extends Controller
{

    private $instructeurModel;

    public function __construct()
    {
        $this->instructeurModel = new InstructeurModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructeurs = $this->instructeurModel->SP_GetAllInstructeurs();

        return view('Instructeur.index', 
        [
            'title' => 'Instructeurs in dienst',
            'instructeurs' => $instructeurs
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
    public function show($id)
    {
        $instructeur = $this->instructeurModel->SP_GetInstructeurById($id);

        if (!$instructeur)
        {
            return redirect()->route('Instructeur.index')
                             ->with('error', 'Instructeur is niet gevonden');  
        }

        return view('Instructeur.show', [
            'title' => 'Door instructeur gebruikte voertuigen',
            'instructeur' => $instructeur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instructeur = $this->instructeurModel->SP_GetInstructeurById($id);
        abort_if(!$instructeur, 404);
        return view('Instructeur.edit', [
            'title' => 'Wijzigen voertuiggegevens',
            'instructeur' => $instructeur,
        ]);
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
