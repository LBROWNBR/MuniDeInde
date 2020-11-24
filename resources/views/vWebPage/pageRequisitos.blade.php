@extends('vWebPage.template')

@section('title', 'Nosotros')


@section('contentBanner')

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>REQUISITOS PARA INSCRIBIRSE</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Requisitos</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

@endsection


@section('contentPage')


<!-- STAT SECTION ABOUT -->
<div class="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about_img scene mb-4 mb-lg-0">
                    <img src="/images/iconos/quedateencasa.jpg" alt="about_img"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="heading_s1">
                    <h6>Consultas de la Gestión de Registro de las Familia con Pobreza</h6>
                </div>
                <p>Para estar en la Gestión de Registro de las familias con pobreza, debes cumplir los siguiente criterios:</p>


                <div style="padding: 0 0 0 25PX;">
                    <ul>
                      <li>Que ningún integrante del hogar se encuentre
                    registrado en ninguna planilla del sector
                    público o privado, excepto pensionistas y
                    modalidad formativa<br><br></li>


                      <li>Que ningún integrante del hogar tenga un
                    ingreso superior a 3.000 soles mensuales, de
                    acuerdo con la información disponible en la
                    Superintendencia de Banca, Seguros y AFP
                    (SBS) y de la Superintendencia Nacional de
                    Aduanas y de Administración Tributaria (Sunat)</li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END SECTION ABOUT -->



<!-- START SECTION WHY CHOOSE -->
<div class="section bg_light_blue2 pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="heading_s1 text-center">
                    <h2>Requisitos:</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-6">
                <div class="icon_box icon_box_style4 box_shadow1">
                    <div class="icon">
                        <i class="ti-layers"></i>
                    </div>
                    <div class="icon_box_content">
                        <h5>1.- Pertenecer al distrito de Independencia</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="icon_box icon_box_style4 box_shadow1">
                    <div class="icon">
                        <i class="ti-layers"></i>
                    </div>
                    <div class="icon_box_content">
                        <h5>2.- Documento Nacional de Identidad - DNI</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION WHY CHOOSE -->



@endsection
