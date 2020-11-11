<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class CategoriaModel extends Model
{
    public static function ListarCategoriasMenu () {

        $Resultado = DB::select("SELECT * FROM categorias_de_producto WHERE eliminado = '0' AND estado_menu = '0' ");

        return $Resultado;
    }

}
