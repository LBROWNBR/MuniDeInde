<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class AdminRol extends Model
{

    public static function List_All_Rol()
    {
        $Resultado = DB::select('SELECT * FROM t_rol WHERE ID_ESTADO = 1');
        return $Resultado;
    }

    public static function VerRolById($arrayCampos = [])
    {
        $Resultado = DB::selectOne("SELECT * FROM t_rol WHERE ID_ESTADO = '1' AND ID_ROL = :ID_ROL", $arrayCampos);
        return $Resultado;
    }

    public static function ObtenerCorrelativoID_ROL()
    {
        $Resultado = DB::selectOne("
            SELECT ifnull(max(ID_ROL),0)+1 as NewCodigo FROM t_rol
        ");
        return $Resultado;
    }


    public static function InsertData_Rol($arrayCampos = [])
    {
        $Insertado = DB::insert("
			INSERT INTO t_rol (
                ID_ROL,
				NOM_ROL,
				ID_ESTADO
			) VALUES(
                :ID_ROL,
				:NOM_ROL,
				'1'
			)
		",$arrayCampos);

        return $Insertado;
    }


    public static function UpdateData_Rol($arrayCampos = [])
    {
        $Resultado = DB::update('
        	UPDATE t_rol SET NOM_ROL = :NOM_ROL WHERE ID_ROL = :ID_ROL
        ', $arrayCampos);

        return $Resultado;
    }


    public static function Delete_Rol($arrayCampos = [])
    {
    	$Resultado = DB::update("
    		UPDATE t_rol SET ID_ESTADO = '2' WHERE ID_ROL = :ID_ROL
        ", $arrayCampos);
        //$Resultado = DB::delete('DELETE FROM t_rol WHERE ID_ROL = :ID_ROL', $arrayCampos);
        return $Resultado;
    }


    //=======================================================================================
    //=======================================================================================
    //=======================================================================================
    //=======================================================================================


    public static function ListarMenu_x_ROL($arrayCampos = [])
    {
        $Resultado = DB::select("
        	SELECT
			men.ID_MENU,
			men.DESC_MENU,
			men.ICONO
			FROM t_rol_menu rm
			INNER JOIN t_menus_sub02 msub2 ON (msub2.ID_MENUSUB02 = rm.ID_MENUSUB02 AND msub2.ID_ESTADO = '1')
			INNER JOIN t_menus_sub01 msub1 ON (msub1.ID_MENUSUB01 = msub2.ID_MENUSUB01 AND msub1.ID_ESTADO = '1')
			INNER JOIN t_menus men ON (men.ID_MENU = msub1.ID_MENU AND men.ID_ESTADO = '1')
			WHERE rm.ID_ROL = :ID_ROL
			GROUP BY men.ID_MENU, men.DESC_MENU, men.ICONO
			ORDER BY men.ORDEN
        ", $arrayCampos);
        return $Resultado;
    }


    public static function ListarSubMenu01_x_ROL($arrayCampos = [])
    {
        $Resultado = DB::select("
        	SELECT
			msub1.ID_MENU,
			msub1.ID_MENUSUB01,
			msub1.DESC_MENUSUB01,
			msub1.ICONO AS icono_menusub01
			FROM t_rol_menu rm
			INNER JOIN t_menus_sub02 msub2 ON (msub2.ID_MENUSUB02 = rm.ID_MENUSUB02 AND msub2.ID_ESTADO = '1')
			INNER JOIN t_menus_sub01 msub1 ON (msub1.ID_MENUSUB01 = msub2.ID_MENUSUB01 AND msub1.ID_ESTADO = '1')
			INNER JOIN t_menus men ON (men.ID_MENU = msub1.ID_MENU AND men.ID_ESTADO = '1')
			WHERE rm.ID_ROL = :ID_ROL
			GROUP BY msub1.ID_MENU, msub1.ID_MENUSUB01, msub1.DESC_MENUSUB01, msub1.ICONO
			ORDER BY men.ORDEN, msub1.ORDEN
        ", $arrayCampos);
        return $Resultado;
    }



    public static function ListarSubMenu02_x_ROL($arrayCampos = [])
    {
        $Resultado = DB::select("
        	SELECT
			msub2.ID_MENUSUB01,
			msub2.ID_MENUSUB02,
			msub2.DESC_MENUSUB02,
			msub2.LINK_MENUSUB02,
			msub2.ICONO AS icono_menusub02
			FROM t_rol_menu rm
			INNER JOIN t_menus_sub02 msub2 ON (msub2.ID_MENUSUB02 = rm.ID_MENUSUB02 AND msub2.ID_ESTADO = '1')
			INNER JOIN t_menus_sub01 msub1 ON (msub1.ID_MENUSUB01 = msub2.ID_MENUSUB01 AND msub1.ID_ESTADO = '1')
			INNER JOIN t_menus men ON (men.ID_MENU = msub1.ID_MENU AND men.ID_ESTADO = '1')
			WHERE rm.ID_ROL = :ID_ROL
			GROUP BY msub2.ID_MENUSUB01, msub2.ID_MENUSUB02, msub2.DESC_MENUSUB02, msub2.LINK_MENUSUB02, msub2.ICONO
			ORDER BY men.ORDEN, msub1.ORDEN
        ", $arrayCampos);
        return $Resultado;
    }


    //#######################################################
    //#######################################################
    //#######################################################

    public static function List_RolesMenu_x_IDRol($arrayCampos = [])
    {
        $Resultado = DB::select("SELECT * FROM t_rol_menu WHERE ID_ROL = :ID_ROL", $arrayCampos);
        return $Resultado;
    }


    public static function Delete_RolMenu_x_IdRol($arrayCampos = [])
    {
    	$Resultado = DB::delete('DELETE FROM t_rol_menu WHERE ID_ROL = :ID_ROL', $arrayCampos);
        return $Resultado;
    }


    public static function Insertar_RolMenus($arrayCampos = [])
    {
        $Resultado = DB::insert('
			INSERT INTO t_rol_menu (
				ID_ROL,
				ID_MENUSUB02
			) VALUES(
				:ID_ROL,
				:ID_MENUSUB02
			)
		',$arrayCampos);

        return $Resultado;
    }


}
