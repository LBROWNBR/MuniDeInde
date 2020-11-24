<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminMenu;

class AdminMenuController extends Controller
{
    public function Admin_MenuInicio()
    {
        return view('vWebPageAdmin.intranetMenu.pageIntranetMenu_Principal');
    }

    public function Admin_MenuListar()
    {
        $Objeto   = AdminMenu::Intranet_ListarMenu();

        if($Objeto) foreach ($Objeto as $reg):
            $data[]=array(
                "0"=>"<div class='text-center'>".$reg->ID_MENU."<div>",
                "1"=>"<div class='text-center'>".$reg->ICONO."<div>",
                "2"=>$reg->DESC_MENU,
                "3"=>"<div class='text-center'>".$reg->ORDEN."<div>",
                "4"=>"<div class='text-center'><button class='btn btn-orange btn-sm' value=".$reg->ID_MENU." OnClick='VerSubMenuNivel01(this.value);'>SubMenu N1</button></div>",
                "5"=>"<div class='text-center'><button class='btn btn-info btn-sm' value=".$reg->ID_MENU." OnClick='Form_Menu(this.value);'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button class='btn btn-danger btn-sm' value=".$reg->ID_MENU." OnClick='Delete_Menu(this.value);'><i class='fa fa-trash'></i></button></div>"

            );
        endforeach;

        $results = array(
            "sEcho"=>1, //InformaciÃ³n para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        return json_encode($results);
    }


    public function Admin_MenuFormulario(Request $request)
    {
        $xData      = array();
        $x_codigo   = $request->input('x_codigo');
        $xData['DataMenu'] = AdminMenu::VerData_Menu_x_ID(['ID_MENU'=>$x_codigo]);

        return view('vWebPageAdmin.intranetMenu.pageIntranetMenu_Form', ['wData' => $xData]);
    }


    public function Admin_MenuRegistrar(Request $request)
    {

        $txhCodMenu = $request->input('txhCodMenu');
        $txtNombre  = $request->input('txtNombre');
        $txtIcono   = $request->input('txtIcono');
        $txtOrden   = $request->input('txtOrden');

        if($txhCodMenu == ''){

            $ObjCorrelativoMenu = AdminMenu::ObtenerCorrelativoID_MENU();
            $txhCodMenu = $ObjCorrelativoMenu->NewID_MENU;

            $ObjOrdenMenu = AdminMenu::ObtenerCorrelativoOrdenMenu();
            $txtOrden = $ObjOrdenMenu->NewOrden;

            $arrayCampos = [
                'ID_MENU'=>$txhCodMenu,
                'DESC_MENU'=>$txtNombre,
                'ICONO'=>$txtIcono,
                'ORDEN'=>$txtOrden
            ];

            $Insertado = AdminMenu::InsertData_Menu($arrayCampos);
            $valor = ($Insertado) ? 1 : 0;

        }else{

            $arrayCampos = [
                'ID_MENU'=>$txhCodMenu,
                'DESC_MENU'=>$txtNombre,
                'ICONO'=>$txtIcono,
                'ORDEN'=>$txtOrden
            ];

            $Actualizado = AdminMenu::UpdateData_Menu($arrayCampos);
            $valor = ($Actualizado) ? 1 : 0;
        }

        return $valor;
    }


    public function Admin_MenuEliminar(Request $request)
    {
        $x_codigo = $request->input('x_codigo');
        $Eliminado = AdminMenu::Delete_Menu(['ID_MENU'=>$x_codigo]);
        $valor = ($Eliminado) ? 1 : 0;

        return $valor;
    }



    //###########################################################################
    //#########################  MENU SUBNIVEL 01  ##############################
    //###########################################################################

    public function Admin_MenuSubMenuNivel01Inicio(Request $request)
    {
        $xData      = array();
        $xCodMenu   = $request->input('xCodMenu');
        $xData['DatoMenu'] = AdminMenu::VerData_Menu_x_ID(['ID_MENU'=>$xCodMenu]);

        return view('vWebPageAdmin.intranetMenu.pageIntranetSubMenu01', ['wData' => $xData]);
    }


    public function Admin_MenuSubMenuNivel01Listar(Request $request)
    {
        $data      = array();
        $xCodMenu   = $request->input('sCodMenu');
        $Objeto     = AdminMenu::List_SubMenu_N1_x_CodMenu(['ID_MENU'=>$xCodMenu]);

        if($Objeto) foreach ($Objeto as $reg):
            $data[]=array(
                "0"=>$reg->ID_MENUSUB01,
                "1"=>"<center>".$reg->ICONO."</center>",
                "2"=>$reg->DESC_MENUSUB01,
                "3"=>"<div class='text-center'>".$reg->ORDEN."<div>",
                "4"=>"<div class='text-center'><button class='btn btn-orange btn-sm' value=".$reg->ID_MENUSUB01." OnClick='VerSubMenuNivel02(this.value);'>SubMenu N2</button></div>",
                "5"=>"<div class='text-center'><button class='btn btn-info btn-sm' value=".$reg->ID_MENUSUB01." OnClick='Form_SubMenu01(this.value);'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button class='btn btn-danger btn-sm' value=".$reg->ID_MENUSUB01." OnClick='Elim_SubMenuN1(this.value);'><i class='fa fa-trash'></i></button></div>"
            );
        endforeach;

        $results = array(
            "sEcho"=>1, //InformaciÃ³n para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        return json_encode($results);
    }

    public function Admin_MenuSubMenuNivel01Formulario(Request $request)
    {
        $xData          = array();
        $xCodMenu       = $request->input('xCodMenu');
        $xCodSubMenuN1  = $request->input('xCodSubMenu1');

        $xData['DataMenu']      = AdminMenu::VerData_Menu_x_ID(['ID_MENU'=>$xCodMenu]);
        $xData['DataSubMenuN1'] = AdminMenu::VerData_SubMenuN1_x_ID(['ID_MENUSUB01'=>$xCodSubMenuN1]);

        return view('vWebPageAdmin.intranetMenu.pageIntranetSubMenu01_Form', ['wData' => $xData]);
    }

    public function Admin_MenuSubMenuNivel01Registrar(Request $request)
    {
        $txhCodSubMenuN1     = $request->input('txhCodSubMenuN1');
        $txhCodMenu          = $request->input('txhCodMenu');
        $txtNombreSubMenuN1  = $request->input('txtNombreSubMenuN1');
        $txtIconoSubMenuN1   = $request->input('txtIconoSubMenuN1');
        $txtOrdenSubMenuN1   = $request->input('txtOrdenSubMenuN1');

        if($txhCodSubMenuN1 == ''){

            $ObjCorrelativoSubMenu01 = AdminMenu::ObtenerCorrelativoID_SUBMENU01();
            $txhCodSubMenuN1 = $ObjCorrelativoSubMenu01->NewID_MENUSUB01;

            $ObjOrdenSubMenu01 = AdminMenu::ObtenerCorrelativoOrdenSubMenu01(['ID_MENU'=>$txhCodMenu]);
            $txtOrdenSubMenuN1 = $ObjOrdenSubMenu01->NewOrden;

            $arrayCampos = [
                'ID_MENUSUB01'=>$txhCodSubMenuN1,
                'ID_MENU'=>$txhCodMenu,
                'DESC_MENUSUB01'=>$txtNombreSubMenuN1,
                'ICONO'=>$txtIconoSubMenuN1,
                'ORDEN'=>$txtOrdenSubMenuN1
            ];

            $Insertado = AdminMenu::InsertData_SubMenuN1($arrayCampos);
            $valor = ($Insertado) ? 1 : 0;

        }else{

            $arrayCampos = [
                'ID_MENUSUB01'=>$txhCodSubMenuN1,
                'ID_MENU'=>$txhCodMenu,
                'DESC_MENUSUB01'=>$txtNombreSubMenuN1,
                'ICONO'=>$txtIconoSubMenuN1,
                'ORDEN'=>$txtOrdenSubMenuN1
            ];

            $Actualizado = AdminMenu::UpdateData_SubMenuN1($arrayCampos);
            $valor = ($Actualizado) ? 1 : 0;
        }

        return $valor;
    }


    public function Admin_MenuSubMenuNivel01Eliminar(Request $request)
    {
        $xCodSubMenuN1 = $request->input('xCodSubMenuN1');
        $Eliminado = AdminMenu::Delete_SubMenuN1(['ID_MENUSUB01'=>$xCodSubMenuN1]);
        $valor = ($Eliminado) ? 1 : 0;
        return $valor;
    }


    //###########################################################################
    //#########################  MENU SUBNIVEL 01  ##############################
    //###########################################################################

    public function Admin_MenuSubMenuNivel02Inicio(Request $request)
    {
        $xData           = array();
        $xCodSubMenuN1   = $request->input('xCodSubMenuN1');
        $xData['DataSubMenuN1'] = AdminMenu::VerData_SubMenuN1_x_ID(['ID_MENUSUB01'=>$xCodSubMenuN1]);

        return view('vWebPageAdmin.intranetMenu.pageIntranetSubMenu02', ['wData' => $xData]);
    }



    public function Admin_MenuSubMenuNivel02Listar(Request $request)
    {
        $data       = array();
        $xCodSubMenuN1   = $request->input('sCodSubMenuN1');
        $Objeto     = AdminMenu::List_SubMenu_N2_x_CodSubMenuN1(['ID_MENUSUB01'=>$xCodSubMenuN1]);

        if($Objeto) foreach ($Objeto as $reg):
            $data[]=array(
                "0"=>$reg->ID_MENUSUB02,
                "1"=>"<center>".$reg->ICONO."</center>",
                "2"=>$reg->DESC_MENUSUB02,
                "3"=>$reg->LINK_MENUSUB02,
                "4"=>$reg->ORDEN,
                "5"=>"<button class='btn btn-info btn-sm' value=".$reg->ID_MENUSUB02." OnClick='Form_SubMenuN2(this.value);'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button class='btn btn-danger btn-sm' value=".$reg->ID_MENUSUB02." OnClick='Elim_SubMenuN2(this.value);'><i class='fa fa-trash'></i></button>"
            );
        endforeach;

        $results = array(
            "sEcho"=>1, //InformaciÃ³n para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        return json_encode($results);
    }


    public function Admin_MenuSubMenuNivel02Formulario(Request $request)
    {
        $xData          = array();
        $xCodSubMenuN1  = $request->input('xCodSubMenuN1');
        $xCodSubMenuN2  = $request->input('xCodSubMenuN2');

        $xData['DataSubMenuN1'] = AdminMenu::VerData_SubMenuN1_x_ID(['ID_MENUSUB01'=>$xCodSubMenuN1]);
        $xData['DataSubMenuN2'] = AdminMenu::VerData_SubMenuN2_x_ID(['ID_MENUSUB02'=>$xCodSubMenuN2]);

        return view('vWebPageAdmin.intranetMenu.pageIntranetSubMenu02_Form', ['wData' => $xData]);
    }

    public function Admin_MenuSubMenuNivel02Registrar(Request $request)
    {
        $txhCodSubMenuN1     = $request->input('txhCodSubMenuN1');
        $txhCodSubMenuN2     = $request->input('txhCodSubMenuN2');
        $txtNombreSubMenuN2  = $request->input('txtNombreSubMenuN2');
        $txtEnlaceSubMenuN2  = $request->input('txtEnlaceSubMenuN2');
        $txtIconoSubMenuN2   = $request->input('txtIconoSubMenuN2');
        $txtOrdenSubMenuN2   = $request->input('txtOrdenSubMenuN2');

        if($txhCodSubMenuN2 == ''){

            $ObjCorrelativoSubMenu02 = AdminMenu::ObtenerCorrelativoID_SUBMENU02();
            $txhCodSubMenuN2 = $ObjCorrelativoSubMenu02->NewID_MENUSUB02;

            $ObjOrdenSubMenu02 = AdminMenu::ObtenerCorrelativoOrdenSubMenu02(['ID_MENUSUB01'=>$txhCodSubMenuN1]);
            $txtOrdenSubMenuN2 = $ObjOrdenSubMenu02->NewOrden;

            $arrayCampos = [
                'ID_MENUSUB02'=>$txhCodSubMenuN2,
                'ID_MENUSUB01'=>$txhCodSubMenuN1,
                'DESC_MENUSUB02'=>$txtNombreSubMenuN2,
                'LINK_MENUSUB02'=>$txtEnlaceSubMenuN2,
                'ICONO'=>$txtIconoSubMenuN2,
                'ORDEN'=>$txtOrdenSubMenuN2
            ];

            $Insertado = AdminMenu::InsertData_SubMenuN2($arrayCampos);
            $valor = ($Insertado) ? 1 : 0;

        }else{

            $arrayCampos = [
                'ID_MENUSUB02'=>$txhCodSubMenuN2,
                'ID_MENUSUB01'=>$txhCodSubMenuN1,
                'DESC_MENUSUB02'=>$txtNombreSubMenuN2,
                'LINK_MENUSUB02'=>$txtEnlaceSubMenuN2,
                'ICONO'=>$txtIconoSubMenuN2,
                'ORDEN'=>$txtOrdenSubMenuN2
            ];

            $Actualizado = AdminMenu::UpdateData_SubMenuN2($arrayCampos);
            $valor = ($Actualizado) ? 1 : 0;
        }

        return $valor;

    }

    public function Admin_MenuSubMenuNivel02Eliminar(Request $request)
    {
        $xCodSubMenuN2 = $request->input('xCodSubMenuN2');
        $Eliminado = AdminMenu::Delete_SubMenuN2(['ID_MENUSUB02'=>$xCodSubMenuN2]);
        $valor = ($Eliminado) ? 1 : 0;
        return $valor;
    }


}
