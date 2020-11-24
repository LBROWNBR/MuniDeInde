<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminRol;
use App\AdminMenu;

class AdminRolController extends Controller
{
    public function Admin_RolInicio()
    {
        return view('vWebPageAdmin.intranetRol.pageIntranetRol_Principal');
    }

    public function Admin_RolListar()
    {
        $Objeto = AdminRol::List_All_Rol();

        if($Objeto) foreach ($Objeto as $reg):
            $data[]=array(
                "0"=>"<div class='text-center'>".$reg->ID_ROL."<div>",
                "1"=>$reg->NOM_ROL,
                "2"=>"<div class='text-center'><button class='btn btn-orange btn-sm' value=".$reg->ID_ROL." OnClick='VerMenuRol(this.value);'>Permisos</button><div>",
                "3"=>"<div class='text-center'><button class='btn btn-info btn-sm' value=".$reg->ID_ROL." OnClick='Form_Rol(this.value);'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button class='btn btn-danger btn-sm' value=".$reg->ID_ROL." OnClick='Eliminar_Rol(this.value);'><i class='fa fa-trash'></i></button><div>"
            );
        endforeach;

        $results = array(
            "sEcho"=>1, //InformaciÃ³n para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        return json_encode($results);
    }


    public function Admin_RolFormulario(Request $request)
    {
        $xData      = array();
        $x_codigo   = $request->input('x_codigo');
        $xData['DataRol'] = AdminRol::VerRolById(['ID_ROL'=>$x_codigo]);

        return view('vWebPageAdmin.intranetRol.pageIntranetRol_Form', ['wData' => $xData]);
    }


    public function Admin_RolRegistrar(Request $request)
    {

        $txhCodRol = $request->input('txhCodRol');
        $txtRol  = $request->input('txtRol');

        if($txhCodRol == ''){

            $ObjCorrelativoRol = AdminRol::ObtenerCorrelativoID_ROL();
            $txhCodRol = $ObjCorrelativoRol->NewCodigo;

            $arrayCampos = [
                'ID_ROL'=>$txhCodRol,
                'NOM_ROL'=>$txtRol
            ];

            $CodInsertado = AdminRol::InsertData_Rol($arrayCampos);
            $valor = ($CodInsertado) ? 1 : 0;

        }else{

            $arrayCampos = [
                'ID_ROL'=>$txhCodRol,
                'NOM_ROL'=>$txtRol
            ];

            $Actualizado = AdminRol::UpdateData_Rol($arrayCampos);
            $valor = ($Actualizado) ? 1 : 0;
        }

        return $valor;

    }



    public function Admin_RolEliminar(Request $request)
    {
        $x_codigo = $request->input('x_codigo');
        $Eliminado = AdminRol::Delete_Rol(['ID_ROL'=>$x_codigo]);
        $valor = ($Eliminado) ? 1 : 0;
        return $valor;
    }


    //###########################################################################
    //######################### ROL MENU  ##############################
    //###########################################################################

    public function Admin_RolPermisosFormulario(Request $request)
    {
        $xData = array();

        $xData['DataMenu']      = AdminMenu::List_All_Menu();
        $xData['DataSubMenuN1'] = AdminMenu::List_All_SubMenu_N1();
        $xData['DataSubMenuN2'] = AdminMenu::List_All_SubMenu_N2();

        $xCodRol                = $request->input('xCodRol');
        $xData['DataRol']       = AdminRol::VerRolById(['ID_ROL'=>$xCodRol]);
        $xData['DataRolMenus']  = AdminRol::List_RolesMenu_x_IDRol(['ID_ROL'=>$xCodRol]);

        return view('vWebPageAdmin.intranetRol.pageIntranetRol_Permisos', ['wData' => $xData]);
    }


    public function Admin_RolPermisosRegistrar(Request $request)
    {

        $arrayCampos = array();

        $txhCodRol_F = $request->input('txhCodRol_F');
        $ItemsSUBMenu  = $request->input('new_ItemsSUBMenu');

        $Data_SubMenu    = isset( $ItemsSUBMenu ) ? explode(',',$ItemsSUBMenu) : '';

        AdminRol::Delete_RolMenu_x_IdRol(['ID_ROL'=>$txhCodRol_F]);

        for ( $i = 0; $i < count($Data_SubMenu); $i++){

            $ID_MENUSUB = $Data_SubMenu[$i];

             $arrayCampos   = [
                'ID_ROL'=>$txhCodRol_F,
                'ID_MENUSUB02'=>$ID_MENUSUB
            ];

            $rpta = AdminRol::Insertar_RolMenus($arrayCampos);

        }

        $valor = ($rpta) ? '1' : '0';
        echo $valor;

    }

}
