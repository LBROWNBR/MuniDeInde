<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class ClienteModel extends Model
{

    public static function InsertarData_Cliente($arrayCampos = []){

        $Resultado = DB::insert("
            INSERT INTO t_clientes (
				NOMBRE_CLI,
				APELLIDOS_CLI,
				ID_TIPDOC,
                NUMDOC_CLI,
                ID_SEXO,
                FECHNAC_CLI,
                TEL_CLI,
                CEL_CLI,
                CORREO_CLI,
                DIREC_CLI,
                ID_DEPA,
                ID_PROV,
                ID_DIST,
                ID_ESTADO,
                FECH_REGISTRA,
                USER_CLI,
                PASS_CLI
			) VALUES(
				:NOMBRE_CLI,
				:APELLIDOS_CLI,
				:ID_TIPDOC,
                :NUMDOC_CLI,
                :ID_SEXO,
                :FECHNAC_CLI,
                :TEL_CLI,
                :CEL_CLI,
                :CORREO_CLI,
                :DIREC_CLI,
                :ID_DEPA,
                :ID_PROV,
                :ID_DIST,
                '1',
                NOW(),
                :USER_CLI,
                :PASS_CLI
			)
		",$arrayCampos);

        $CodInsertado = DB::getPdo()->lastInsertId();

        return $CodInsertado;
    }


    public static function VerificaExisteCorreoCliente($arrayCampos = []){

        $Resultado = DB::selectOne("
            SELECT COUNT(CORREO_CLI) AS TOT_CLI FROM t_clientes WHERE ID_ESTADO = '1' AND CORREO_CLI = :CORREO_CLI
        ",$arrayCampos);

        return $Resultado;
    }


    public static function VerificaExisteTipoDocumentoCliente($arrayCampos = []){

        $Resultado = DB::selectOne("
            SELECT COUNT(NUMDOC_CLI) AS TOT_REGCLI FROM t_clientes WHERE ID_ESTADO = '1' AND ID_TIPDOC = :ID_TIPDOC AND NUMDOC_CLI = :NUMDOC_CLI
        ",$arrayCampos);

        return $Resultado;
    }


    public static function VerificaExisteUsuarioCliente($arrayCampos = []){

        $Resultado = DB::selectOne("
            SELECT COUNT(USER_CLI) AS TOT_USER FROM t_clientes WHERE ID_ESTADO = '1' AND USER_CLI = :USER_CLI
        ",$arrayCampos);

        return $Resultado;
    }




    public static function VerDatosCliente_x_ID($arrayCampos = []){

        $Resultado = DB::selectOne("
            SELECT * FROM t_clientes WHERE ID_ESTADO = '1' AND ID_CLI = :ID_CLI
        ",$arrayCampos);

        return $Resultado;
    }



    public static function VerDatosCliente_x_UserCliente($arrayCampos = []){

        $Resultado = DB::selectOne("
            SELECT * FROM t_clientes WHERE ID_ESTADO = '1' AND USER_CLI = :USER_CLI
        ",$arrayCampos);

        return $Resultado;
    }






}
