<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class AdminPersonal extends Model
{

    public static function VerDatoPersonalByID($arrayCampos = [])
    {
        $Resultado = DB::selectOne('SELECT * FROM T_PERSONAL WHERE ID_PERSONAL = :ID_PERSONAL', $arrayCampos);
        return $Resultado;
    }
}
