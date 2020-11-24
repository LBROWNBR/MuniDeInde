<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\MaestrasModel;
use App\RepresentanteModel;
use App\Funciones;
use RealRashid\SweetAlert\Facades\Alert;
use Session;


class WebPageController extends Controller
{
    public function index(){

        $xData = array();
        return view('vWebPage.pageHome',  ['wData' => $xData]);
    }


    public function UbigeoListarProv(Request $request){
        $results      = array();
        $cbo_depa   = $request->input('cbo_depa');
        $results['DataProvincia'] = MaestrasModel::ListarProvincia(['CODDEP' => $cbo_depa]);
        return json_encode($results);
    }


    public function UbigeoListarDist(Request $request){
        $results      = array();
        $cbo_depa   = $request->input('cbo_depa');
        $cbo_prov   = $request->input('cbo_prov');
        $results['DataDistrito'] = MaestrasModel::ListarDistrito(['CODDEP' => $cbo_depa, 'CODPROV' => $cbo_prov]);
        return json_encode($results);
    }


    public function registrateFamilia(){
        $xData = array();
        $xData['DataTipoDocumento'] = MaestrasModel::ListarTipoDocumento();
        $xData['DataTipoGenero'] = MaestrasModel::ListarTipoGenero();
        $xData['DataDepartamento'] = MaestrasModel::ListarDepartamento();
        $xData['DataParentesco'] = MaestrasModel::ListarParentesco(); 
        return view('vWebPage.pageFamiliaRegistrate',  ['wData' => $xData]);
    }


    public function RegistrarRepresentanteFamilia(Request $request){

        $resultado  = array();

        $txh_codrepres   = $request->input('txh_codrepres');
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


        //VALIDA SI EL NUM DOCUMENTO DEL CLIENTE YA SE ENCUENTRA REGISTRADO
        $ObjTotExisteTipDoc = RepresentanteModel::VerificaExisteTipoDocumentoRepresentante(['COD_TIPDOC' => $cbotipdoc_familia, 'NUMDOC_REPRES' => $txt_numdoc_familia]);
        $TotExisteTipDoc = $ObjTotExisteTipDoc->TOT_REG;

        if($TotExisteTipDoc > 0){

            $resultado = [
                "titulo"=>"¡Error al registrar!",
                "mensaje"=>"El tipo y número de documento del representante ya se encuentra registrado",
                "tipo"=>"warning",
                "rs"=>"0"
            ];

        }else{

            if($txh_codrepres == ''){
                
                $ObjCodigo = RepresentanteModel::ObtenerCorrelativo_ID_REPRES();
                $ID_REPRES = $ObjCodigo->NewCodigo;    

                $PARAMETROS = [
                    "ID_REPRES"=>$ID_REPRES,
                    "NOM_FAMILIA"=>$txt_nom_familia,
                    "COD_TIPDOC"=>$cbotipdoc_familia,
                    "NUMDOC_REPRES"=>$txt_numdoc_familia,
                    "COD_TIPPARENT"=>$cboparentesco,
                    "NOMBRE_REPRES"=>$txt_nombre_Represent,
                    "APEPAT_REPRES"=>$txt_apepat_repres,
                    "APEMAT_REPRES"=>$txt_apemat_repres,
                    "ID_SEXO"=>$cbogenero_repres,
                    "FECNAC_REPRES"=>$txt_fechaNac_repres,
                    "TEL_REPRES"=>$txt_telfijo,
                    "CEL_REPRES"=>$txt_celular,
                    "DIR_REPRES"=>$txt_dir_repres,
                    "CODDEP"=>$cbo_depa_fam,
                    "CODPROV"=>$cbo_prov_fam,
                    "CODDIST"=>$cbo_dist_fam,
                    "LATITUD"=>$txt_latitud,
                    "LONGITUD"=>$txt_longitud
                ];

                $REGISTRO = RepresentanteModel::InsertarData_Representante($PARAMETROS);

                if($REGISTRO){
                    $resultado = [
                        "titulo"=>"¡Felicidades!",
                        "mensaje"=>"Se registró de manera correcta los datos del Representante de la Familia",
                        "tipo"=>"success",
                        "rs"=>"1"
                    ];
                }else{
                    $resultado = [
                        "titulo"=>"¡Error al Registrar!",
                        "mensaje"=>"Los datos del representante no son correctos",
                        "tipo"=>"danger",
                        "rs"=>"0"
                    ];
                }

            }else{

                $ID_REPRES = $txh_codrepres;

                $resultado = [
                    "titulo"=>"¡Error al Registrar!",
                    "mensaje"=>"PARTE PARA ACTUALIZAR DATOS DEL REPRESENTANTE",
                    "tipo"=>"danger",
                    "rs"=>"0"
                ];

            }
                

        }

        return json_encode($resultado);

    }





    //=======================================================================
    //=======================================================================
    //=======================================================================


    public function MapeoFamiliasPobreWeb()
    {
        $xData      = array();
        $xData['DataRepresentanteFamilias'] = RepresentanteModel::Listar_Todo_Representantes_Familia_WebPage();
        return view('vWebPage.pageFamiliaMapeoPobreza', ['wData' => $xData]);
    }


    public function MapeoFamiliaDatos_WebPage(Request $request){
        $results      = array();
        $x_codigo   = $request->input('x_codigo');
        $ObjetoRepres = RepresentanteModel::VerDatosRepresDetalladoById_WebPage(['ID_REPRES'=>$x_codigo]);
        return json_encode($ObjetoRepres);
    }


    //=======================================================================
    //=======================================================================
    //=======================================================================

    public function RequisitosFamilia()
    {
        return view('vWebPage.pageRequisitos');
    }
    


}
