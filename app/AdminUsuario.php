<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class AdminUsuario extends Model
{
    public static function VerDatoUsuarioByMail($arrayCampos = [])
    {
        $Resultado = DB::selectOne("SELECT * FROM users WHERE id_estado = '1' AND email = :email", $arrayCampos);
        return $Resultado;
    }

    public static function VerDatoUsuarioById($arrayCampos = [])
    {
        $Resultado = DB::selectOne("SELECT * FROM users WHERE id = :id", $arrayCampos);
        return $Resultado;
    }

    public static function VerDatoCompletoUsuarioById($arrayCampos = [])
    {
        $Resultado = DB::selectOne("
        SELECT
            U.id AS ID_USER,
            U.email,
            U.id_estado,
            U.id_rol,
            R.NOM_ROL,
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
            P.ID_ESTADO AS ID_ESTADO_PERS
        FROM users U
        LEFT JOIN t_personal P ON(U.id_personal = P.ID_PERSONAL AND P.ID_ESTADO = '1')
        LEFT JOIN t_mae_tipo_doc TD ON (TD.ID_TIPDOC = P.ID_TIPDOC)
        LEFT JOIN t_mae_sexo S ON (S.ID_SEXO = P.ID_SEXO)
        LEFT JOIN t_mae_estadocivil EC ON (EC.ID_ESTCIV = P.ID_ESTCIV)
        LEFT JOIN t_ubigeo DEPA ON (DEPA.CODDEP = P.ID_DEPA AND DEPA.CODPROV = '00' AND DEPA.CODDIST = '00')
        LEFT JOIN t_ubigeo PROV ON (PROV.CODDEP = P.ID_DEPA AND PROV.CODPROV = P.ID_PROV AND PROV.CODDIST = '00')
        LEFT JOIN t_ubigeo DIST ON (DIST.CODDEP = P.ID_DEPA AND DIST.CODPROV = P.ID_PROV AND DIST.CODDIST = P.ID_DIST)
        LEFT JOIN t_rol R ON (R.ID_ROL = U.id_rol)
        WHERE U.id_estado = '1'
        AND U.id = :id_user
        ", $arrayCampos);
        return $Resultado;
    }


    //#######################################################
    //#######################################################
    //#######################################################

    public static function List_All_User()
    {
        $Resultado = DB::select("
            SELECT
            U.id AS ID_USER,
            U.email,
            U.id_estado,
            U.id_rol,
            R.NOM_ROL,
            P.ID_PERSONAL,
            P.APEPAT_PERSONAL,
            P.APEMAT_PERSONAL,
            P.NOM_PERSONAL,
            P.NUM_DOC,
            P.FECH_NACIMIENTO,
            P.CELULAR,
            P.CORREO
            FROM users U
            LEFT JOIN t_personal P ON(U.id_personal = P.ID_PERSONAL AND P.ID_ESTADO = '1')
            LEFT JOIN t_rol R ON (R.ID_ROL = U.id_rol)
            WHERE U.id_estado = '1'
        ");
        return $Resultado;
    }


    public static function Verifica_Existe_Usuario($arrayCampos = [])
    {
        $Resultado = DB::selectOne("
            SELECT COUNT(email) as tot_reg
            FROM users
            WHERE email = :email
            AND id_estado = '1'
        ", $arrayCampos);

        return $Resultado;
    }

    public static function Verifica_Existe_Usuario_Edit($arrayCampos = [])
    {
        $Resultado = DB::selectOne("
            SELECT COUNT(email) as tot_reg
            FROM users
            WHERE email = :email
            AND id_estado = '1'
            AND id != :id
        ", $arrayCampos);

        return $Resultado;
    }


    public static function InsertData_User($arrayCampos = [])
    {
        $Menu = DB::insert("
            INSERT INTO users (
                id_personal,
                id_rol,
                email,
                password,
                created_at,
                id_estado
            ) VALUES(
                :id_personal,
                :id_rol,
                :email,
                :password,
                NOW(),
                '1'
            )
        ",$arrayCampos);

        $CodInsertado = DB::getPdo()->lastInsertId();

        return $CodInsertado;
    }


    public static function UpdateData_User($arrayCampos = [])
    {
        $Resultado = DB::update('
            UPDATE users SET
            id_personal = :id_personal,
            id_rol = :id_rol,
            email = :email,
            password = :password,
            updated_at = NOW()
            WHERE id = :id
        ', $arrayCampos);

        return $Resultado;
    }


    public static function Delete_User($arrayCampos = [])
    {
        $Resultado = DB::update("
            UPDATE users SET
                id_estado = '2',
                updated_at = NOW()
            WHERE id = :id
        ", $arrayCampos);

        return $Resultado;
    }

}
