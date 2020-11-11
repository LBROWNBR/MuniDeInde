@extends('vWebPage.template')

@section('title', 'Iniciar sesión')

@section('contentBanner')
@endsection

@section('contentPage')


<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1 text-center">
                            <h3>Iniciar sesión</h3>
                        </div>

                        <form action="" class="needs-validation formulario" method="post" novalidate>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                            <div class="form-group">
                                <input type="text" class="form-control" name="txt_UserCliente" id="txt_UserCliente" placeholder="Tu correo electrónico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                                <div class="invalid-feedback">Tu correo electrónico</div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="txt_PasswdCliente" id="txt_PasswdCliente" placeholder="Contraseña" pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" required>
                                <div class="invalid-feedback">Tu Contraseña</div>
                            </div>
                            <div class="login_footer form-group">
                                <a href="#">¿Olvide la contraseña?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login"> Iniciar sesión</button>
                            </div>
                        </form>

                        <div class="form-note text-center">¿No tienes una cuenta?<a href="/registrate"> Regístrate ahora</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->


<script src="/js/jsWeb/js_webpageCliLogin.js"></script>


@endsection

