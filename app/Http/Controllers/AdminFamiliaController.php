<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminFamilias;
use App\MaestrasModel;

class AdminFamiliaController extends Controller
{
    public function Admin_FamiliaInicio()
    {
        return view('vWebPageAdmin.intranetFamilias.pageIntranetFamilias_Principal');
    }

    public function Admin_FamiliaListar()
    {
        $Objeto = AdminFamilias::Listar_Todo_Representantes_Familia();

        if($Objeto) foreach ($Objeto as $reg):
            $data[]=array(
                "0"=>"<div class='text-center'>".$reg->ID_REPRES."<div>",
                "1"=>$reg->FECHA_REGISTRA,
                "2"=>$reg->NOM_FAMILIA,                
                "3"=>$reg->ABREV_TIPDOC,
                "4"=>$reg->NUMDOC_REPRES,
                "5"=>$reg->DESC_TIPPARENT,
                "6"=>$reg->NOMBRE_REPRES,
                "7"=>$reg->APEPAT_REPRES,
                "8"=>$reg->APEMAT_REPRES,
                "9"=>$reg->NOM_SEXO,
                "10"=>$reg->FECNAC_REPRES,
                "11"=>$reg->TEL_REPRES,
                "12"=>$reg->CEL_REPRES,
                "13"=>$reg->DIR_REPRES,
                "14"=>$reg->DEPARTAMENTO,
                "15"=>$reg->PROVINCIA,
                "16"=>$reg->DISTRITO,
                "17"=>$reg->LATITUD,
                "18"=>$reg->LONGITUD,
                "19"=>"<div class='text-center'><button class='btn btn-info btn-sm' value=".$reg->ID_REPRES." OnClick='Form_Representante(this.value);'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button class='btn btn-danger btn-sm' value=".$reg->ID_REPRES." OnClick='Eliminar_Representante(this.value);'><i class='fa fa-trash'></i></button><div>"
            );
        endforeach;

        $results = array(
            "sEcho"=>1, //InformaciÃ³n para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        return json_encode($results);
    }



    public function Admin_FamiliaEliminar(Request $request)
    {
        $x_codigo = $request->input('x_codigo');
        $Eliminado = AdminFamilias::Delete_Representante_Familia(['ID_REPRES'=>$x_codigo]);
        $valor = ($Eliminado) ? 1 : 0;
        return $valor;
    }




    public function Admin_FamiliaFormulario(Request $request)
    {
        $xData      = array();
        $x_codigo   = $request->input('x_codigo');
        $ObjetoRepres = AdminFamilias::VerRepresentanteById(['ID_REPRES'=>$x_codigo]);

        $xData['DataRepresentante'] = $ObjetoRepres;
        $xData['DataTipoDocumento'] = MaestrasModel::ListarTipoDocumento();
        $xData['DataTipoGenero'] = MaestrasModel::ListarTipoGenero();
        $xData['DataDepartamento'] = MaestrasModel::ListarDepartamento();
        $xData['DataParentesco'] = MaestrasModel::ListarParentesco(); 

        if($ObjetoRepres){

            $xData['DataProvincia'] = MaestrasModel::ListarProvincia(['CODDEP'=>$ObjetoRepres->CODDEP]);
            $xData['DataDistrito'] = MaestrasModel::ListarDistrito(['CODDEP'=>$ObjetoRepres->CODDEP, 'CODPROV'=>$ObjetoRepres->CODPROV]);
        }else{
            $xData['DataProvincia'] = '';
            $xData['DataDistrito'] = '';
        }


        return view('vWebPageAdmin.intranetFamilias.pageIntranetFamilias_Form', ['wData' => $xData]);
    }


    public function Admin_FamiliaRegistrar(Request $request)
    {

        $txh_codrepres = $request->input('txh_codrepres');
        $txt_nom_familia  = $request->input('txt_nom_familia');
        $cbotipdoc_familia  = $request->input('cbotipdoc_familia');
        $txt_numdoc_familia  = $request->input('txt_numdoc_familia');
        $cboparentesco  = $request->input('cboparentesco');
        $txt_nombre_Represent  = $request->input('txt_nombre_Represent');
        $txt_apepat_repres  = $request->input('txt_apepat_repres');
        $txt_apemat_repres  = $request->input('txt_apemat_repres');
        $cbogenero_repres  = $request->input('cbogenero_repres');
        $txt_fechaNac_repres  = $request->input('txt_fechaNac_repres');
        $txt_telfijo  = $request->input('txt_telfijo');
        $txt_celular  = $request->input('txt_celular');
        $txt_dir_repres  = $request->input('txt_dir_repres');
        $cbo_depa_fam  = $request->input('cbo_depa_fam');
        $cbo_prov_fam  = $request->input('cbo_prov_fam');
        $cbo_dist_fam  = $request->input('cbo_dist_fam');
        $txt_latitud  = $request->input('txt_latitud');
        $txt_longitud  = $request->input('txt_longitud');

        $arrayCampos = [
            'ID_REPRES'=>$txh_codrepres,
            'NOM_FAMILIA'=>$txt_nom_familia,
            'COD_TIPDOC'=>$cbotipdoc_familia,
            'NUMDOC_REPRES'=>$txt_numdoc_familia,
            'COD_TIPPARENT'=>$cboparentesco,
            'NOMBRE_REPRES'=>$txt_nombre_Represent,
            'APEPAT_REPRES'=>$txt_apepat_repres,
            'APEMAT_REPRES'=>$txt_apemat_repres,   
            'ID_SEXO'=>$cbogenero_repres,
            'FECNAC_REPRES'=>$txt_fechaNac_repres,
            'TEL_REPRES'=>$txt_telfijo,
            'CEL_REPRES'=>$txt_celular,
            'DIR_REPRES'=>$txt_dir_repres,
            'CODDEP'=>$cbo_depa_fam,
            'CODPROV'=>$cbo_prov_fam,
            'CODDIST'=>$cbo_dist_fam,
            'LATITUD'=>$txt_latitud,
            'LONGITUD'=>$txt_longitud
        ];

        $Actualizado = AdminFamilias::UpdateData_Representante($arrayCampos);
        $valor = ($Actualizado) ? 1 : 0;

        return $valor;

    }


    //============================================================================
    //============================================================================
    //============================================================================


    public function Admin_MapeoFamiliaInicio()
    {
        $xData      = array();
        $xData['DataRepresentanteFamilias'] = AdminFamilias::Listar_Todo_Representantes_Familia();
        return view('vWebPageAdmin.intranetFamilias.pageIntranetMapeoFamilias_Principal', ['wData' => $xData]);
    }


    public function Admin_MapeoFamiliaDatos(Request $request){
        $results      = array();
        $x_codigo   = $request->input('x_codigo');
        $ObjetoRepres = AdminFamilias::VerDatosRepresDetalladoById(['ID_REPRES'=>$x_codigo]);
        return json_encode($ObjetoRepres);
    }

    


}
