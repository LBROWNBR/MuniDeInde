<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class AdminPersonal extends Model
{

    public static function ListarAllPersonal()
    {
        $Resultado = DB::select('SELECT * FROM t_personal WHERE ID_ESTADO = 1 ORDER BY APEPAT_PERSONAL, APEMAT_PERSONAL, ID_TIPDOC');
        return $Resultado;
    }

    public static function VerDatoPersonalByID($arrayCampos = [])
    {
        $Resultado = DB::selectOne('SELECT * FROM t_personal WHERE ID_PERSONAL = :ID_PERSONAL', $arrayCampos);
        return $Resultado;
    }

    public static function ListarAllPersonalDetallado()
    {
        $Resultado = DB::select("
            SELECT
            P.ID_PERSONAL,
            P.APEPAT_PERSONAL,
            P.APEMAT_PERSONAL,
            P.NOM_PERSONAL,
            P.ID_TIPDOC,
            TD.ABREV_TIPDOC,
            TD.NOM_TIPDOC,
            P.NUM_DOC,
            P.ID_SEXO,
            S.NOM_SEXO,
            P.ID_ESTCIV,
            EC.NOM_ESTCIV,
            P.FECH_NACIMIENTO,
            P.TEL_FIJO,
            P.CELULAR,
            P.CORREO,
            P.ID_DEPA,
            DEPA.NMBUBIGEO AS DEPARTAMENTO,
            P.ID_PROV,
            PROV.NMBUBIGEO AS PROVINCIA,
            P.ID_DIST,
            DIST.NMBUBIGEO AS DISTRITO,
            P.NOM_DIRECCION,
            P.NUM_DIRECCION,
            P.REF_DIRECCION,
            P.FOTO_PERSONAL,
            P.ID_ESTADO
            FROM t_personal P
            LEFT JOIN t_mae_tipo_doc TD ON (TD.ID_TIPDOC = P.ID_TIPDOC)
            LEFT JOIN t_mae_sexo S ON (S.ID_SEXO = P.ID_SEXO)
            LEFT JOIN t_mae_estadocivil EC ON (EC.ID_ESTCIV = P.ID_ESTCIV)
            LEFT JOIN t_ubigeo DEPA ON (DEPA.CODDEP = P.ID_DEPA AND DEPA.CODPROV = '00' AND DEPA.CODDIST = '00')
            LEFT JOIN t_ubigeo PROV ON (PROV.CODDEP = P.ID_DEPA AND PROV.CODPROV = P.ID_PROV AND PROV.CODDIST = '00')
            LEFT JOIN t_ubigeo DIST ON (DIST.CODDEP = P.ID_DEPA AND DIST.CODPROV = P.ID_PROV AND DIST.CODDIST = P.ID_DIST)
            WHERE P.id_estado = '1'
        ");
        return $Resultado;
    }


    public static function ObtenerCorrelativoID_PERSONAL()
    {
        $Resultado = DB::selectOne("
            SELECT ifnull(max(ID_PERSONAL),0)+1 as NewCodigo FROM t_personal
        ");
        return $Resultado;
    }


    public static function InsertData_Personal($arrayCampos = [])
    {
        $Resultado = DB::insert("
			INSERT INTO t_personal (
                ID_PERSONAL,
				APEPAT_PERSONAL,
				APEMAT_PERSONAL,
				NOM_PERSONAL,
				ID_TIPDOC,
                NUM_DOC,
                ID_SEXO,
                ID_ESTCIV,
                FECH_NACIMIENTO,
                TEL_FIJO,
                CELULAR,
                CORREO,
                ID_DEPA,
                ID_PROV,
                ID_DIST,
                NOM_DIRECCION,
                NUM_DIRECCION,
                REF_DIRECCION,
                FOTO_PERSONAL,
                ID_ESTADO,
                FECH_REGISTRA
			) VALUES(
                :ID_PERSONAL,
				:APEPAT_PERSONAL,
				:APEMAT_PERSONAL,
				:NOM_PERSONAL,
				:ID_TIPDOC,
                :NUM_DOC,
                :ID_SEXO,
                :ID_ESTCIV,
                :FECH_NACIMIENTO,
                :TEL_FIJO,
                :CELULAR,
                :CORREO,
                :ID_DEPA,
                :ID_PROV,
                :ID_DIST,
                :NOM_DIRECCION,
                :NUM_DIRECCION,
                :REF_DIRECCION,
                'SIN FOTO',
                '1',
                NOW()
			)
        ",$arrayCampos);

        return $Resultado;
    }



    public static function UpdateData_Personal($arrayCampos = [])
    {
        $Resultado = DB::update('
        	UPDATE t_personal SET
            APEPAT_PERSONAL = :APEPAT_PERSONAL,
            APEMAT_PERSONAL = :APEMAT_PERSONAL,
            NOM_PERSONAL = :NOM_PERSONAL,
            ID_TIPDOC = :ID_TIPDOC,
            NUM_DOC = :NUM_DOC,
            ID_SEXO = :ID_SEXO,
            ID_ESTCIV = :ID_ESTCIV,
            FECH_NACIMIENTO = :FECH_NACIMIENTO,
            TEL_FIJO = :TEL_FIJO,
            CELULAR = :CELULAR,
            CORREO = :CORREO,
            ID_DEPA = :ID_DEPA,
            ID_PROV = :ID_PROV,
            ID_DIST = :ID_DIST,
            NOM_DIRECCION = :NOM_DIRECCION,
            NUM_DIRECCION = :NUM_DIRECCION,
            REF_DIRECCION = :REF_DIRECCION,
            FECH_ACTUALIZA = NOW()
        	WHERE ID_PERSONAL 	= :ID_PERSONAL
        ', $arrayCampos);

        return $Resultado;
    }



    public static function DeleteData_Personal($arrayCampos = [])
    {
        $Resultado = DB::update("
        	UPDATE t_personal SET
            ID_ESTADO = '2',
            FECH_ELIMINA = NOW()
        	WHERE ID_PERSONAL 	= :ID_PERSONAL
        ", $arrayCampos);

        return $Resultado;
    }

}
