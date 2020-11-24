<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class AdminMenu extends Model
{
    public static function List_All_Menu()
    {
        $Resultado = DB::select('SELECT * FROM t_menus WHERE ID_ESTADO = 1');
        return $Resultado;
    }

    public static function Intranet_ListarMenu($arrayCampos = [])
    {
        $Resultado = DB::select("
        SELECT * FROM t_menus WHERE ID_ESTADO ='1' ORDER BY ORDEN
        ");
        return $Resultado;
    }

    public static function VerData_Menu_x_ID($arrayCampos = [])
    {
        $Resultado = DB::selectOne('
        	SELECT * FROM t_menus WHERE ID_MENU = :ID_MENU
        ', $arrayCampos);
        return $Resultado;
    }

    public static function ObtenerCorrelativoID_MENU()
    {
        $Resultado = DB::selectOne("
            SELECT ifnull(max(ID_MENU),0)+1 as NewID_MENU FROM t_menus
        ");
        return $Resultado;
    }

    public static function ObtenerCorrelativoOrdenMenu()
    {
        $Resultado = DB::selectOne("
            SELECT ifnull(max(ORDEN),0)+1 as NewOrden FROM t_menus WHERE ID_ESTADO = '1'
        ");
        return $Resultado;
    }

    public static function InsertData_Menu($arrayCampos = [])
    {
        $Resultado = DB::insert("
			INSERT INTO t_menus (
                ID_MENU,
				DESC_MENU,
				ICONO,
				ORDEN,
				ID_ESTADO
			) VALUES(
                :ID_MENU,
				:DESC_MENU,
				:ICONO,
				:ORDEN,
				'1'
			)
		",$arrayCampos);

        return $Resultado;
    }


    public static function UpdateData_Menu($arrayCampos = [])
    {
        $Resultado = DB::update('
        	UPDATE t_menus SET
        	DESC_MENU 	= :DESC_MENU,
        	ICONO 		= :ICONO,
        	ORDEN 		= :ORDEN
        	WHERE ID_MENU 	= :ID_MENU
        ', $arrayCampos);

        return $Resultado;
    }


    public static function Delete_Menu($arrayCampos = [])
    {
    	$Resultado = DB::update("
    		UPDATE t_menus SET ID_ESTADO = '2' WHERE ID_MENU 	= :ID_MENU
        ", $arrayCampos);
        //$Resultado = DB::delete('DELETE FROM menus WHERE ID_MENU = :ID_MENU', $arrayCampos);
        return $Resultado;
    }

    //##################################################################
    //##################################################################
    //##################################################################

    public static function List_All_SubMenu_N1()
    {
        $Resultado = DB::select('SELECT * FROM t_menus_sub01 WHERE ID_ESTADO = 1');
        return $Resultado;
    }

    public static function List_SubMenu_N1_x_CodMenu($arrayCampos = [])
    {
        $Resultado = DB::select("
            SELECT * FROM t_menus_sub01 WHERE ID_MENU = :ID_MENU and ID_ESTADO = 1 ORDER BY ORDEN
        ", $arrayCampos);
        return $Resultado;
    }

    public static function VerData_SubMenuN1_x_ID($arrayCampos = [])
    {
        $Resultado = DB::selectOne('
        	SELECT * FROM t_menus_sub01 WHERE ID_MENUSUB01 = :ID_MENUSUB01
        ', $arrayCampos);

        return $Resultado;
    }

    public static function ObtenerCorrelativoID_SUBMENU01()
    {
        $Resultado = DB::selectOne("
            SELECT ifnull(max(ID_MENUSUB01),0)+1 as NewID_MENUSUB01 FROM t_menus_sub01
        ");
        return $Resultado;
    }

    public static function ObtenerCorrelativoOrdenSubMenu01($arrayCampos = [])
    {
        $Resultado = DB::selectOne("
            SELECT ifnull(max(ORDEN),0)+1 as NewOrden FROM t_menus_sub01 WHERE ID_ESTADO = '1' AND ID_MENU = :ID_MENU
        ", $arrayCampos);
        return $Resultado;
    }

    public static function InsertData_SubMenuN1($arrayCampos = [])
    {
        $Resultado = DB::insert("
			INSERT INTO t_menus_sub01 (
                ID_MENUSUB01,
				ID_MENU,
				DESC_MENUSUB01,
				ICONO,
				ORDEN,
				ID_ESTADO
			) VALUES(
                :ID_MENUSUB01,
				:ID_MENU,
				:DESC_MENUSUB01,
				:ICONO,
				:ORDEN,
				'1'
			)
		",$arrayCampos);

        return $Resultado;
    }


    public static function UpdateData_SubMenuN1($arrayCampos = [])
    {
        $Resultado = DB::update('
        	UPDATE t_menus_sub01 SET
        	ID_MENU 		= :ID_MENU,
        	DESC_MENUSUB01 	= :DESC_MENUSUB01,
        	ICONO 			= :ICONO,
        	ORDEN 			= :ORDEN
        	WHERE ID_MENUSUB01 	= :ID_MENUSUB01
        ', $arrayCampos);

        return $Resultado;
    }


    public static function Delete_SubMenuN1($arrayCampos = [])
    {
    	$Resultado = DB::update("
    		UPDATE t_menus_sub01 SET ID_ESTADO = '2' WHERE ID_MENUSUB01 	= :ID_MENUSUB01
        ", $arrayCampos);
        //$Resultado = DB::delete('DELETE FROM t_menus_sub01 WHERE id_menusub01 = :id_menusub01', $arrayCampos);

        return $Resultado;
    }

    //##################################################################
    //##################################################################
    //##################################################################

    public static function List_All_SubMenu_N2()
    {
        $Resultado = DB::select('SELECT * FROM t_menus_sub02 WHERE ID_ESTADO = 1');
        return $Resultado;
    }

    public static function List_SubMenu_N2_x_CodSubMenuN1($arrayCampos = [])
    {
        $Resultado = DB::select("
            SELECT * FROM t_menus_sub02 WHERE ID_MENUSUB01 = :ID_MENUSUB01 and ID_ESTADO = 1
        ", $arrayCampos);
        return $Resultado;
    }

    public static function VerData_SubMenuN2_x_ID($arrayCampos = [])
    {
        $Resultado = DB::selectOne('
        	SELECT * FROM t_menus_sub02 WHERE ID_MENUSUB02 = :ID_MENUSUB02
        ', $arrayCampos);

        return $Resultado;
    }

    public static function ObtenerCorrelativoID_SUBMENU02()
    {
        $Resultado = DB::selectOne("
            SELECT ifnull(max(ID_MENUSUB02),0)+1 as NewID_MENUSUB02 FROM t_menus_sub02
        ");
        return $Resultado;
    }

    public static function ObtenerCorrelativoOrdenSubMenu02($arrayCampos = [])
    {
        $Resultado = DB::selectOne("
            SELECT ifnull(max(ORDEN),0)+1 as NewOrden FROM t_menus_sub02 WHERE ID_ESTADO = '1' AND ID_MENUSUB01 = :ID_MENUSUB01
        ", $arrayCampos);
        return $Resultado;
    }


    public static function InsertData_SubMenuN2($arrayCampos = [])
    {
        $Insertado = DB::insert("
			INSERT INTO t_menus_sub02 (
                ID_MENUSUB02,
				ID_MENUSUB01,
				DESC_MENUSUB02,
				LINK_MENUSUB02,
				ICONO,
				ORDEN,
				ID_ESTADO
			) VALUES(
                :ID_MENUSUB02,
				:ID_MENUSUB01,
				:DESC_MENUSUB02,
				:LINK_MENUSUB02,
				:ICONO,
				:ORDEN,
				'1'
			)
		",$arrayCampos);
        return $Insertado;
    }


    public static function UpdateData_SubMenuN2($arrayCampos = [])
    {
        $Resultado = DB::update('
        	UPDATE t_menus_sub02 SET
        	ID_MENUSUB01 	= :ID_MENUSUB01,
        	DESC_MENUSUB02 	= :DESC_MENUSUB02,
        	LINK_MENUSUB02 	= :LINK_MENUSUB02,
        	ICONO 			= :ICONO,
        	ORDEN 			= :ORDEN
        	WHERE ID_MENUSUB02 	= :ID_MENUSUB02
        ', $arrayCampos);

        return $Resultado;
    }

    public static function Delete_SubMenuN2($arrayCampos = [])
    {
    	$Resultado = DB::update("
    		UPDATE t_menus_sub02 SET ID_ESTADO = '2' WHERE ID_MENUSUB02 = :ID_MENUSUB02
        ", $arrayCampos);
        //$Resultado = DB::delete('DELETE FROM t_menus_sub02 WHERE ID_MENUSUB02 = :ID_MENUSUB02', $arrayCampos);
        return $Resultado;
    }


}
