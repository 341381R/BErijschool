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
}
