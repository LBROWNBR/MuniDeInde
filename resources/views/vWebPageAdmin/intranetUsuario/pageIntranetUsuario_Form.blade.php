<script>
    $(document).ready(function () {

      var mySelect_Pers = $("#cbo_Personal").selectpicker({ liveSearch: true, maxOptions: 1 });
      mySelect_Pers.selectpicker('refresh');

      var mySelect_UserIntraAnt = $("#cbo_Usuario_IntraAnt").selectpicker({ liveSearch: true, maxOptions: 1 });
      mySelect_UserIntraAnt.selectpicker('refresh');

      var mySelect_Rol = $("#cbo_rol").selectpicker({ liveSearch: true, maxOptions: 1 });
      mySelect_Rol.selectpicker('refresh');

    });
</script>
@php

//echo '<pre>';
//print_r($wData);
//echo '</pre>';

$ObjUsuario = $wData['DataUser'];
if($ObjUsuario){
    $e_ID_user    = $ObjUsuario->id;
    $e_CO_TRAB    = $ObjUsuario->id_personal;
    $e_usuario    = $ObjUsuario->email;
    $e_id_rol     = $ObjUsuario->id_rol;
    $e_password     = $ObjUsuario->password;
}else{
    $e_ID_user    = '';
    $e_CO_TRAB    = '';
    $e_usuario    = '';
    $e_id_rol     = '';
    $e_password   = '';
}

$ObjPersonal = $wData['DataPersonal'];
$ObjRol = $wData['DataRol'];

@endphp

<form>

    <div class="row">

        <div class="col-md-12 col-lg-12">

            <input type="hidden" class="form-control" id="txhCodUser" style="width: 60px;" value="{{$e_ID_user}}" >

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Personal</label>
                        <select name="cbo_Personal" id="cbo_Personal" class="form-control selectpicker" data-live-search="true" style="color: #1e74a0;">
                            <option value="">[ Seleccione Personal ]</option>
                            @php

                            if($ObjPersonal) foreach ($ObjPersonal as $DatPersonal):
                                $z_CO_TRAB        = $DatPersonal->ID_PERSONAL;
                                $z_NO_APEL_PATE   = $DatPersonal->APEPAT_PERSONAL;
                                $z_NO_APEL_MATE   = $DatPersonal->APEMAT_PERSONAL;
                                $z_NO_TRAB        = $DatPersonal->NOM_PERSONAL;

                                $Nombres_Pers = $z_NO_APEL_PATE.' '.$z_NO_APEL_MATE.' '.$z_NO_TRAB;

                                $SelectPersonal = ($e_CO_TRAB == $z_CO_TRAB) ? 'selected="selected"' : '';

                            @endphp
                            <option value="{{$z_CO_TRAB}}" data-subtext="{{$z_CO_TRAB}}" {{$SelectPersonal}} >{{$Nombres_Pers}}</option>

                            @php
                                endforeach;
                            @endphp
                        </select>
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Nombre del Rol</label>
                        <select name="cbo_rol" id="cbo_rol" class="form-control selectpicker" data-live-search="true" style="color: #1e74a0;">
                            <option value="">[ Seleccione Rol ]</option>
                            @php

                            if($ObjRol) foreach ($ObjRol as $DatRol):
                                $z_id_rol        = $DatRol->ID_ROL;
                                $z_nom_rol   = $DatRol->NOM_ROL;

                                $SelectRol = ($e_id_rol == $z_id_rol) ? 'selected="selected"' : '';

                            @endphp
                            <option value="{{$z_id_rol}}" {{$SelectRol}} >{{$z_nom_rol}}</option>

                            @php
                                endforeach;
                            @endphp
                          </select>
                    </div>
                </div>
            </div>


            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Correo del Usuario</label>
                        <input type="text" class="form-control" id="txtCorreoUsuario" value="{{$e_usuario}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Contraseña
                        &nbsp;

                        @php
                            if($e_ID_user != ''){
                        @endphp
                            <label style="font-size: 12px; color: #ef5858;">
                                <input type="checkbox" id="cbox_ConservPSWD" name="cbox_ConservPSWD" value="ConservarClave" onclick="ValidaCheck()"> Conservar contraseña anterior
                            </label>

                            <input type="hidden" id="txt_Password_Old" name="txt_Password_Old" class="form-control" placeholder="Ingrese Contraseña"  value="{{$e_password}}" >
                        @php
                            }
                        @endphp
                        </label>
                        <input type="password" class="form-control" id="txt_NomPassword" style="color: #1e74a0;" placeholder="Ingrese Contraseña">
                    </div>
                </div>
            </div>


        </div>
    </div>
</form>
