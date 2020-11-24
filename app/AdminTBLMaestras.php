<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class AdminTBLMaestras extends Model
{

    public static function Listar_TipoDocumento()
    {
        $Resultado = DB::select("SELECT * FROM t_mae_tipo_doc WHERE ID_ESTADO = 1");
        return $Resultado;
    }


    public static function Listar_Sexo()
    {
        $Resultado = DB::select("SELECT * FROM t_mae_sexo WHERE ID_ESTADO = 1");
        return $Resultado;
    }


    public static function Listar_EstadoCivil()
    {
        $Resultado = DB::select("SELECT * FROM t_mae_estadocivil WHERE ID_ESTADO = 1");
        return $Resultado;
    }



    //-----------------------------------------------------------------------------
    //----------------------------   UBIGEO     -----------------------------------
    //-----------------------------------------------------------------------------

    public static function Listar_Departamento(){
        $Resultado = DB::select("
            SELECT * FROM t_ubigeo WHERE FLAG = 'D' AND CODREGION != '00' ORDER BY NMBUBIGEO
        ");
        return $Resultado;
    }

    public static function Listar_Provincia($arrayCampos = []){
        $Resultado = DB::select("
            SELECT * FROM t_ubigeo WHERE FLAG = 'P' AND CODREGION != '00' AND CODDEP = :CODDEP ORDER BY NMBUBIGEO
        ", $arrayCampos);
        return $Resultado;
    }


    public static function Listar_Distrito($arrayCampos = []){
        $Resultado = DB::select("
        SELECT * FROM t_ubigeo WHERE FLAG = 'T' AND CODREGION != '00' AND CODDEP = :CODDEP AND CODPROV = :CODPROV ORDER BY NMBUBIGEO
        ", $arrayCampos);
        return $Resultado;
    }

}
