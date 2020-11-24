@php

//echo '<pre>';
//print_r($wData);
//echo '</pre>';

$ObjDataPersonal = $wData['DataPersonal'];
$ObjDataTipoDocumento = $wData['DataTipoDocumento'];
$ObjDataSexo = $wData['DataSexo'];
$ObjDataEstadoCivil = $wData['DataEstadoCivil'];
$ObjDataDepartamento = $wData['DataDepartamento'];

$ObjDataEditProvincia = $wData['DataEditProvincia'];
$ObjDataEditDistrito = $wData['DataEditDistrito'];


if($ObjDataPersonal){
    $eID_PERSONAL     = $ObjDataPersonal->ID_PERSONAL;
    $eAPEPAT_PERSONAL    = $ObjDataPersonal->APEPAT_PERSONAL;
    $eAPEMAT_PERSONAL    = $ObjDataPersonal->APEMAT_PERSONAL;
    $eNOM_PERSONAL    = $ObjDataPersonal->NOM_PERSONAL;
    $eID_TIPDOC    = $ObjDataPersonal->ID_TIPDOC;
    $eNUM_DOC    = $ObjDataPersonal->NUM_DOC;
    $eID_SEXO    = $ObjDataPersonal->ID_SEXO;
    $eID_ESTCIV    = $ObjDataPersonal->ID_ESTCIV;
    $eFECH_NACIMIENTO    = $ObjDataPersonal->FECH_NACIMIENTO;
    $eTEL_FIJO    = $ObjDataPersonal->TEL_FIJO;
    $eCELULAR    = $ObjDataPersonal->CELULAR;
    $eCORREO    = $ObjDataPersonal->CORREO;
    $eID_DEPA    = $ObjDataPersonal->ID_DEPA;
    $eID_PROV    = $ObjDataPersonal->ID_PROV;
    $eID_DIST    = $ObjDataPersonal->ID_DIST;
    $eNOM_DIRECCION    = $ObjDataPersonal->NOM_DIRECCION;
    $eNUM_DIRECCION    = $ObjDataPersonal->NUM_DIRECCION;
    $eREF_DIRECCION    = $ObjDataPersonal->REF_DIRECCION;
    $eFOTO_PERSONAL    = $ObjDataPersonal->FOTO_PERSONAL;

}else{
    $eID_PERSONAL     = '';
    $eAPEPAT_PERSONAL    = '';
    $eAPEMAT_PERSONAL    = '';
    $eNOM_PERSONAL    = '';
    $eID_TIPDOC    = '';
    $eNUM_DOC    = '';
    $eID_SEXO    = '';
    $eID_ESTCIV    = '';
    $eFECH_NACIMIENTO    = '';
    $eTEL_FIJO    = '';
    $eCELULAR    = '';
    $eCORREO    = '';
    $eID_DEPA    = '';
    $eID_PROV    = '';
    $eID_DIST    = '';
    $eNOM_DIRECCION    = '';
    $eNUM_DIRECCION    = '';
    $eREF_DIRECCION    = '';
    $eFOTO_PERSONAL    = '';
}

@endphp


<form>

    <input type="hidden" class="form-control" id="txhCodPersonal" style="width: 60px;" value="{{$eID_PERSONAL}}" >

    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="txtApePat" value="{{$eAPEPAT_PERSONAL}}" style="color: #1e74a0;">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="txtApeMat" value="{{$eAPEMAT_PERSONAL}}" style="color: #1e74a0;">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="txtNombres" value="{{$eNOM_PERSONAL}}" style="color: #1e74a0;">
            </div>
        </div>

    </div>



    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Tipo Documento:</label>
                <select class="form-control" id="cboTipDoc" style="color: #1e74a0;">
                    <option value="" selected="selected">Seleccione</option>
                    @php

                    if($ObjDataTipoDocumento) foreach ($ObjDataTipoDocumento as $TipoDocumento):
                        $zID_TIPDOC        = $TipoDocumento->ID_TIPDOC;
                        $zNOM_TIPDOC   = $TipoDocumento->NOM_TIPDOC;
                        $zABREV_TIPDOC   = $TipoDocumento->ABREV_TIPDOC;

                        $SelectTipDoc = ($zID_TIPDOC == $eID_TIPDOC) ? 'selected="selected"' : '';

                    @endphp
                    <option value="{{$zID_TIPDOC}}"  {{$SelectTipDoc}} >{{$zABREV_TIPDOC}}</option>

                    @php
                        endforeach;
                    @endphp
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Nro. Documento:</label>
                <input type="text" class="form-control" id="txtNumDoc" value="{{$eNUM_DOC}}" style="color: #1e74a0;">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Sexo:</label>
                <select class="form-control" id="cboSexo" style="color: #1e74a0;">
                    <option value="" selected="selected">Seleccione</option>
                    @php

                    if($ObjDataSexo) foreach ($ObjDataSexo as $Sexo):
                        $zID_SEXO        = $Sexo->ID_SEXO;
                        $zNOM_SEXO   = $Sexo->NOM_SEXO;

                        $SelectSexo = ($zID_SEXO == $eID_SEXO) ? 'selected="selected"' : '';

                    @endphp
                    <option value="{{$zID_SEXO}}"  {{$SelectSexo}} >{{$zNOM_SEXO}}</option>

                    @php
                        endforeach;
                    @endphp
                </select>
            </div>
        </div>

    </div>



    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Estado Civil:</label>
                <select class="form-control" id="cboEstCivil" style="color: #1e74a0;">
                    <option value="" selected="selected">Seleccione</option>
                    @php

                    if($ObjDataEstadoCivil) foreach ($ObjDataEstadoCivil as $EstadoCivil):
                        $zID_ESTCIV        = $EstadoCivil->ID_ESTCIV;
                        $zNOM_ESTCIV       = $EstadoCivil->NOM_ESTCIV;

                        $SelectEstCivil = ($zID_ESTCIV == $eID_ESTCIV) ? 'selected="selected"' : '';

                    @endphp
                    <option value="{{$zID_ESTCIV}}"  {{$SelectEstCivil}} >{{$zNOM_ESTCIV}}</option>

                    @php
                        endforeach;
                    @endphp
                </select>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Fecha Nacimiento:</label>
                <input type="date" class="form-control" id="txtfechaNac" value="{{$eFECH_NACIMIENTO}}" style="color: #1e74a0;">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Teléfono Fijo:</label>
                <input type="text" class="form-control" id="txtTelFijo" value="{{$eTEL_FIJO}}" style="color: #1e74a0;">
            </div>
        </div>

    </div>



    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Celular:</label>
                <input type="text" class="form-control" id="txtCelular" value="{{$eCELULAR}}" style="color: #1e74a0;">
            </div>
        </div>


        <div class="col-md-8">
            <div class="form-group">
                <label class="form-label">Correo:</label>
                <input type="text" class="form-control" id="txtCorreo" value="{{$eCORREO}}" style="color: #1e74a0;">
            </div>
        </div>

    </div>



    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Departamento:</label>
                <select class="form-control" id="cboDepa" style="color: #1e74a0;"  onchange="MostrarProvincia()">
                    <option value="" selected="selected">Seleccione</option>
                    @php
                    if($ObjDataDepartamento) foreach ($ObjDataDepartamento as $Departamento):
                        $zCODDEP        = $Departamento->CODDEP;
                        $zDEPARTAMENTO       = $Departamento->NMBUBIGEO;
                        $SelectDepa = ($zCODDEP == $eID_DEPA) ? 'selected="selected"' : '';
                    @endphp
                    <option value="{{$zCODDEP}}"  {{$SelectDepa}} >{{$zDEPARTAMENTO}}</option>
                    @php
                        endforeach;
                    @endphp
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Provincia:</label>
                <select class="form-control" id="cboProv" style="color: #1e74a0;" onchange="MostrarDistrito()">
                    <option value="" selected="selected">Seleccione</option>
                    @php
                    if($ObjDataEditProvincia) foreach ($ObjDataEditProvincia as $editProvincia):
                        $zCODPROV        = $editProvincia->CODPROV;
                        $zPROVINCIA      = $editProvincia->NMBUBIGEO;
                        $SelectProv = ($zCODPROV == $eID_PROV) ? 'selected="selected"' : '';
                    @endphp
                    <option value="{{$zCODPROV}}"  {{$SelectProv}} >{{$zPROVINCIA}}</option>
                    @php
                        endforeach;
                    @endphp
                </select>
                </select>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Distrito:</label>
                <select class="form-control" id="cboDist" style="color: #1e74a0;">
                    <option value="" selected="selected">Seleccione</option>
                    @php
                    if($ObjDataEditDistrito) foreach ($ObjDataEditDistrito as $editDistrito):
                        $zCODDIST        = $editDistrito->CODDIST;
                        $zDISTRITO      = $editDistrito->NMBUBIGEO;
                        $SelectDist = ($zCODDIST == $eID_DIST) ? 'selected="selected"' : '';
                    @endphp
                    <option value="{{$zCODDIST}}"  {{$SelectDist}} >{{$zDISTRITO}}</option>
                    @php
                        endforeach;
                    @endphp
                </select>
            </div>
        </div>

    </div>



    <div class="row">

        <div class="col-md-10">
            <div class="form-group">
                <label class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="txtNomDireccion" value="{{$eNOM_DIRECCION}}" style="color: #1e74a0;">
            </div>
        </div>


        <div class="col-md-2">
            <div class="form-group">
                <label class="form-label">Nro:</label>
                <input type="text" class="form-control" id="txtNumDireccion" value="{{$eNUM_DIRECCION}}" style="color: #1e74a0;">
            </div>
        </div>

    </div>



    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Referencia:</label>
                <input type="text" class="form-control" id="txtReferencia" value="{{$eREF_DIRECCION}}" style="color: #1e74a0;">
            </div>
        </div>

    </div>


</form>
