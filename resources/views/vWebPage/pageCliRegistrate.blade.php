@extends('vWebPage.template')

@section('title', 'Regístrate')


@section('contentBanner')
@endsection


@php

    $arrayTipoDocumento = $wData['DataTipoDocumento'];
    $arrayTipoGenero = $wData['DataTipoGenero'];
    $arrayDepartamento = $wData['DataDepartamento'];

@endphp


@section('contentPage')


<!-- START LOGIN SECTION -->
<div class="login_register_wrap section" style="padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 text-center">
                            <h2>Registrate</h2>
                            <hr>
                        </div>


                        <form action="" class="needs-validation formulario" method="post" novalidate>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" ><i class="far fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_nom_cli" name="txt_nom_cli" placeholder="Nombres" pattern="[A-Za-z-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]{2,200}" maxlength="200" required>
                                        <div class="invalid-feedback">Ingrese Nombre del Cliente</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" ><i class="far fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_ape_cli" name="txt_ape_cli" placeholder="Apellidos" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" maxlength="200" required>
                                    <div class="invalid-feedback">Ingrese Apellidos del Cliente</div>
                                  </div>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" ><i class="far fa-id-badge"></i></span>
                                        </div>
                                        <select class="form-control" name="cbotipdoc_cli" id="cbotipdoc_cli" required>
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
                                    <input type="text" class="form-control" id="txt_numdoc_cli" name="txt_numdoc_cli" placeholder="Nro. Documento" pattern="[A-Za-z0-9-ÿ\u00f1\u00d1]{1,50}" required>
                                    <div class="invalid-feedback">Ingrese Nro. de Documento</div>
                                  </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" ><i class="fas fa-venus-mars"></i></span>
                                        </div>
                                        <select class="form-control" name="cbogenero_cli" id="cbogenero_cli" required>
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
                                    <input type="text" class="form-control" id="txt_fechacumple" name="txt_fechacumple" placeholder="Fecha Cumpleaños" pattern="([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})" required>
                                    <div class="invalid-feedback">Ingrese Fecha de Cumpleaños</div>
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
                                        <input type="text" class="form-control" id="txt_celcli" name="txt_celcli" placeholder="Celular" pattern="[0-9+ ]{9,20}" required>
                                        <div class="invalid-feedback">Ingrese Nro. Celular</div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="far fa-envelope"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_correocli" name="txt_correocli" placeholder="Correo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                                        <div class="invalid-feedback">Ingrese Correo Electrónico</div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label><strong>Dirección del Cliente</strong></label>
                            </div>


                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" ><i class="fas fa-map-marked-alt"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_dircli" name="txt_dircli" placeholder="Dirección" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" required>
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
                                        <select class="form-control" name="cbo_depacli" id="cbo_depacli" onchange="MostrarProvincia()" required>
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
                                        <select class="form-control" name="cbo_provcli" id="cbo_provcli" onchange="MostrarDistrito()" required>
                                            <option value="">Provincia</option>
                                            <option value="1">Lima</option>
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
                                        <select class="form-control" name="cbo_distcli" id="cbo_distcli" required>
                                            <option value="">Distrito</option>
                                            <option value="1">Lima</option>
                                        </select>
                                        <div class="invalid-feedback">Seleccione Distrito</div>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <label><strong>Datos del Usuario</strong></label>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" ><i class="far fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_usuario_cli" name="txt_usuario_cli" placeholder="Ingrese Tu Correo Electrónico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                                    <div class="invalid-feedback">Ingrese Tu Correo Electrónico</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" ><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="txt_clave_cli" name="txt_clave_cli" placeholder="Contraseña" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" required>
                                    <div class="invalid-feedback">Ingrese Contraseña</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="signup">Registrarse</button>
                            </div>
                        </form>
                        <div class="form-note text-center">¿Ya tienes una cuenta? <a href="/acceder"> Iniciar sesión</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->





<script src="/js/jsWeb/js_webpageCliente.js"></script>


@endsection



