@php
    $objpControlUsuario = $wData['DataUsuario'];
    $objpControlPersonal = $wData['DataPersonal'];

    $objpControlRol = $wData['DataRol'];
    $objpMenus_x_Rol = $wData['DataMenu_x_Rol'];
    $objpSubMenus01_x_Rol = $wData['DataSubMenu01_x_Rol'];
    $objpSubMenus02_x_Rol = $wData['DataSubMenu02_x_Rol'];




    if($objpControlUsuario){
        $pControlCodUser = $objpControlUsuario->id;
        $pControlEmail = $objpControlUsuario->email;
    }else{
        $pControlCodUser = '';
        $pControlEmail = '';
    }

    if($objpControlPersonal){
        $pControlIdPersonal = $objpControlPersonal->ID_PERSONAL;
        $pControlNomCompleto = $objpControlPersonal->NOM_PERSONAL.' '.$objpControlPersonal->APEPAT_PERSONAL.' '.$objpControlPersonal->APEMAT_PERSONAL;
        $pControlNumDoc = $objpControlPersonal->NUM_DOC;
        $pControlNomFoto = $objpControlPersonal->NUM_DOC.'.jpg';
    }else{
        $pControlIdPersonal = '';
        $pControlNomCompleto = '';
        $pControlNumDoc = '';
        $pControlNomFoto = 'usuario.png';
    }

    //$RutaFotoPersonal = '/images/fotos/personal/'.$pControlNomFoto;
    $RutaFotoPersonal = '../images/logo/Usuario.png';    

    if($objpControlRol){
        $pControlIdRol = $objpControlRol->ID_ROL;
        $pControlNomRol = $objpControlRol->NOM_ROL;
    }else{
        $pControlIdRol = '';
        $pControlNomRol = '';
    }



@endphp
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
    <title>Admin - Municipalidad de Independencia</title>

    <!--Favicon -->
    <link rel="icon" href="../activos/pWebPageAdmin/assets/images/brand/favicon.ico" type="image/x-icon" />

    <!--Bootstrap css -->
    <link href="../activos/pWebPageAdmin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="../activos/pWebPageAdmin/assets/css/style.css" rel="stylesheet" />
    <link href="../activos/pWebPageAdmin/assets/css/dark.css" rel="stylesheet" />
    <link href="../activos/pWebPageAdmin/assets/css/skin-modes.css" rel="stylesheet" />

    <!-- Animate css -->
    <link href="../activos/pWebPageAdmin/assets/css/animated.css" rel="stylesheet" />

    <!--Sidemenu css -->
    <link href="../activos/pWebPageAdmin/assets/css/sidemenu.css" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="../activos/pWebPageAdmin/assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

    <!-- INTERNAL Prism Css -->
    <link href="../activos/pWebPageAdmin/assets/plugins/prism/prism.css" rel="stylesheet">

    <!---Icons css-->
    <link href="../activos/pWebPageAdmin/assets/css/icons.css" rel="stylesheet" />

    <!-- Simplebar css -->
    <link rel="stylesheet" href="../activos/pWebPageAdmin/assets/plugins/simplebar/css/simplebar.css">

    <!-- INTERNAL Select2 css -->
    <link href="../activos/pWebPageAdmin/assets/plugins/select2/select2.min.css" rel="stylesheet" />

    <!-- INTERNAL  Tabs css-->
    <link href="../activos/pWebPageAdmin/assets/plugins/tabs/style.css" rel="stylesheet" />

    <!-- Color Skin css -->
    <link id="theme" href="../activos/pWebPageAdmin/assets/colors/color1.css" rel="stylesheet" type="text/css" />

    <!-- Data table css -->
    <link href="../activos/pWebPageAdmin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../activos/pWebPageAdmin/assets/plugins/datatable/css/buttons.bootstrap4.min.css"  rel="stylesheet">
    <link href="../activos/pWebPageAdmin/assets/plugins/datatable/responsive.bootstrap4.min.css" rel="stylesheet" />

    <!-- CSS Estilo General -->
    <link href="../css/cssAdmin/cssAdminGeneral.css" rel="stylesheet" type="text/css" />

</head>

<body class="app sidebar-mini">


    <!---Global-loader-->
    <div id="global-loader">
        <img src="../activos/pWebPageAdmin/assets/images/svgs/loader.svg" alt="loader">
    </div>
    <!--- End Global-loader-->

    <!-- Page -->
    <div class="page">
        <div class="page-main">


            <!--aside open-->
            <aside class="app-sidebar">
                <div class="app-sidebar__logo">
                    <a class="header-brand" href="/administrador/AdminControl">
                        <img src="../activos/pWebPageAdmin/assets/images/brand/logo.png"
                            class="header-brand-img desktop-lgo" alt="Admintro logo">
                        <img src="../activos/pWebPageAdmin/assets/images/brand/logo1.png"
                            class="header-brand-img dark-logo" alt="Admintro logo">
                        <img src="../activos/pWebPageAdmin/assets/images/brand/favicon.png"
                            class="header-brand-img mobile-logo" alt="Admintro logo">
                        <img src="../activos/pWebPageAdmin/assets/images/brand/favicon1.png"
                            class="header-brand-img darkmobile-logo" alt="Admintro logo">
                    </a>
                </div>
                <div class="app-sidebar__user">
                    <div class="dropdown user-pro-body text-center">
                        <div class="user-pic">
                            <img src="{{ $RutaFotoPersonal }}" alt="user-img" class="avatar-xl rounded-circle mb-1">
                        </div>
                        <div class="user-info">
                            <h5 class=" mb-1">{{ $pControlNomCompleto }}</h5>
                            <span class="text-muted app-sidebar__user-name text-sm">{{ $pControlNomRol }}</span>

                            <input id="txhAdm_IdUser" type="hidden" value="{{ $pControlCodUser }}">
                            <input id="txhAdm_IdPers" type="hidden" value="{{ $pControlIdPersonal }}">
                            <input id="txhAdm_IdRol" type="hidden" value="{{ $pControlIdRol }}">

                        </div>
                    </div>
                </div>

                <ul class="side-menu app-sidebar3">
                    <li class="side-item side-item-category mt-4">Menú Principal</li>
                    <li class="slide">
                        <a class="side-menu__item" href="/administrador/AdminControl">
                            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                                viewBox="0 0 24 24" width="24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                                </svg>
                            <span class="side-menu__label">Dashboard</span><span
                                class="badge badge-danger side-badge">Nuevo</span>
                        </a>
                    </li>


                    @php


                        if($objpMenus_x_Rol) foreach ($objpMenus_x_Rol as $xMenuUser){
                          $us_ID_MENU  = $xMenuUser->ID_MENU;
                          $us_DESC_MENU  = $xMenuUser->DESC_MENU;
                          $us_ICONO  = $xMenuUser->ICONO;
                    @endphp
                        <li class="side-item side-item-category"><?php echo $us_ICONO;?>  {{$us_DESC_MENU}}</li>



                        @php
                            if($objpSubMenus01_x_Rol) foreach ($objpSubMenus01_x_Rol as $xSubMenu01User){
                              $SM01_ID_MENU         = $xSubMenu01User->ID_MENU;
                              $SM01_ID_MENUSUB01    = $xSubMenu01User->ID_MENUSUB01;
                              $SM01_DESC_MENUSUB01  = $xSubMenu01User->DESC_MENUSUB01;
                              $SM01_icono_menusub01  = $xSubMenu01User->icono_menusub01;

                        @endphp


                            @php
                                if($SM01_ID_MENU == $us_ID_MENU){
                            @endphp



                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                    <path d="M0 0h24v24H0V0z" fill="none"/>
                                    <path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/>
                                </svg>


                                <span class="side-menu__label">{{$SM01_DESC_MENUSUB01}}</span><i class="angle fa fa-angle-right"></i></a>


                                @php
                                    if($objpSubMenus02_x_Rol) foreach ($objpSubMenus02_x_Rol as $xSubMenu02User){
                                      $SM02_ID_MENUSUB01         = $xSubMenu02User->ID_MENUSUB01;
                                      $SM02_ID_MENUSUB02    = $xSubMenu02User->ID_MENUSUB02;
                                      $SM02_DESC_MENUSUB02  = $xSubMenu02User->DESC_MENUSUB02;
                                      $SM02_LINK_MENUSUB02  = $xSubMenu02User->LINK_MENUSUB02;
                                      $SM02_icono_menusub02  = $xSubMenu02User->icono_menusub02;
                                @endphp

                                    <ul class="slide-menu ">

                                    @php
                                        if($SM02_ID_MENUSUB01 == $SM01_ID_MENUSUB01){
                                    @endphp

                                        <li><a class="slide-item" href="#" onclick="DirectPage('{{$SM02_LINK_MENUSUB02}}')"> {{$SM02_DESC_MENUSUB02}}</a></li>

                                    @php
                                        }
                                    @endphp

                                    </ul>


                                @php
                                    }
                                @endphp




                            </li>

                            @php
                                }
                            @endphp




                        @php
                            }
                        @endphp




                    @php
                        }
                    @endphp


                </ul>

            </aside>
            <!--aside closed-->

            <!-- App-Content -->
            <div class="app-content main-content">
                <div class="side-app">

                    <!--app header-->
                    <div class="app-header header">
                        <div class="container-fluid">
                            <div class="d-flex">
                                <a class="header-brand" href="/administrador/AdminControl">
                                    <img src="../activos/pWebPageAdmin/assets/images/brand/logo.png"
                                        class="header-brand-img desktop-lgo" alt="Admintro logo">
                                    <img src="../activos/pWebPageAdmin/assets/images/brand/logo1.png"
                                        class="header-brand-img dark-logo" alt="Admintro logo">
                                    <img src="../activos/pWebPageAdmin/assets/images/brand/favicon.png"
                                        class="header-brand-img mobile-logo" alt="Admintro logo">
                                    <img src="../activos/pWebPageAdmin/assets/images/brand/favicon1.png"
                                        class="header-brand-img darkmobile-logo" alt="Admintro logo">
                                </a>
                                <div class="app-sidebar__toggle" data-toggle="sidebar">
                                    <a class="open-toggle" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-align-left header-icon mt-1">
                                            <line x1="17" y1="10" x2="3" y2="10"></line>
                                            <line x1="21" y1="6" x2="3" y2="6"></line>
                                            <line x1="21" y1="14" x2="3" y2="14"></line>
                                            <line x1="17" y1="18" x2="3" y2="18"></line>
                                        </svg>
                                    </a>
                                </div>

                                <!-- SEARCH -->
                                <div class="dropdown header-message">
                                    <a class="nav-link icon" href="/administrador/AdminControl">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9"/><path d="M9 22V12h6v10M2 10.6L12 2l10 8.6"/></svg>
                                    </a>
                                </div>

                                <div class="dropdown header-message">
                                    <a class="nav-link icon" href="/administrador/AdminControl" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 11.08V8l-6-6H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h6"/><path d="M14 3v5h5M18 21v-6M15 18h6"/></svg>
                                    </a>
                                </div>

                                <!-- SEARCH -->

                                <div class="d-flex order-lg-2 ml-auto">
                                    <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch">
                                        <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"
                                            height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                            focusable="false">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path
                                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                        </svg>
                                    </a>
                                    <div class="dropdown   header-fullscreen">
                                        <a class="nav-link icon full-screen-link p-0" id="fullscreen-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24"
                                                height="24" viewBox="0 0 24 24">
                                                <path
                                                    d="M10 4L8 4 8 8 4 8 4 10 10 10zM8 20L10 20 10 14 4 14 4 16 8 16zM20 14L14 14 14 20 16 20 16 16 20 16zM20 8L16 8 16 4 14 4 14 10 20 10z" />
                                                </svg>
                                        </a>
                                    </div>

                             
                                    <div class="dropdown profile-dropdown">
                                        <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                            <span>
                                                <img src="{{ $RutaFotoPersonal }}" alt="img"
                                                    class="avatar avatar-md brround">
                                            </span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                                            <div class="text-center">
                                                <a href="#" class="dropdown-item text-center user pb-0 font-weight-bold"
                                                    style="font-size: 14px; padding: 15px;">{{ $pControlNomCompleto }}</a>
                                                <span class="text-center user-semi-title">{{ $pControlNomRol }}</span>
                                                <div class="dropdown-divider"></div>
                                            </div>
                                            <a class="dropdown-item d-flex" href="#"
                                                onclick="DirectPage('\\administrador\\AdminMiPerfil\\{{ $pControlCodUser }}')">
                                                <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg"
                                                    height="24" viewBox="0 0 24 24" width="24">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z" />
                                                    </svg>
                                                <div class="">Mi Perfíl</div>
                                            </a>
                                            <a class="dropdown-item d-flex" href="/administrador/AdminCerrarSession">
                                                <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg"
                                                    enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24"
                                                    width="24">
                                                    <g>
                                                        <rect fill="none" height="24" width="24" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z" />
                                                    </g>
                                                </svg>
                                                <div class="">Cerrar Sesión</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/app header-->

                    <div id="div_contenido_body">
                        @include('vWebPageAdmin.intranet.pageAdminHome')
                    </div>

                </div>
            </div>
            <!-- End app-content-->
        </div>


        <!--Footer-->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © 2020 <a href="#">Administrador</a>. Diseñado por <a href="#">JPBSOLUTEC.COM</a> Todos
                        los derechos reservados.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer-->

    </div>
    <!-- End Page -->

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>

    <!-- Jquery js-->
    <script src="../activos/pWebPageAdmin/assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap4 js-->
    <script src="../activos/pWebPageAdmin/assets/plugins/bootstrap/popper.min.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--Othercharts js-->
    <script src="../activos/pWebPageAdmin/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

    <!-- Circle-progress js-->
    <script src="../activos/pWebPageAdmin/assets/js/circle-progress.min.js"></script>

    <!-- Jquery-rating js-->
    <script src="../activos/pWebPageAdmin/assets/plugins/rating/jquery.rating-stars.js"></script>

    <!--Sidemenu js-->
    <script src="../activos/pWebPageAdmin/assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- P-scroll js-->
    <script src="../activos/pWebPageAdmin/assets/plugins/p-scrollbar/p-scrollbar.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/p-scrollbar/p-scroll1.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/p-scrollbar/p-scroll.js"></script>

    <!--INTERNAL Peitychart js-->
    <script src="../activos/pWebPageAdmin/assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/peitychart/peitychart.init.js"></script>

    <!--INTERNAL Apexchart js-->
    <script src="../activos/pWebPageAdmin/assets/js/apexcharts.js"></script>

    <!--INTERNAL ECharts js-->
    <script src="../activos/pWebPageAdmin/assets/plugins/echarts/echarts.js"></script>

    <!--INTERNAL Chart js -->
    <script src="../activos/pWebPageAdmin/assets/plugins/chart/chart.bundle.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/chart/utils.js"></script>

    <!-- INTERNAL Select2 js -->
    <script src="../activos/pWebPageAdmin/assets/plugins/select2/select2.full.min.js"></script>
    <script src="../activos/pWebPageAdmin/assets/js/select2.js"></script>

    <!--INTERNAL Moment js-->
    <script src="../activos/pWebPageAdmin/assets/plugins/moment/moment.js"></script>

    <!--INTERNAL Index js-->
    <script src="../activos/pWebPageAdmin/assets/js/index1.js"></script>

    <!-- Simplebar JS -->
    <script src="../activos/pWebPageAdmin/assets/plugins/simplebar/js/simplebar.min.js"></script>

    <!-- Custom js-->
    <script src="../activos/pWebPageAdmin/assets/js/custom.js"></script>

    <!--- INTERNAL Tabs js-->
    <script src="../activos/pWebPageAdmin/assets/plugins/tabs/jquery.multipurpose_tabcontent.js"></script>
    <script src="../activos/pWebPageAdmin/assets/js/tabs.js"></script>

    <!-- INTERNAL Data tables -->
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/jquery.dataTables.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/pdfmake.min.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/vfs_fonts.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="../activos/pWebPageAdmin/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <!-- <script src="../activos/pWebPageAdmin/assets/plugins/datatable/dataTables.responsive.min.js"></script> -->
    <!-- <script src="../activos/pWebPageAdmin/assets/plugins/datatable/responsive.bootstrap4.min.js"></script> -->
    <script src="../activos/pWebPageAdmin/assets/js/datatables.js"></script>

    <script src="../activos/pWebPageAdmin/assets/js/sweetalert2.js"></script>

    <!-- Script pControl -->
    <script src="../js/jsAdmin/jsControl.js"></script>

</body>

</html>
