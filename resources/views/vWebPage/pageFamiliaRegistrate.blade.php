@extends('vWebPage.template')

@section('title', 'Regístrate')


@section('contentBanner')
@endsection


@php

    $arrayTipoDocumento = $wData['DataTipoDocumento'];
    $arrayTipoGenero = $wData['DataTipoGenero'];
    $arrayDepartamento = $wData['DataDepartamento'];
    $arrayParentesco = $wData['DataParentesco'];

@endphp


@section('contentPage')


<!-- START LOGIN SECTION -->
<div class="login_register_wrap section" style="padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11 col-md-11">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 text-center">
                            <h2>REGISTRO DE FAMILIA</h2>
                            <hr>
                        </div>


                        <form action="" class="needs-validation formulario" method="post" novalidate>

                            <input type="hidden" name="txh_codrepres" id="txh_codrepres" value="">
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
                                        <input type="text" class="form-control" id="txt_nom_familia" name="txt_nom_familia" placeholder="Nombre de la Familia" pattern="[A-Za-z-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]{2,200}" maxlength="200" required>
                                        <div class="invalid-feedback">Ingrese Nombre de la Familia</div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" ><i class="far fa-id-badge"></i></span>
                                        </div>
                                        <select class="form-control" name="cbotipdoc_familia" id="cbotipdoc_familia" required>
                                            <option value="" selected>Tipo Documento</option>
                                            @php
                                                if($arrayTipoDocumento) foreach ($arrayTipoDocumento as $DataTipDoc):
                                                    $xCODTIPDOC = $DataTipDoc->ID_TIPDOC;
                                                    $xNOMTIPDOC = $DataTipDoc->ABREV_TIPDOC;
                                            @endphp
                                                <option value="{{$xCODTIPDOC}}">{{$xNOMTIPDOC}}</option>
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
                                      <span class="input-group-text" ><i class="fab fa-elementor"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_numdoc_familia" name="txt_numdoc_familia" placeholder="Nro. Documento" pattern="[A-Za-z0-9-ÿ\u00f1\u00d1]{1,50}" required>
                                    <div class="invalid-feedback">Ingrese Nro. de Documento</div>
                                  </div>
                                </div>
                            </div>




                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" ><i class="far fa-id-badge"></i></span>
                                        </div>
                                        <select class="form-control" name="cboparentesco" id="cboparentesco" required>
                                            <option value="" selected>Parentesco</option>
                                            @php
                                                if($arrayParentesco) foreach ($arrayParentesco as $DataParent):
                                                    $xCOD_TIPPARENT = $DataParent->COD_TIPPARENT;
                                                    $xDESC_TIPPARENT = $DataParent->DESC_TIPPARENT;
                                            @endphp
                                                <option value="{{$xCOD_TIPPARENT}}">{{$xDESC_TIPPARENT}}</option>
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
                                      <span class="input-group-text" ><i class="far fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_nombre_Represent" name="txt_nombre_Represent" placeholder="Nombre del Representante" pattern="[A-Za-z0-9-ÿ\u00f1\u00d1]{1,100}" required>
                                    <div class="invalid-feedback">Ingrese Nombre del Representante</div>
                                  </div>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" ><i class="far fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_apepat_repres" name="txt_apepat_repres" placeholder="Apellido Paterno" pattern="[A-Za-z-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]{2,200}" maxlength="200" required>
                                        <div class="invalid-feedback">Ingrese Apellido Paterno del Representante</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" ><i class="far fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_apemat_repres" name="txt_apemat_repres" placeholder="Apellido Materno" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" maxlength="200" required>
                                    <div class="invalid-feedback">Ingrese Apellido Materno del Representante</div>
                                  </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" ><i class="fas fa-venus-mars"></i></span>
                                        </div>
                                        <select class="form-control" name="cbogenero_repres" id="cbogenero_repres" required>
                                            <option value="">Genero</option>
                                            @php
                                                if($arrayTipoGenero) foreach ($arrayTipoGenero as $DataTipGenero):
                                                    $xCODSEXO = $DataTipGenero->ID_SEXO;
                                                    $xNOMSEXO = $DataTipGenero->NOM_SEXO;
                                            @endphp
                                                <option value="{{$xCODSEXO}}">{{$xNOMSEXO}}</option>
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
                                      <span class="input-group-text" ><i class="fas fa-birthday-cake"></i></span>
                                    </div>
                                    <input type="date" class="form-control" id="txt_fechaNac_repres" name="txt_fechaNac_repres" placeholder="Fecha Nacimiento" pattern="([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})" required>
                                    <div class="invalid-feedback">Ingrese Fecha de Nacimiento</div>
                                  </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fas fa-phone-square"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_telfijo" name="txt_telfijo" placeholder="Teléfono" pattern="[0-9+ ]{6,20}" >
                                    </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_celular" name="txt_celular" placeholder="Celular" pattern="[0-9+ ]{9,20}" required>
                                        <div class="invalid-feedback">Ingrese Nro. Celular</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="fas fa-map-marked-alt"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_dir_repres" name="txt_dir_repres" placeholder="Dirección de la Familia" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" required>
                                        <div class="invalid-feedback">Ingrese Dirección</div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fas fa-bars"></i></span>
                                        </div>
                                        <select class="form-control" name="cbo_depa_fam" id="cbo_depa_fam" onchange="MostrarProvincia()" required>
                                                <option value="" selected>Departamento</option>
                                            @php
                                                if($arrayDepartamento) foreach ($arrayDepartamento as $DataDepa):
                                                    $xCODDEP = $DataDepa->CODDEP;
                                                    $xNOMDEP = $DataDepa->NMBUBIGEO;
                                            @endphp
                                                <option value="{{$xCODDEP}}">{{$xNOMDEP}}</option>
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
                                            <span class="input-group-text" ><i class="fas fa-bars"></i></span>
                                        </div>
                                        <select class="form-control" name="cbo_prov_fam" id="cbo_prov_fam" onchange="MostrarDistrito()" required>
                                            <option value="">Provincia</option>
                                        </select>
                                        <div class="invalid-feedback">Seleccione Provincia</div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" ><i class="fas fa-bars"></i></span>
                                        </div>
                                        <select class="form-control" name="cbo_dist_fam" id="cbo_dist_fam" required>
                                            <option value="">Distrito</option>
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
                                        <input type="text" class="form-control" id="txt_latitud" name="txt_latitud" style="color: #1e74a0; background-color: #dbdbdb;" readonly="readonly" value="-11.986844" required>
                                        <div class="invalid-feedback">Ingrese Latitud</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" >Longitud</span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_longitud" name="txt_longitud" style="color: #1e74a0; background-color: #dbdbdb;"  readonly="readonly" value="-77.103421" required>
                                    <div class="invalid-feedback">Ingrese Longitud</div>
                                  </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-12 mb-3">              
                                     <div id="map_canvas" style="width:100%; height:450px; overflow: auto; border-style: groove; border-color: #f4f4f4; border-radius: 5px;"> </div>                                       
                                </div>
                            </div>



                            <div class="form-group">
                                <br><br>
                                <button type="submit" class="btn btn-fill-out btn-block" name="signup">Registrar Familia</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->




<div class="modal fade" id="ModalForm_Familia" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 99%">
        <div class="modal-content">
            <div class="modal-header" style="background: #3F5367;">
                <h5 class="modal-title" id="ModalForm_Familia" style="color: #FFFFFF;">REGISTRO DE INTEGRANTE DE LA FAMILIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body" style="background: #ffffff;">
                <div id="ModalBody_Familia"></div>
            </div>
            <div class="modal-footer" style="background: #E8E8E8;">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="btn_Registrar_Producto">Registrar</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM_X4-4iiGr56sg-V7nlu0LcV6gv6kqoI&callback=initMap"></script>
<script src="/js/jsWeb/js_webpageRegFamilia.js"></script>
@endsection