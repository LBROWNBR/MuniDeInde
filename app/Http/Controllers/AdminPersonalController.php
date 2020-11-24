<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminPersonal;
use App\AdminTBLMaestras;

class AdminPersonalController extends Controller
{
    public function Admin_PersonalInicio()
    {
        return view('vWebPageAdmin.intranetPersonal.pageIntranetPersonal_Principal');
    }


    public function Admin_PersonalListar()
    {
        $Objeto = AdminPersonal::ListarAllPersonalDetallado();


        if($Objeto) foreach ($Objeto as $reg):
            $data[]=array(
                "0"=>"<div class='text-center'>".$reg->ID_PERSONAL."<div>",
                "1"=>$reg->APEPAT_PERSONAL,
                "2"=>$reg->APEMAT_PERSONAL,
                "3"=>$reg->NOM_PERSONAL,
                "4"=>"<div class='text-center'>".$reg->ABREV_TIPDOC."<div>",
                "5"=>"<div class='text-center'>".$reg->NUM_DOC."<div>",
                "6"=>"<div class='text-center'>".$reg->NOM_SEXO."<div>",
                "7"=>"<div class='text-center'>".$reg->NOM_ESTCIV."<div>",
                "8"=>"<div class='text-center'>".$reg->FECH_NACIMIENTO."<div>",
                "9"=>$reg->TEL_FIJO,
                "10"=>$reg->CELULAR,
                "11"=>$reg->CORREO,
                "12"=>"<div class='text-center'><button class='btn btn-info btn-sm' value=".$reg->ID_PERSONAL." OnClick='Form_Personal(this.value);'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button class='btn btn-danger btn-sm' value=".$reg->ID_PERSONAL." OnClick='Eliminar_Personal(this.value);'><i class='fa fa-trash'></i></button><div>"
            );
        endforeach;

        $results = array(
            "sEcho"=>1, //Informacion para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        return json_encode($results);
    }


    public function Admin_PersonalFormulario(Request $request)
    {
        $xData      = array();
        $x_codigo   = $request->input('x_codigo');
        $xData['DataPersonal']      = AdminPersonal::VerDatoPersonalByID(['ID_PERSONAL'=>$x_codigo]);


        $xData['DataTipoDocumento']  = AdminTBLMaestras::Listar_TipoDocumento();
        $xData['DataSexo']       = AdminTBLMaestras::Listar_Sexo();
        $xData['DataEstadoCivil']       = AdminTBLMaestras::Listar_EstadoCivil();
        $xData['DataDepartamento']       = AdminTBLMaestras::Listar_Departamento();

        if($xData['DataPersonal']){
            $editCODDEPA = $xData['DataPersonal']->ID_DEPA;
            $editCODPROV = $xData['DataPersonal']->ID_PROV;

            $xData['DataEditProvincia'] = AdminTBLMaestras::Listar_Provincia(['CODDEP'=>$editCODDEPA]);
            $xData['DataEditDistrito'] = AdminTBLMaestras::Listar_Distrito(['CODDEP'=>$editCODDEPA, 'CODPROV'=>$editCODPROV]);
        }else{
            $xData['DataEditProvincia'] = null;
            $xData['DataEditDistrito'] = null;
        }


        return view('vWebPageAdmin.intranetPersonal.pageIntranetPersonal_Form', ['wData' => $xData]);
    }


    public function Admin_PersonalRegistrar(Request $request)
    {
        $txhCodPersonal             = $request->input('txhCodPersonal');
        $txtApePat           = $request->input('txtApePat');
        $txtApeMat           = $request->input('txtApeMat');
        $txtNombres           = $request->input('txtNombres');
        $cboTipDoc           = $request->input('cboTipDoc');
        $txtNumDoc           = $request->input('txtNumDoc');
        $cboSexo           = $request->input('cboSexo');
        $cboEstCivil           = $request->input('cboEstCivil');
        $txtfechaNac           = $request->input('txtfechaNac');
        $txtTelFijo           = $request->input('txtTelFijo');
        $txtCelular           = $request->input('txtCelular');
        $txtCorreo           = $request->input('txtCorreo');
        $cboDepa           = $request->input('cboDepa');
        $cboProv           = $request->input('cboProv');
        $cboDist           = $request->input('cboDist');
        $txtNomDireccion           = $request->input('txtNomDireccion');
        $txtNumDireccion           = $request->input('txtNumDireccion');
        $txtReferencia           = $request->input('txtReferencia');

        if($txhCodPersonal == ''){

            $ObjCorrelativo = AdminPersonal::ObtenerCorrelativoID_PERSONAL();
            $ID_PERSONAL = $ObjCorrelativo->NewCodigo;

            $arrayCampos = [
                'ID_PERSONAL'=>$ID_PERSONAL,
                'APEPAT_PERSONAL'=>$txtApePat,
                'APEMAT_PERSONAL'=>$txtApeMat,
                'NOM_PERSONAL'=>$txtNombres,
                'ID_TIPDOC'=>$cboTipDoc,
                'NUM_DOC'=>$txtNumDoc,
                'ID_SEXO'=>$cboSexo,
                'ID_ESTCIV'=>$cboEstCivil,
                'FECH_NACIMIENTO'=>$txtfechaNac,
                'TEL_FIJO'=>$txtTelFijo,
                'CELULAR'=>$txtCelular,
                'CORREO'=>$txtCorreo,
                'ID_DEPA'=>$cboDepa,
                'ID_PROV'=>$cboProv,
                'ID_DIST'=>$cboDist,
                'NOM_DIRECCION'=>$txtNomDireccion,
                'NUM_DIRECCION'=>$txtNumDireccion,
                'REF_DIRECCION'=>$txtReferencia
            ];

            $Insertado = AdminPersonal::InsertData_Personal($arrayCampos);
            $valor = ($Insertado) ? 1 : 0;

        }else{

            $arrayCampos = [
                'ID_PERSONAL'=>$txhCodPersonal,
                'APEPAT_PERSONAL'=>$txtApePat,
                'APEMAT_PERSONAL'=>$txtApeMat,
                'NOM_PERSONAL'=>$txtNombres,
                'ID_TIPDOC'=>$cboTipDoc,
                'NUM_DOC'=>$txtNumDoc,
                'ID_SEXO'=>$cboSexo,
                'ID_ESTCIV'=>$cboEstCivil,
                'FECH_NACIMIENTO'=>$txtfechaNac,
                'TEL_FIJO'=>$txtTelFijo,
                'CELULAR'=>$txtCelular,
                'CORREO'=>$txtCorreo,
                'ID_DEPA'=>$cboDepa,
                'ID_PROV'=>$cboProv,
                'ID_DIST'=>$cboDist,
                'NOM_DIRECCION'=>$txtNomDireccion,
                'NUM_DIRECCION'=>$txtNumDireccion,
                'REF_DIRECCION'=>$txtReferencia
            ];

            $Actualizado = AdminPersonal::UpdateData_Personal($arrayCampos);
            $valor = ($Actualizado) ? 1 : 0;
        }

        return $valor;
    }


    public function Admin_PersonalEliminar(Request $request)
    {
        $x_codigo = $request->input('x_codigo');
        $Eliminado = AdminPersonal::DeleteData_Personal(['ID_PERSONAL'=>$x_codigo]);
        $valor = ($Eliminado) ? 1 : 0;
        return $valor;

    }

}
