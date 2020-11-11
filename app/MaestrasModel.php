<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class MaestrasModel extends Model
{

    //-----------------------------------------------------------------------------
    //----------------------------   UBIGEO     -----------------------------------
    //-----------------------------------------------------------------------------

    public static function ListarDepartamento(){
        $Resultado = DB::select("
            SELECT * FROM t_ubigeo WHERE FLAG = 'D' AND CODREGION != '00' ORDER BY NMBUBIGEO
        ");
        return $Resultado;
    }

    public static function ListarProvincia($arrayCampos = []){
        $Resultado = DB::select("
            SELECT * FROM t_ubigeo WHERE FLAG = 'P' AND CODREGION != '00' AND CODDEP = :CODDEP ORDER BY NMBUBIGEO
        ", $arrayCampos);
        return $Resultado;
    }


    public static function ListarDistrito($arrayCampos = []){
        $Resultado = DB::select("
        SELECT * FROM t_ubigeo WHERE FLAG = 'T' AND CODREGION != '00' AND CODDEP = :CODDEP AND CODPROV = :CODPROV ORDER BY NMBUBIGEO
        ", $arrayCampos);
        return $Resultado;
    }


    //-----------------------------------------------------------------------------
    //------------------------   TIPO DOCUMENTO     -------------------------------
    //-----------------------------------------------------------------------------

    public static function ListarTipoDocumento(){
        $Resultado = DB::select("
            SELECT * FROM t_mae_tipo_doc WHERE ID_ESTADO = '1'
        ");
        return $Resultado;
    }


    //-----------------------------------------------------------------------------
    //------------------------   TIPO GENERO     -------------------------------
    //-----------------------------------------------------------------------------

    public static function ListarTipoGenero(){
        $Resultado = DB::select("
            SELECT * FROM t_mae_sexo WHERE ID_ESTADO = '1'
        ");
        return $Resultado;
    }


}
