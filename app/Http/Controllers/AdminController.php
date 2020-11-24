<?php

namespace App\Http\Controllers;

//use Auth;
//use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\AdminUsuario;
use App\AdminPersonal;
use App\AdminRol;

class AdminController extends Controller
{

    public function Admin_Login(){
        return view('vWebPageAdmin.intranet.pageAdmLogin');
    }

    public function Admin_ValidarLogin(Request $request){

        $xEmail         = $request->input('txtCorreo');
        $xPassword      = $request->input('txtClave');

        $parametrosUser = [
            'email'   => $xEmail,
            'password'  => $xPassword
        ];

        if($xEmail == '' && $xPassword == ''){
            $request->session()->flash('message-error', 'Error: Ingresar usuario y contraseña.');
            return Redirect::to('/administrador');

        }else if($xEmail == '' && $xPassword != ''){
            $request->session()->flash('message-error', 'Error: Ingresar nombre del usuario.');
            return Redirect::to('/administrador');

        }else if($xEmail != '' && $xPassword == ''){
            $request->session()->flash('message-error', 'Error: Ingresar contraseña del usuario.');
            return Redirect::to('/administrador');

        }else{

            if (Auth::attempt($parametrosUser)){

                if ( ! session_id() ) @ session_start();

                $xDatoUser  = AdminUsuario::VerDatoUsuarioByMail(['email' => $xEmail]);
                $sIdUser    = $xDatoUser->id;
                $sIdPers   = $xDatoUser->id_personal;
                $sIdRol   = $xDatoUser->id_rol;

                session(['IdUser' => $sIdUser]);
                session(['IdPers' => $sIdPers]);
                session(['IdRol' => $sIdRol]);
                return Redirect::to('/administrador/AdminControl');

            }else{

                $request->session()->flash('message-error', 'Error: Los datos no son correctos.');
                return Redirect::to('/administrador');

            }

        }

        //return redirect('/administrador/pControl')->with('error', $userx);
        //return redirect()->action('AdminLoginController@Admin_Control', ['id' => 1]);
    }


    public function Admin_Control(Request $request){

        $xData = array();

        $wIdUser = session('IdUser');
        $wIdPers = session('IdPers');
        $wIdRol = session('IdRol');

        if($wIdUser !=''){

            $xData['DataUsuario']   = AdminUsuario::VerDatoUsuarioById(['id' => $wIdUser]);
            $xData['DataPersonal']  = AdminPersonal::VerDatoPersonalByID(['ID_PERSONAL' => $wIdPers]);

            $xData['DataRol']       = AdminRol::VerRolById(['ID_ROL' => $wIdRol]);
            $xData['DataMenu_x_Rol']   = AdminRol::ListarMenu_x_ROL(['ID_ROL' => $wIdRol]);
            $xData['DataSubMenu01_x_Rol']   = AdminRol::ListarSubMenu01_x_ROL(['ID_ROL' => $wIdRol]);
            $xData['DataSubMenu02_x_Rol']   = AdminRol::ListarSubMenu02_x_ROL(['ID_ROL' => $wIdRol]);
            
            

            //-----
            return view('vWebPageAdmin.intranet.pageAdmControl', ['wData' => $xData]);

        }else{

            $request->session()->flash('message-error', 'Se terminó la sesión del usuario!');
            return Redirect::to('/administrador');

        }

    }


    public function Admin_CerrarSession()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/administrador');
    }



    public function Admin_MiPerfil($idUsuario)
    {
        $xData = array();
        $xData['DataPerfilUser']   = AdminUsuario::VerDatoCompletoUsuarioById(['id_user' => $idUsuario]);

        return view('vWebPageAdmin.intranet.pageAdminPerfil', ['wData' => $xData]);
    }




}
