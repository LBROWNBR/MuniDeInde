<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class AdminRol extends Model
{
    public static function VerRolById($arrayCampos = [])
    {
        $Resultado = DB::selectOne("SELECT * FROM t_rol WHERE ID_ESTADO = '1' AND ID_ROL = :ID_ROL", $arrayCampos);
        return $Resultado;
    }
}
