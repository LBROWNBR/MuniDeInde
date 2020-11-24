@php

//echo '<pre>';
//print_r($wData);
//echo '</pre>';

$ObjRepresentante = $wData['DataRepresentante'];
$arrayTipoDocumento = $wData['DataTipoDocumento'];
$arrayTipoGenero = $wData['DataTipoGenero'];
$arrayDepartamento = $wData['DataDepartamento'];
$arrayParentesco = $wData['DataParentesco'];

$arrayProvincia = $wData['DataProvincia'];
$arrayDistrito = $wData['DataDistrito'];


if($ObjRepresentante){
    $ID_REPRES     = $ObjRepresentante->ID_REPRES;
    $NOM_FAMILIA    = $ObjRepresentante->NOM_FAMILIA;
    $COD_TIPDOC    = $ObjRepresentante->COD_TIPDOC;
    $NUMDOC_REPRES    = $ObjRepresentante->NUMDOC_REPRES;
    $COD_TIPPARENT    = $ObjRepresentante->COD_TIPPARENT;
    $NOMBRE_REPRES    = $ObjRepresentante->NOMBRE_REPRES;
    $APEPAT_REPRES    = $ObjRepresentante->APEPAT_REPRES;
    $APEMAT_REPRES    = $ObjRepresentante->APEMAT_REPRES;
    $ID_SEXO    = $ObjRepresentante->ID_SEXO;
    $FECNAC_REPRES    = $ObjRepresentante->FECNAC_REPRES;
    $TEL_REPRES    = $ObjRepresentante->TEL_REPRES;
    $CEL_REPRES    = $ObjRepresentante->CEL_REPRES;
    $DIR_REPRES    = $ObjRepresentante->DIR_REPRES;
    $CODDEP    = $ObjRepresentante->CODDEP;
    $CODPROV    = $ObjRepresentante->CODPROV;
    $CODDIST    = $ObjRepresentante->CODDIST;
    $LATITUD    = $ObjRepresentante->LATITUD;
    $LONGITUD    = $ObjRepresentante->LONGITUD;

}else{
    $ID_REPRES     = '';
    $NOM_FAMILIA    = '';
    $COD_TIPDOC    = '';
    $NUMDOC_REPRES    = '';
    $COD_TIPPARENT    = '';
    $NOMBRE_REPRES    = '';
    $APEPAT_REPRES    = '';
    $APEMAT_REPRES    = '';
    $ID_SEXO    = '';
    $FECNAC_REPRES    = '';
    $TEL_REPRES    = '';
    $CEL_REPRES    = '';
    $DIR_REPRES    = '';
    $CODDEP    = '';
    $CODPROV    = '';
    $CODDIST    = '';
    $LATITUD    = '';
    $LONGITUD    = '';
}


@endphp

 <form class="formulario">

                            <input type="hidden" name="txh_codrepres" id="txh_codrepres" value="{{$ID_REPRES}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                            <div class="form-group">
                                <label><strong>Representante de la Familia</strong></label>
                            </div>


                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Nombre de la Familia</span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_nom_familia" name="txt_nom_familia" placeholder="Nombre de la Familia" pattern="[A-Za-z-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]{2,200}" style="color: #1e74a0;" value="{{$NOM_FAMILIA}}" required>
                                        <div class="invalid-feedback">Ingrese Nombre de la Familia</div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Tipo Doc.</span>
                                        </div>
                                        <select class="form-control" name="cbotipdoc_familia" id="cbotipdoc_familia" style="color: #1e74a0;" required>
                                            <option value="" selected>Tipo Documento</option>
                                            @php
                                                if($arrayTipoDocumento) foreach ($arrayTipoDocumento as $DataTipDoc):
                                                    $xCODTIPDOC = $DataTipDoc->ID_TIPDOC;
                                                    $xNOMTIPDOC = $DataTipDoc->ABREV_TIPDOC;

                                                    $selected_TipDoc = ($COD_TIPDOC == $xCODTIPDOC)? 'selected="selected"' : '';
                                            @endphp
                                                <option value="{{$xCODTIPDOC}}" {{$selected_TipDoc}} >{{$xNOMTIPDOC}}</option>
                                            @php
                                                endforeach;
                                            @endphp
                                        </select>
                                        <div class="invalid-feedback">Seleccione Tipo de Documento</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" >Nro. Doc.</span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_numdoc_familia" name="txt_numdoc_familia" placeholder="Nro. Documento" pattern="[A-Za-z0-9-ÿ\u00f1\u00d1]{1,50}" style="color: #1e74a0;" value="{{$NUMDOC_REPRES}}" required>
                                    <div class="invalid-feedback">Ingrese Nro. de Documento</div>
                                  </div>
                                </div>
                            </div>




                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Parentesco</span>
                                        </div>
                                        <select class="form-control" name="cboparentesco" id="cboparentesco" style="color: #1e74a0;" required>
                                            <option value="" selected>Parentesco</option>
                                            @php
                                                if($arrayParentesco) foreach ($arrayParentesco as $DataParent):
                                                    $xCOD_TIPPARENT = $DataParent->COD_TIPPARENT;
                                                    $xDESC_TIPPARENT = $DataParent->DESC_TIPPARENT;

                                                    $selected_TipParentesco = ($COD_TIPPARENT == $xCOD_TIPPARENT)? 'selected="selected"' : '';
                                            @endphp
                                                <option value="{{$xCOD_TIPPARENT}}" {{$selected_TipParentesco}} >{{$xDESC_TIPPARENT}}</option>
                                            @php
                                                endforeach;
                                            @endphp
                                        </select>
                                        <div class="invalid-feedback">Seleccione Parentesco</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" >Nombre</span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_nombre_Represent" name="txt_nombre_Represent" placeholder="Nombre del Representante" pattern="[A-Za-z0-9-ÿ\u00f1\u00d1]{1,100}" style="color: #1e74a0;" value="{{$NOMBRE_REPRES}}" required>
                                    <div class="invalid-feedback">Ingrese Nombre del Representante</div>
                                  </div>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Ap. Paterno</span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_apepat_repres" name="txt_apepat_repres" placeholder="Apellido Paterno" pattern="[A-Za-z-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]{2,200}" style="color: #1e74a0;" value="{{$APEPAT_REPRES}}" required>
                                        <div class="invalid-feedback">Ingrese Apellido Paterno del Representante</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" >Ap. Materno</span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_apemat_repres" name="txt_apemat_repres" placeholder="Apellido Materno" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" style="color: #1e74a0;" value="{{$APEMAT_REPRES}}" required>
                                    <div class="invalid-feedback">Ingrese Apellido Materno del Representante</div>
                                  </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Sexo</span>
                                        </div>
                                        <select class="form-control" name="cbogenero_repres" id="cbogenero_repres" style="color: #1e74a0;" required>
                                            <option value="">Genero</option>
                                            @php
                                                if($arrayTipoGenero) foreach ($arrayTipoGenero as $DataTipGenero):
                                                    $xCODSEXO = $DataTipGenero->ID_SEXO;
                                                    $xNOMSEXO = $DataTipGenero->NOM_SEXO;

                                                    $selected_Sexo = ($ID_SEXO == $xCODSEXO)? 'selected="selected"' : '';
                                            @endphp
                                                <option value="{{$xCODSEXO}}" {{$selected_Sexo}}>{{$xNOMSEXO}}</option>
                                            @php
                                                endforeach;
                                            @endphp
                                        </select>
                                        <div class="invalid-feedback">Seleccione Genero</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" >Fecha Nac.</span>
                                    </div>
                                    <input type="date" class="form-control" id="txt_fechaNac_repres" name="txt_fechaNac_repres" placeholder="Fecha Nacimiento" pattern="([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})" style="color: #1e74a0;" value="{{$FECNAC_REPRES}}" required>
                                    <div class="invalid-feedback">Ingrese Fecha de Nacimiento</div>
                                  </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" >Teléfono</span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_telfijo" name="txt_telfijo" placeholder="Teléfono" pattern="[0-9+ ]{6,20}" style="color: #1e74a0;" value="{{$TEL_REPRES}}" >
                                    </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Celular</span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_celular" name="txt_celular" placeholder="Celular" pattern="[0-9+ ]{9,20}" style="color: #1e74a0;" value="{{$CEL_REPRES}}" required>
                                        <div class="invalid-feedback">Ingrese Nro. Celular</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Dirección</span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_dir_repres" name="txt_dir_repres" placeholder="Dirección de la Familia" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" style="color: #1e74a0;" value="{{$DIR_REPRES}}" required>
                                        <div class="invalid-feedback">Ingrese Dirección</div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" >Departamento</span>
                                        </div>
                                        <select class="form-control" name="cbo_depa_fam" id="cbo_depa_fam" onchange="MostrarProvincia()" style="color: #1e74a0;" required>
                                                <option value="" selected>Departamento</option>
                                            @php
                                                if($arrayDepartamento) foreach ($arrayDepartamento as $DataDepa):
                                                    $xCODDEP = $DataDepa->CODDEP;
                                                    $xNOMDEP = $DataDepa->NMBUBIGEO;

                                                    $selected_Depa = ($CODDEP == $xCODDEP)? 'selected="selected"' : '';
                                            @endphp
                                                <option value="{{$xCODDEP}}" {{$selected_Depa}}>{{$xNOMDEP}}</option>
                                            @php
                                                endforeach;
                                            @endphp

                                        </select>
                                        <div class="invalid-feedback">Seleccione Departamento</div>
                                    </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Provincia</span>
                                        </div>
                                        <select class="form-control" name="cbo_prov_fam" id="cbo_prov_fam" onchange="MostrarDistrito()" style="color: #1e74a0;" required>
                                            <option value="">Seleccione</option>
                                            @php
                                                if($arrayProvincia) foreach ($arrayProvincia as $DataProv):
                                                    $xCODPROV = $DataProv->CODPROV;
                                                    $xNOMPROV = $DataProv->NMBUBIGEO;

                                                    $selected_Prov = ($CODPROV == $xCODPROV)? 'selected="selected"' : '';
                                            @endphp
                                                <option value="{{$xCODPROV}}" {{$selected_Prov}}>{{$xNOMPROV}}</option>
                                            @php
                                                endforeach;
                                            @endphp
                                        </select>
                                        <div class="invalid-feedback">Seleccione Provincia</div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" >Distrito</span>
                                        </div>
                                        <select class="form-control" name="cbo_dist_fam" id="cbo_dist_fam" style="color: #1e74a0;" required>
                                            <option value="">Seleccione</option>
                                            @php
                                                if($arrayDistrito) foreach ($arrayDistrito as $DataDistrito):
                                                    $xCODDIST = $DataDistrito->CODDIST;
                                                    $xNOMDIST = $DataDistrito->NMBUBIGEO;

                                                    $selected_Dist = ($CODDIST == $xCODDIST)? 'selected="selected"' : '';
                                            @endphp
                                                <option value="{{$xCODDIST}}" {{$selected_Dist}}>{{$xNOMDIST}}</option>
                                            @php
                                                endforeach;
                                            @endphp
                                        </select>
                                        <div class="invalid-feedback">Seleccione Distrito</div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <br>
                                <label><strong>Ubicación de la familia</strong></label>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Latitud</span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_latitud" name="txt_latitud" style="color: #1e74a0; background-color: #dbdbdb;" value="{{$LATITUD}}" required disabled="disabled">
                                        <div class="invalid-feedback">Ingrese Latitud</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" >Longitud</span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_longitud" name="txt_longitud" style="color: #1e74a0; background-color: #dbdbdb;" value="{{$LONGITUD}}" disabled="disabled" required>
                                    <div class="invalid-feedback">Ingrese Longitud</div>
                                  </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-12 mb-3">              
                                     <div id="map_canvas" style="width:100%; height:450px; overflow: auto; border-style: groove; border-color: #f4f4f4; border-radius: 5px;"> </div>                                       
                                </div>
                            </div>


                        </form>



<script type="text/javascript">

    $(document).ready(function(){
        IniciarMapa();
    });


    function IniciarMapa() {
    // Creating map object
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 16,
        center: new google.maps.LatLng({{$LATITUD}}, {{$LONGITUD}}),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // creates a draggable marker to the given coords
    var vMarker = new google.maps.Marker({
        position: new google.maps.LatLng({{$LATITUD}}, {{$LONGITUD}}),
        draggable: true
    });

    // adds a listener to the marker
    // gets the coords when drag event ends
    // then updates the input with the new coords
    google.maps.event.addListener(vMarker, 'dragend', function (evt) {
        $("#txt_latitud").val(evt.latLng.lat().toFixed(6));
        $("#txt_longitud").val(evt.latLng.lng().toFixed(6));

        map.panTo(evt.latLng);
    });

    // centers the map on markers coords
    map.setCenter(vMarker.position);

    // adds the marker on the map
    vMarker.setMap(map);
}
</script>