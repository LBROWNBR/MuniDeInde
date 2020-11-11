<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\ProductoModel;
use App\MarcaModel;
use App\MaestrasModel;
use App\ClienteModel;
use App\CategoriaModel;
use App\Funciones;
use RealRashid\SweetAlert\Facades\Alert;
use Session;


class WebPageController extends Controller
{
    public function index(){

        $xData = array();
        return view('vWebPage.pageHome',  ['wData' => $xData]);
    }



    public function registrate(){

        $xData = array();

        $xData['DataTipoDocumento'] = null;//MaestrasModel::ListarTipoDocumento();
        $xData['DataTipoGenero'] = null;//MaestrasModel::ListarTipoGenero();
        $xData['DataDepartamento'] = null;//MaestrasModel::ListarDepartamento();

        return view('vWebPage.pageCliRegistrate',  ['wData' => $xData]);
    }


    public function cliListarProv(Request $request){
        $results      = array();
        $cbo_depacli   = $request->input('cbo_depacli');
        $results['DataProvincia'] = MaestrasModel::ListarProvincia(['CODDEP' => $cbo_depacli]);
        return json_encode($results);
    }


    public function cliListarDist(Request $request){
        $results      = array();
        $cbo_depacli   = $request->input('cbo_depacli');
        $cbo_provcli   = $request->input('cbo_provcli');
        $results['DataDistrito'] = MaestrasModel::ListarDistrito(['CODDEP' => $cbo_depacli, 'CODPROV' => $cbo_provcli]);
        return json_encode($results);
    }


    public function cliRegistrar(Request $request){

        $resultado  = array();

        $x_txt_nom_cli   = $request->input('txt_nom_cli');
        $x_txt_ape_cli  = $request->input('txt_ape_cli');
        $x_cbotipdoc_cli   = $request->input('cbotipdoc_cli');
        $x_txt_numdoc_cli   = $request->input('txt_numdoc_cli');
        $x_cbogenero_cli   = $request->input('cbogenero_cli');
        $x_txt_fechacumple   = $request->input('txt_fechacumple');
        $x_txt_telfijo   = $request->input('txt_telfijo');
        $x_txt_celcli   = $request->input('txt_celcli');
        $x_txt_correocli   = $request->input('txt_correocli');
        $x_txt_dircli   = $request->input('txt_dircli');
        $x_cbo_depacli   = $request->input('cbo_depacli');
        $x_cbo_provcli   = $request->input('cbo_provcli');
        $x_cbo_distcli   = $request->input('cbo_distcli');

        $x_txt_usuario_cli   = $request->input('txt_usuario_cli');
        $x_txt_clave_cli   = $request->input('txt_clave_cli');

        //VALIDA SI EL CORREO DEL CLIENTE YA SE ENCUENTRA REGISTRADO
        $ObjTotExisteCliCorreo = ClienteModel::VerificaExisteCorreoCliente(['CORREO_CLI' => $x_txt_correocli]);
        $TotExisteCliCorreo = $ObjTotExisteCliCorreo->TOT_CLI;

        //VALIDA SI EL NUM DOCUMENTO DEL CLIENTE YA SE ENCUENTRA REGISTRADO
        $ObjTotExisteTipDocCorreo = ClienteModel::VerificaExisteTipoDocumentoCliente(['ID_TIPDOC' => $x_cbotipdoc_cli, 'NUMDOC_CLI' => $x_txt_numdoc_cli]);
        $TotExisteTipDocCorreo = $ObjTotExisteTipDocCorreo->TOT_REGCLI;

        //VALIDA SI EL NOMBRE USUARIO DEL CLIENTE YA SE ENCUENTRA REGISTRADO
        $ObjTotExisteCliUsuario = ClienteModel::VerificaExisteUsuarioCliente(['USER_CLI' => $x_txt_usuario_cli]);
        $TotExisteNombreUsuario = $ObjTotExisteCliUsuario->TOT_USER;

        if($TotExisteCliCorreo > 0){

            $resultado = [
                "titulo"=>"¡Error al registrar!",
                "mensaje"=>"El correo del cliente ya se encuentra registrado",
                "tipo"=>"warning",
                "rs"=>"0"
            ];

        }else if($TotExisteTipDocCorreo > 0){

            $resultado = [
                "titulo"=>"¡Error al registrar!",
                "mensaje"=>"El tipo y número de documento del cliente ya se encuentra registrado",
                "tipo"=>"warning",
                "rs"=>"0"
            ];

        }else if($TotExisteNombreUsuario > 0){

            $resultado = [
                "titulo"=>"¡Error al Registrar!",
                "mensaje"=>"El nombre de usuario o email ya existe",
                "tipo"=>"warning",
                "rs"=>"0"
            ];

        }else{

                $PARAMETROS = [
                    "NOMBRE_CLI"=>$x_txt_nom_cli,
                    "APELLIDOS_CLI"=>$x_txt_ape_cli,
                    "ID_TIPDOC"=>$x_cbotipdoc_cli,
                    "NUMDOC_CLI"=>$x_txt_numdoc_cli,
                    "ID_SEXO"=>$x_cbogenero_cli,
                    "FECHNAC_CLI"=>Funciones::Cambiar_fecha_a_Mysql($x_txt_fechacumple),
                    "TEL_CLI"=>$x_txt_telfijo,
                    "CEL_CLI"=>$x_txt_celcli,
                    "CORREO_CLI"=>$x_txt_correocli,
                    "DIREC_CLI"=>$x_txt_dircli,
                    "ID_DEPA"=>$x_cbo_depacli,
                    "ID_PROV"=>$x_cbo_provcli,
                    "ID_DIST"=>$x_cbo_distcli,
                    "USER_CLI"=>$x_txt_usuario_cli,
                    "PASS_CLI"=>bcrypt($x_txt_clave_cli)
                ];

                $CodCliente = ClienteModel::InsertarData_Cliente($PARAMETROS);

                if($CodCliente>0){

                    $xDatoCliente  = ClienteModel::VerDatosCliente_x_ID(['ID_CLI'=>$CodCliente]);

                    $DataClienteSession = [
                        "SESS_ID_CLI" => $xDatoCliente->ID_CLI,
                        "SESS_NOMBRE_CLI" => $xDatoCliente->NOMBRE_CLI,
                        "SESS_APELLIDOS_CLI" => $xDatoCliente->APELLIDOS_CLI,
                        "SESS_USER_CLI" => $xDatoCliente->USER_CLI
                    ];

                    session()->put('SessDatoCliente', $DataClienteSession);

                    $resultado = [
                        "titulo"=>"¡Felicidades!",
                        "mensaje"=>"Se registró de manera correcta los datos del Cliente",
                        "tipo"=>"success",
                        "rs"=>"1"
                    ];

                }else{
                    $resultado = [
                        "titulo"=>"¡Error al Registrar!",
                        "mensaje"=>"Los datos del cliente no son correctos",
                        "tipo"=>"danger",
                        "rs"=>"0"
                    ];
                }

        }

        return json_encode($resultado);

    }




    public function acceder(){
        $xData['DataCategoriaMenu'] = CategoriaModel::ListarCategoriasMenu();
        return view('vWebPage.pageCliLogin', ['wData' => $xData]);
    }


    public function cliValidarLogin(Request $request){

        $resultado  = array();
        $txt_UserCliente   = $request->input('txt_UserCliente');
        $txt_PasswdCliente   = $request->input('txt_PasswdCliente');

        //VER DATOS POR NOMBRE DE USUARIO
        $ObjDataCliente = ClienteModel::VerDatosCliente_x_UserCliente(['USER_CLI' => $txt_UserCliente]);
        $BDIdCliente = $ObjDataCliente->ID_CLI;
        $BDPasswordCliente = $ObjDataCliente->PASS_CLI;

        if (password_verify($txt_PasswdCliente, $BDPasswordCliente)) {

            $xDatoCliente  = ClienteModel::VerDatosCliente_x_ID(['ID_CLI'=>$BDIdCliente]);

            $DataClienteSession = [
                "SESS_ID_CLI" => $xDatoCliente->ID_CLI,
                "SESS_NOMBRE_CLI" => $xDatoCliente->NOMBRE_CLI,
                "SESS_APELLIDOS_CLI" => $xDatoCliente->APELLIDOS_CLI,
                "SESS_USER_CLI" => $xDatoCliente->USER_CLI
            ];

            session()->put('SessDatoCliente', $DataClienteSession);

            $resultado = [
                "titulo"=>"¡Felicidades!",
                "mensaje"=>"Sus Datos son Correctos",
                "tipo"=>"success",
                "rs"=>"1"
            ];

        } else {

            $resultado = [
                "titulo"=>"¡Error al Acceder!",
                "mensaje"=>"Usuario o contraseña son incorrectos",
                "tipo"=>"warning",
                "rs"=>"0"
            ];
        }

        return json_encode($resultado);


    }






    public function micuenta(){

        $xData['DataCategoriaMenu'] = CategoriaModel::ListarCategoriasMenu();

        return view('vWebPage.pageCliMicuenta', ['wData' => $xData]);
    }




    public function vistarapida($IdCodigo){

        $xData = array();
        $xData['DataDetProducto'] = ProductoModel::ProductoDetalle(['cod_product'=>$IdCodigo]);
        $xData['DataFotosDetProd'] = ProductoModel::ListarFotoDetallexProducto(['COD_PRODUCT'=>$IdCodigo]);


        return view('vWebPage.pageVistaRapida',  ['wData' => $xData]);
    }

    public function productos(){

        $xData = array();
        $xData['DataproductoGeneral'] = ProductoModel::ListarProductoGeneral();
        $xData['DataCategoriaMenu'] = CategoriaModel::ListarCategoriasMenu();

        //
        return view('vWebPage.pageProductos' ,  ['wData' => $xData]);
    }

    public function productos2(){
        return view('vWebPage.pageProductos2');
    }

    public function carrito(){
        return view('vWebPage.pageCarrito');
    }

    public function checkout(){
        return view('vWebPage.pageCheckout');
    }

    public function productodet($IdCodigoProducto){

        $xData = array();
        $ObjetosCod = ProductoModel::ProductoDetalle(['cod_product'=>$IdCodigoProducto]);
        //print_r($ObjetosCod);
        //die();
        $CodigoCategoria = $ObjetosCod->codcate;
        $xData['DataDetProducto'] = ProductoModel::ProductoDetalle(['cod_product'=>$IdCodigoProducto]);
        $xData['DataCaracteristica'] = ProductoModel::CaracteristicasProducto(['id_producto'=>$IdCodigoProducto]);
        $xData['DataComentario'] = ProductoModel::ListarComentariosxProducto(['IDPRODUCTO'=>$IdCodigoProducto]);
        $xData['DataProductoRelacion'] = ProductoModel::ListaProductoRelacionado(['cod_categoria'=>$CodigoCategoria]);
        $xData['DataCategoriaMenu'] = CategoriaModel::ListarCategoriasMenu();
        $xData['DataFotosDetProd'] = ProductoModel::ListarFotoDetallexProducto(['COD_PRODUCT'=>$IdCodigoProducto]);



        return view('vWebPage.pageProductoDet' ,  ['wData' => $xData]);
    }

    public function confirmado(){
        return view('vWebPage.pageConfirmado');
    }

}
