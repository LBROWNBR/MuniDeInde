<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminUsuario;
use App\AdminPersonal;
use App\AdminRol;

class AdminUsuarioController extends Controller
{
    
    public function Admin_UsuarioInicio()
    {
        return view('vWebPageAdmin.intranetUsuario.pageIntranetUsuario_Principal');
    }


    public function Admin_UsuarioListar()
    {
        $Objeto = AdminUsuario::List_All_User();

        if($Objeto) foreach ($Objeto as $reg):
            $data[]=array(
                "0"=>"<div class='text-center'>".$reg->ID_USER."<div>",
                "1"=>$reg->email,
                "2"=>"<div class='text-center'>".$reg->ID_PERSONAL."<div>",
                "3"=>$reg->APEPAT_PERSONAL.' '.$reg->APEMAT_PERSONAL.' '.$reg->NOM_PERSONAL,
                "4"=>$reg->NOM_ROL,
                "5"=>"<div class='text-center'><button class='btn btn-info btn-sm' value=".$reg->ID_USER." OnClick='Form_User(this.value);'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button class='btn btn-danger btn-sm' value=".$reg->ID_USER." OnClick='Eliminar_User(this.value);'><i class='fa fa-trash'></i></button><div>"
            );
        endforeach;

        $results = array(
            "sEcho"=>1, //Informacion para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        return json_encode($results);
    }


    public function Admin_UsuarioFormulario(Request $request)
    {
        $xData      = array();
        $x_codigo   = $request->input('x_codigo');
        $xData['DataUser']      = AdminUsuario::VerDatoUsuarioById(['id'=>$x_codigo]);

        $xData['DataPersonal']  = AdminPersonal::ListarAllPersonal();
        $xData['DataRol']       = AdminRol::List_All_Rol();

        return view('vWebPageAdmin.intranetUsuario.pageIntranetUsuario_Form', ['wData' => $xData]);
    }


    public function Admin_UsuarioRegistrar(Request $request)
    {

        $txhCodUser             = $request->input('txhCodUser');
        $cbo_Personal           = $request->input('cbo_Personal');
        $cbo_Usuario_IntraAnt           = $request->input('cbo_Usuario_IntraAnt');
        $cbo_rol                = $request->input('cbo_rol');
        $txtCorreoUsuario       = $request->input('txtCorreoUsuario');
        $txt_NomPassword        = $request->input('txt_NomPassword');
        $check_ConservPSWD      = $request->input('check_ConservPSWD');
        $txt_Password_Old       = $request->input('txt_Password_Old');


        if($txhCodUser == ''){

            $arrayCampos_0 = ['email'=>strtoupper(trim($txtCorreoUsuario))];
            $ObjetoUser = AdminUsuario::Verifica_Existe_Usuario($arrayCampos_0);
            $TotalUser = $ObjetoUser->tot_reg;

            if($TotalUser == 0){

                $arrayCampos_1 = [
                    'id_personal'=>$cbo_Personal,
                    'id_rol'=>$cbo_rol,
                    'email'=>strtoupper(trim($txtCorreoUsuario)),
                    'password'=>bcrypt($txt_NomPassword)
                ];

                $CodInsertado = AdminUsuario::InsertData_User($arrayCampos_1);
                $valor = ($CodInsertado>0) ? 1 : 0;

            }else{
                $valor = 2; //usuario ya existe
            }



        }else{

            $arrayCampos_0 = ['email'=>strtoupper(trim($txtCorreoUsuario)), 'id'=>$txhCodUser];
            $ObjetoUser = AdminUsuario::Verifica_Existe_Usuario_Edit($arrayCampos_0);
            $TotalUser = $ObjetoUser->tot_reg;

            if($TotalUser == 0){

                if($check_ConservPSWD == 1){
                    $clave_User = $txt_Password_Old;
                }else{
                    $clave_User = bcrypt($txt_NomPassword);
                }

                $arrayCampos = [
                    'id'=>$txhCodUser,
                    'id_personal'=>$cbo_Personal,
                    'id_rol'=>$cbo_rol,
                    'email'=>strtoupper(trim($txtCorreoUsuario)),
                    'password'=>$clave_User
                ];

                $Actualizado = AdminUsuario::UpdateData_User($arrayCampos);
                $valor = ($Actualizado) ? 1 : 0;

            }else{
                $valor = 2; //usuario ya existe
            }
        }

        return $valor;

    }


    public function Admin_UsuarioEliminar(Request $request)
    {
        $x_codigo = $request->input('x_codigo');
        $Eliminado = AdminUsuario::Delete_User(['id'=>$x_codigo]);
        $valor = ($Eliminado) ? 1 : 0;
        return $valor;

    }
    
}
