<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class RepresentanteModel extends Model
{

    public static function VerificaExisteTipoDocumentoRepresentante($arrayCampos = []){

        $Resultado = DB::selectOne("
            SELECT COUNT(NUMDOC_REPRES) AS TOT_REG FROM t_representante WHERE ID_ESTADO = '1' AND COD_TIPDOC = :COD_TIPDOC AND NUMDOC_REPRES = :NUMDOC_REPRES
        ",$arrayCampos);

        return $Resultado;
    }


    public static function ObtenerCorrelativo_ID_REPRES()
    {
        $Resultado = DB::selectOne("
            SELECT ifnull(max(ID_REPRES),0)+1 as NewCodigo FROM t_representante
        ");
        return $Resultado;
    }

    

    public static function InsertarData_Representante($arrayCampos = []){

        $Resultado = DB::insert("
            INSERT INTO t_representante (
				ID_REPRES,
                NOM_FAMILIA,
                COD_TIPDOC,
                NUMDOC_REPRES,
                COD_TIPPARENT,
                NOMBRE_REPRES,
                APEPAT_REPRES,
                APEMAT_REPRES,
                ID_SEXO,
                FECNAC_REPRES,
                TEL_REPRES,
                CEL_REPRES,
                DIR_REPRES,
                CODDEP,
                CODPROV,
                CODDIST,
                LATITUD,
                LONGITUD,
                FECHA_REGISTRA,
                ID_ESTADO
			) VALUES(
				:ID_REPRES,
                :NOM_FAMILIA,
                :COD_TIPDOC,
                :NUMDOC_REPRES,
                :COD_TIPPARENT,
                :NOMBRE_REPRES,
                :APEPAT_REPRES,
                :APEMAT_REPRES,
                :ID_SEXO,
                :FECNAC_REPRES,
                :TEL_REPRES,
                :CEL_REPRES,
                :DIR_REPRES,
                :CODDEP,
                :CODPROV,
                :CODDIST,
                :LATITUD,
                :LONGITUD,
                NOW(),
                '1'
			)
		",$arrayCampos);

        return $Resultado;
    }



    public static function Delete_Representante($arrayCampos = [])
    {
        $Resultado = DB::update("
            UPDATE t_representante SET ID_ESTADO = '2' WHERE ID_REPRES = :ID_REPRES
        ", $arrayCampos);
        return $Resultado;
    }






    public static function Listar_Todo_Representantes_Familia_WebPage()
    {
        $Resultado = DB::select("            
            SELECT
            repres.ID_REPRES,
            repres.NOM_FAMILIA,
            repres.COD_TIPDOC,
            doc.ABREV_TIPDOC,
            repres.NUMDOC_REPRES,
            repres.COD_TIPPARENT,
            parent.DESC_TIPPARENT,
            repres.NOMBRE_REPRES,
            repres.APEPAT_REPRES,
            repres.APEMAT_REPRES,
            repres.ID_SEXO,
            sex.NOM_SEXO,
            repres.FECNAC_REPRES,
            repres.TEL_REPRES,
            repres.CEL_REPRES,
            repres.DIR_REPRES,
            repres.CODDEP,
            DEPA.NMBUBIGEO AS DEPARTAMENTO,
            repres.CODPROV,
            PROV.NMBUBIGEO AS PROVINCIA,
            repres.CODDIST,
            DIST.NMBUBIGEO AS DISTRITO,
            repres.LATITUD,
            repres.LONGITUD,
            repres.FECHA_REGISTRA,
            repres.ID_ESTADO
            FROM t_representante repres
            LEFT JOIN t_mae_tipo_doc doc ON (repres.COD_TIPDOC = doc.ID_TIPDOC)
            LEFT JOIN t_mae_sexo sex ON (sex.ID_SEXO = repres.ID_SEXO)
            LEFT JOIN t_mae_parentesco parent ON (parent.COD_TIPPARENT = repres.COD_TIPPARENT)
            LEFT JOIN t_ubigeo DEPA ON (DEPA.CODDEP = repres.CODDEP AND DEPA.CODPROV = '00' AND DEPA.CODDIST = '00')
            LEFT JOIN t_ubigeo PROV ON (PROV.CODDEP = repres.CODDEP AND PROV.CODPROV = repres.CODPROV AND PROV.CODDIST = '00')
            LEFT JOIN t_ubigeo DIST ON (DIST.CODDEP = repres.CODDEP AND DIST.CODPROV = repres.CODPROV AND DIST.CODDIST = repres.CODDIST)
            WHERE repres.ID_ESTADO = '1'
        ");
        return $Resultado;
    }



    public static function VerDatosRepresDetalladoById_WebPage($arrayCampos = [])
    {
        $Resultado = DB::selectOne("
           SELECT
            repres.ID_REPRES,
            repres.NOM_FAMILIA,
            repres.COD_TIPDOC,
            doc.ABREV_TIPDOC,
            repres.NUMDOC_REPRES,
            repres.COD_TIPPARENT,
            parent.DESC_TIPPARENT,
            repres.NOMBRE_REPRES,
            repres.APEPAT_REPRES,
            repres.APEMAT_REPRES,
            repres.ID_SEXO,
            sex.NOM_SEXO,
            repres.FECNAC_REPRES,
            repres.TEL_REPRES,
            repres.CEL_REPRES,
            repres.DIR_REPRES,
            repres.CODDEP,
            DEPA.NMBUBIGEO AS DEPARTAMENTO,
            repres.CODPROV,
            PROV.NMBUBIGEO AS PROVINCIA,
            repres.CODDIST,
            DIST.NMBUBIGEO AS DISTRITO,
            repres.LATITUD,
            repres.LONGITUD,
            repres.FECHA_REGISTRA,
            repres.ID_ESTADO
            FROM t_representante repres
            LEFT JOIN t_mae_tipo_doc doc ON (repres.COD_TIPDOC = doc.ID_TIPDOC)
            LEFT JOIN t_mae_sexo sex ON (sex.ID_SEXO = repres.ID_SEXO)
            LEFT JOIN t_mae_parentesco parent ON (parent.COD_TIPPARENT = repres.COD_TIPPARENT)
            LEFT JOIN t_ubigeo DEPA ON (DEPA.CODDEP = repres.CODDEP AND DEPA.CODPROV = '00' AND DEPA.CODDIST = '00')
            LEFT JOIN t_ubigeo PROV ON (PROV.CODDEP = repres.CODDEP AND PROV.CODPROV = repres.CODPROV AND PROV.CODDIST = '00')
            LEFT JOIN t_ubigeo DIST ON (DIST.CODDEP = repres.CODDEP AND DIST.CODPROV = repres.CODPROV AND DIST.CODDIST = repres.CODDIST)
            WHERE repres.ID_ESTADO = '1' AND repres.ID_REPRES = :ID_REPRES
        ", $arrayCampos);
        return $Resultado;
    }



}
