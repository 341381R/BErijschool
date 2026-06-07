<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoertuigModel extends Model
{
    public function SP_GetAllVoertuigen()
    {
        return DB::select('CALL SP_GetAllVoertuigen');
    }
}
