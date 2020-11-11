@php

$objpPerfilUser = $wData['DataPerfilUser'];
/*
echo "
<pre>";
        print_r($objpPerfilUser);
    echo "<pre>";
        */

    if($objpPerfilUser){
        $pControlPerfil_IdUser = $objpPerfilUser->ID_USER;
        $pControlPerfil_EmailUser = $objpPerfilUser->email;
        $pControlPerfil_IdRolPersonal = $objpPerfilUser->id_rol;
        $pControlPerfil_RolPersonal = $objpPerfilUser->NOM_ROL;
        $pControlPerfil_IdPersonal = $objpPerfilUser->ID_PERSONAL;
        $pControlPerfil_NomPersonal = $objpPerfilUser->NOM_PERSONAL;
        $pControlPerfil_ApepatPersonal = $objpPerfilUser->APEPAT_PERSONAL;
        $pControlPerfil_ApematPersonal = $objpPerfilUser->APEMAT_PERSONAL;
        $pControlPerfil_NombreCompleto = $pControlPerfil_NomPersonal.' '.$pControlPerfil_ApepatPersonal.' '.$pControlPerfil_ApematPersonal;
        $pControlPerfil_IdTipDocPersonal = $objpPerfilUser->ID_TIPDOC;
        $pControlPerfil_NomTipDocPersonal = $objpPerfilUser->NOM_TIPDOC;
        $pControlPerfil_AbrevTipDocPersonal = $objpPerfilUser->ABREV_TIPDOC;
        $pControlPerfil_NumTipDocPersonal = $objpPerfilUser->NUM_DOC;
        $pControlPerfil_IdSexoPersonal = $objpPerfilUser->ID_SEXO;
        $pControlPerfil_NomSexoPersonal = $objpPerfilUser->NOM_SEXO;
        $pControlPerfil_IdEstCivilPersonal = $objpPerfilUser->ID_ESTCIV;
        $pControlPerfil_NomEstCivilPersonal = $objpPerfilUser->NOM_ESTCIV;
        $pControlPerfil_FechNacPersonal = $objpPerfilUser->FECH_NACIMIENTO;
        $pControlPerfil_TelFijoPersonal = $objpPerfilUser->TEL_FIJO;
        $pControlPerfil_CelularPersonal = $objpPerfilUser->CELULAR;
        $pControlPerfil_CorreoPersonal = $objpPerfilUser->CORREO;
        $pControlPerfil_IdDepaPersonal = $objpPerfilUser->ID_DEPA;
        $pControlPerfil_NomDepaPersonal = $objpPerfilUser->DEPARTAMENTO;
        $pControlPerfil_IdProvPersonal = $objpPerfilUser->ID_PROV;
        $pControlPerfil_NomProvPersonal = $objpPerfilUser->PROVINCIA;
        $pControlPerfil_IdDistPersonal = $objpPerfilUser->ID_DIST;
        $pControlPerfil_NomDistPersonal = $objpPerfilUser->DISTRITO;
        $pControlPerfil_NomDireccionPersonal = $objpPerfilUser->NOM_DIRECCION;
        $pControlPerfil_NumDireccionPersonal = $objpPerfilUser->NUM_DIRECCION;
        $pControlPerfil_RefDireccionPersonal = $objpPerfilUser->REF_DIRECCION;

        $pControlPerfil_NomFoto = $pControlPerfil_NumTipDocPersonal.'.jpg';
    }else{
        $pControlPerfil_IdUser = '';
        $pControlPerfil_EmailUser = '';
        $pControlPerfil_IdRolPersonal = '';
        $pControlPerfil_RolPersonal   = '';
        $pControlPerfil_IdPersonal = '';
        $pControlPerfil_NomPersonal   = '';
        $pControlPerfil_ApepatPersonal   = '';
        $pControlPerfil_ApematPersonal   = '';
        $pControlPerfil_NombreCompleto = '';
        $pControlPerfil_IdTipDocPersonal = '';
        $pControlPerfil_NomTipDocPersonal   = '';
        $pControlPerfil_AbrevTipDocPersonal   = '';
        $pControlPerfil_NumTipDocPersonal   = '';
        $pControlPerfil_IdSexoPersonal   = '';
        $pControlPerfil_NomSexoPersonal   = '';
        $pControlPerfil_IdEstCivilPersonal   = '';
        $pControlPerfil_NomEstCivilPersonal   = '';
        $pControlPerfil_FechNacPersonal   = '';
        $pControlPerfil_TelFijoPersonal   = '';
        $pControlPerfil_CelularPersonal   = '';
        $pControlPerfil_CorreoPersonal   = '';
        $pControlPerfil_IdDepaPersonal   = '';
        $pControlPerfil_NomDepaPersonal   = '';
        $pControlPerfil_IdProvPersonal   = '';
        $pControlPerfil_NomProvPersonal   = '';
        $pControlPerfil_IdDistPersonal   = '';
        $pControlPerfil_NomDistPersonal   = '';
        $pControlPerfil_NomDireccionPersonal   = '';
        $pControlPerfil_NumDireccionPersonal   = '';
        $pControlPerfil_RefDireccionPersonal   = '';

        $pControlPerfil_NomFoto   = 'usuario.png';
    }

    $RutaFotoPerfilPersonal = '../images/personal/'.$pControlPerfil_NomFoto;

@endphp


<!--- INTERNAL Tabs js-->
<script src="../activos/pWebPageAdmin/assets/plugins/tabs/jquery.multipurpose_tabcontent.js"></script>
<script src="../activos/pWebPageAdmin/assets/js/tabs.js"></script>

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Mi Perfíl</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Página</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Mi Perfíl</a></li>
        </ol>
    </div>
    <div class="page-rightheader">
        <div class="btn btn-list">
        </div>
    </div>
</div>
<!--End Page header-->


<!-- Row -->
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-12">
        <div class="card box-widget widget-user">
            <div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle" src="{{ $RutaFotoPerfilPersonal }}"></div>
            <div class="card-body text-center">
                <div class="pro-user">
                    <h4 class="pro-user-username text-dark mb-1 font-weight-bold">{{ $pControlPerfil_NombreCompleto }}</h4>
                    <h6 class="pro-user-desc text-muted">{{ $pControlPerfil_RolPersonal }}</h6>
                    <a href="profile.html" class="btn btn-primary  mt-3"><i class="fa fa-pencil"></i> Editar Perfíl</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">DATOS GENERALES</h4>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Nombre </span>
                                </td>
                                <td class="py-2 px-0">{{ $pControlPerfil_NomPersonal }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Apellido Paterno </span>
                                </td>
                                <td class="py-2 px-0">{{ $pControlPerfil_ApepatPersonal }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Apellido Materno </span>
                                </td>
                                <td class="py-2 px-0">{{ $pControlPerfil_ApematPersonal }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Correo </span>
                                </td>
                                <td class="py-2 px-0">{{ $pControlPerfil_CorreoPersonal }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Celular</span>
                                </td>
                                <td class="py-2 px-0">{{ $pControlPerfil_CelularPersonal }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-0">
                                    <span class="font-weight-semibold w-50">Teléfono Fijo </span>
                                </td>
                                <td class="py-2 px-0">{{ $pControlPerfil_TelFijoPersonal }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12">




    <!-- Row -->
      <div class="row">
       <div class="col-md-12">


        <div class="card">

         <div class="card-body p-6">
          <div class="panel panel-primary">
           <div class="tab_wrapper first_tab">
            <ul class="tab_list">
             <li class="">Datos de Usuario</li>
             <li>Datos del Personal</li>
            </ul>
            <div class="content_wrapper">
             <div class="tab_content active">

                <div class="form">
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Usuario</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_EmailUser}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Contraseña</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="*********" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Rol</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_RolPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <div class="form-group">
                                <label class="form-label">Estado</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="Activo" disabled>
                            </div>
                        </div>
                    </div>

                </div>



             </div>

             <div class="tab_content">

                <div class="form">
                    <div class="form-row">
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Nombres</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NomPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_ApepatPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_ApematPersonal}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Tipo Documento</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NomTipDocPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Abrev Tip Doc.</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_AbrevTipDocPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Abrev Tip Doc.</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NumTipDocPersonal}}" disabled>
                            </div>
                        </div>
                    </div>

                    <hr>


                    <div class="form-row">

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Sexo</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NomSexoPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Estado Civil</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NomEstCivilPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Fecha Nacimiento</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_FechNacPersonal}}" disabled>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Tel. Fijo</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_TelFijoPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Celular</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_CelularPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Correo</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_CorreoPersonal}}" disabled>
                            </div>
                        </div>
                    </div>

                    <hr>


                    <div class="form-row">

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Departamento</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NomDepaPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Provincia</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NomProvPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Distrito</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NomDistPersonal}}" disabled>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-9 mb-0">
                            <div class="form-group">
                                <label class="form-label">Dirección</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NomDireccionPersonal}}" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-3 mb-0">
                            <div class="form-group">
                                <label class="form-label">Número</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_NumDireccionPersonal}}" disabled>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-12 mb-0">
                            <div class="form-group">
                                <label class="form-label">Referencia</label>
                                <input type="text" class="form-control" style="color: #1e74a0;" value="{{$pControlPerfil_RefDireccionPersonal}}" disabled>
                            </div>
                        </div>
                    </div>


                </div>


             </div>

            </div>
           </div>
          </div>
                                    </div>




        </div>
       </div>
      </div>
    <!-- End Row -->



    </div>
</div>
