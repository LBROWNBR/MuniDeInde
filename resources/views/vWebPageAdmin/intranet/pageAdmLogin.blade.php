<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Admitro - Admin Panel HTML template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords"
        content="admin panel ui, user dashboard template, web application templates, premium admin templates, html css admin templates, premium admin templates, best admin template bootstrap 4, dark admin template, bootstrap 4 template admin, responsive admin template, bootstrap panel template, bootstrap simple dashboard, html web app template, bootstrap report template, modern admin template, nice admin template" />

    <!-- Title -->
    <title>Admistrador</title>

    <!--Favicon -->
    <link rel="icon" href="activos/pWebPageAdmin/assets/images/brand/favicon.ico" type="image/x-icon" />

    <!--Bootstrap css -->
    <link href="activos/pWebPageAdmin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="activos/pWebPageAdmin/assets/css/style.css" rel="stylesheet" />
    <link href="activos/pWebPageAdmin/assets/css/dark.css" rel="stylesheet" />
    <link href="activos/pWebPageAdmin/assets/css/skin-modes.css" rel="stylesheet" />

    <!-- Animate css -->
    <link href="activos/pWebPageAdmin/assets/css/animated.css" rel="stylesheet" />

    <!---Icons css-->
    <link href="activos/pWebPageAdmin/assets/css/icons.css" rel="stylesheet" />

    <!-- Color Skin css -->
    <link id="theme" href="activos/pWebPageAdmin/assets/colors/color1.css" rel="stylesheet" type="text/css" />

</head>

<body class="h-100vh bg-primary">




    <div class="page" style="background-color: #003387;">



        <div class="page-single">



            <div class="container">

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        @if (session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @if (Session::has('message-error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ Session::get('message-error') }}
                            </div>

                        @endif
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row">

                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">

                                        <form method="post" action="/administrador/AdminValidarLogin">

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="/images/logo/escudo_muni.png">

                                                </div>
                                            </div>
                                            <div class="text-center title-style mb-6">
                                                <br>
                                                <h1 class="mb-2" style="top: 115px">Acceso al Sistema</h1>
                                                <br>
                                            </div>
                                            <hr>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fe fe-user"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Correo"
                                                    name="txtCorreo" id="txtCorreo" style="color: #1e74a0;">
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fe fe-lock"></i>
                                                    </div>
                                                </div>
                                                <input type="password" class="form-control" placeholder="Contraseña"
                                                    name="txtClave" id="txtClave" style="color: #1e74a0;">
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block px-4">Acceder</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="text-center py-4 bg-light border">
        <a class="btn btn-primary" data-target="#modaldemo5" data-toggle="modal" href="">View Live Demo</a>
    </div>

    <div class="modal" id="modaldemo5">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fe fe-x-circle fs-100 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-danger">Error: Cannot process your entry!</h4>
                    <p class="mg-b-20 mg-x-20">There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered alteration.</p><button aria-label="Close" class="btn btn-danger pd-x-25"
                        data-dismiss="modal" type="button">Continue</button>
                </div>
            </div>
        </div>
    </div>





    <!-- Jquery js-->
    <script src="activos/pWebPageAdmin/assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap4 js-->
    <script src="activos/pWebPageAdmin/assets/plugins/bootstrap/popper.min.js"></script>
    <script src="activos/pWebPageAdmin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--Othercharts js-->
    <script src="activos/pWebPageAdmin/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

    <!-- Circle-progress js-->
    <script src="activos/pWebPageAdmin/assets/js/circle-progress.min.js"></script>

    <!-- Jquery-rating js-->
    <script src="activos/pWebPageAdmin/assets/plugins/rating/jquery.rating-stars.js"></script>

    <!-- Custom js-->
    <script src="activos/pWebPageAdmin/assets/js/custom.js"></script>

    <script src="js/jsAdmin/jsLogin.js"></script>

</body>

</html>
