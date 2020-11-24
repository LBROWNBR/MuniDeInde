<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminTBLMaestras;

class AdminTBLMaestrasController extends Controller
{
    public function Admin_MaestrasListarProvincias(Request $request){
        $results       = array();
        $cboDepa   = $request->input('cboDepa');
        $results['DataProvincia'] = AdminTBLMaestras::Listar_Provincia(['CODDEP' => $cboDepa]);
        return json_encode($results);
    }


    public function Admin_MaestrasListarDistritos(Request $request){
        $results      = array();
        $cboDepa   = $request->input('cboDepa');
        $cboProv   = $request->input('cboProv');
        $results['DataDistrito'] = AdminTBLMaestras::Listar_Distrito(['CODDEP' => $cboDepa, 'CODPROV' => $cboProv]);
        return json_encode($results);
    }
}
