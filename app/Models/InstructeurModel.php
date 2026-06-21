<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InstructeurModel extends Model
{
    public function SP_GetAllInstructeurs()
    {
        return DB::select('CALL SP_GetAllInstructeurs');
    }

    public function SP_GetInstructeurById($id)
    {
        return DB::select(
            'CALL SP_GetInstructeurById(:id)',
            ['id' => $id]
        );
    }

    public function SP_GetVoertuigById($id)
    {
        return DB::selectOne(
            'CALL SP_GetVoertuigById(:id)',
            ['id' => $id]
        );
    }

    public function SP_GetAllVoertuigen()
    {
        return DB::select(
            'CALL SP_GetAllVoertuigen',
        );
    }

    public function SP_DeleteInstructeur($VoertuigId, $VoertuigInstructeurId)
    {
        $result = DB::selectOne('CALL SP_DeleteInstructeur(:VoertuigId, :VoertuigInstructeurId)', [
            'VoertuigId' => $VoertuigId,
            'VoertuigInstructeurId' => $VoertuigInstructeurId
        ]);

        return $result->affected ?? [];
    }

    public function SP_ToggleInstructeurStatus($id)
    {
        DB::statement(
            'CALL SP_ToggleInstructeurStatus(:id)',
            ['id' => $id]
        );
    }
}
