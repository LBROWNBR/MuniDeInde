<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class MarcaModel extends Model
{
    public static function ListarMarcasCarrusel (){

        $Resultado = DB::select(" SELECT * FROM marcas WHERE eliminado = '0' and codigo in ('6','1','5','7','9','11','15') ");

        return $Resultado;

    }
}
