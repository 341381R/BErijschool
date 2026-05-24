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
}
