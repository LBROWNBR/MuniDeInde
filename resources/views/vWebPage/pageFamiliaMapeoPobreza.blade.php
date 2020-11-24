<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

<!-- SITE TITLE -->
<title>Municipalidad de Independencia - Mapeo de Familias Pobres</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="/images/iconos/muni_independencia.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/animate.css">
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/bootstrap/css/bootstrap.min.css">

<!-- Icon Font CSS -->
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/all.min.css">
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/ionicons.min.css">
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/themify-icons.css">
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/linearicons.css">
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/flaticon.css">
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/simple-line-icons.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/magnific-popup.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/slick.css">
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/style.css">
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/responsive.css">


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFMa4pd7uMEU0NRi7dHS7YVBcFQvKG5Ow&signed_in=true&callback=initMapeo"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?callback=initMapeo&key=AIzaSyBCKiIqCdZGrVxx06LSbe7uG3zXOq1Cz5k" async defer></script>-->
<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQe8zAswRPjwNhvDT32t0iJaO55US4Zo0&callback=initMapeo"></script>-->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCKiIqCdZGrVxx06LSbe7uG3zXOq1Cz5k&callback=initMapeo" async defer></script>-->


@php 

    $arrayDataRepresentanteFamilias = $wData['DataRepresentanteFamilias'];

    /*
        echo '<pre>';
        print_r($arrayDataRepresentanteFamilias);
        echo '</pre>';
    */

        $acumuladorData = '';

        if($arrayDataRepresentanteFamilias) foreach ($arrayDataRepresentanteFamilias as $DataRepresFamilia):
            $xID_REPRES = $DataRepresFamilia->ID_REPRES;
            $xNOM_FAMILIA = $DataRepresFamilia->NOM_FAMILIA;
            $xLATITUD = $DataRepresFamilia->LATITUD;
            $xLONGITUD = $DataRepresFamilia->LONGITUD;


            $acumuladorData = $acumuladorData.'{ID_REPRES: '.$xID_REPRES.', NOM_FAMILIA: "'.$xNOM_FAMILIA.'" , LATITUD: '.$xLATITUD.', LONGITUD: '.$xLONGITUD.'}, ';

        endforeach;


@endphp

<script type="text/javascript">


    function initMapeo() {

        var mapa;
        var marcador;
        var bounds = new google.maps.LatLngBounds();

        var centroMapa = new google.maps.LatLng(-11.655171, -77.146272); //LIMA-PERU

        var opcionesDeMapa = {
            zoom: 13,
            center: centroMapa,
            mapTypeId: google.maps.MapTypeId.ROADMAP //SATELITE, HYBRID, ROADMAP, TERRAIN
        };  

        mapa = new google.maps.Map(document.getElementById("map"), opcionesDeMapa);
        mapa.setTilt(50);

        var chinchetas = [            
            <?php echo $acumuladorData;?>            
        ];

        
        //var chinchetas = [
            //{ID_REPRES: "1", NOM_FAMILIA: "VELI RICSI", LATITUD:41.3887900, LONGITUD:2.1589900},
           // {ID_REPRES: "3", NOM_FAMILIA: "garcia manrique", LATITUD:42.268750, LONGITUD:2.957293}, 
            //{ID_REPRES: "4", NOM_FAMILIA: "FAMILIA MASTO", LATITUD:41.128584, LONGITUD:1.226946},
       // ];
        
        
        var infoWindow = new google.maps.InfoWindow(), chinchetas, i;

        
        for( var i = 0; i < chinchetas.length; i++){    

            var position = new google.maps.LatLng(chinchetas[i].LATITUD, chinchetas[i].LONGITUD);
            bounds.extend(position);

      
            marcador = new google.maps.Marker({
                position: position,
                map: mapa,
                title: 'FAMILIA: '+chinchetas[i].NOM_FAMILIA,
                animation: google.maps.Animation.DROP
            });  

            google.maps.event.addListener(marcador, 'click', (function(marcador, i) {
                return function() {
                    infoWindow.setContent('FAMILIA: '+ chinchetas[i].NOM_FAMILIA+' <br>'+'<strong><a href="#" onclick="MostrarDatosFamilia(\''+chinchetas[i].ID_REPRES+'\')" >Ver Datos</a></strong><br><strong><a href="http://maps.google.com/maps?z=12&t=m&q=loc:'+chinchetas[i].LATITUD+'+'+chinchetas[i].LONGITUD+'" target="_blank">Ver Google Maps</a></strong>');
                    infoWindow.open(map, marcador);
                }
            })(marcador, i));

            mapa.fitBounds(bounds);

        }
    }


/*
    function initMapeo() {

        var map;

        var markerData = [
            ["FIRST", "LAST", "ADDRESS", "PHONE", 39.6387797, -104.8007541],
            ["FIRST", "LAST", "ADDRESS", "PHONE", 39.6125868, -105.1377128],
            ["FIRST", "LAST", "ADDRESS", "PHONE", 30.6940368, -88.0945316]
        ];

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: new google.maps.LatLng(37.09024, -95.712891)
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < markerData.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(markerData[i][4], markerData[i][5]),
            map: map
          });
        }
    }
    */



    function MostrarDatosFamilia(x_codigo){
        $.ajax({
            url: "/verDatoFamilia",
            type: 'GET',
            data:{x_codigo: x_codigo},
            success:function (respuesta) {

                var JsonRpta = JSON.parse(respuesta);
                console.log(JsonRpta);


                $("#txt_nom_familia").val(JsonRpta.NOM_FAMILIA);
                $("#txt_tipDoc").val(JsonRpta.ABREV_TIPDOC);
                $("#txt_numdoc_familia").val(JsonRpta.NUMDOC_REPRES);
                $("#txt_parentesco").val(JsonRpta.DESC_TIPPARENT);
                $("#txt_nombre_Represent").val(JsonRpta.NOMBRE_REPRES);
                $("#txt_apepat_repres").val(JsonRpta.APEPAT_REPRES);
                $("#txt_apemat_repres").val(JsonRpta.APEMAT_REPRES);
                $("#txtgenero").val(JsonRpta.NOM_SEXO);
                $("#txt_fechaNac_repres").val(JsonRpta.FECNAC_REPRES);
                $("#txt_telfijo").val(JsonRpta.TEL_REPRES);
                $("#txt_celular").val(JsonRpta.CEL_REPRES);
                $("#txt_dir_repres").val(JsonRpta.DIR_REPRES);
                $("#txt_depa").val(JsonRpta.DEPARTAMENTO);
                $("#txt_prov").val(JsonRpta.PROVINCIA);
                $("#txt_dist").val(JsonRpta.DISTRITO);
               
            },
            error:function (msj) {
                console.log(msj);
            }
        });
    }

</script>

</head>

<body onload="initMapeo();">

<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER -->


<!-- START HEADER -->
@include('vWebPage.baseHeader')
<!-- END HEADER -->




<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>MAPEO DE FAMILIAS POBRES</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Mapero de Familias Pobres</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->




<!-- END MAIN CONTENT -->
<div class="main_content">

    <!-- STAT SECTION ABOUT -->
    <div style="padding: 0 0 20px 25px;">
        <div class="row">

                <div class="col-md-7">                                    

                    <div id="map" style="width:100%; height:800px; overflow: auto; border-style: groove; border-color: #f4f4f4; border-radius: 5px;"> </div>   


                </div>





                <div class="col-md-5">

            <div class="card">

                <div class="card-body">


                    <form action="" class="needs-validation formulario" method="post" novalidate>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">


                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" >Nombre de la Familia</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_nom_familia" name="txt_nom_familia" style="color: #1e74a0;" disabled="disabled" >                                        
                                        </div>
                                    </div>
                                </div>



                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" >Tipo Doc.</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_tipDoc" name="txt_tipDoc" style="color: #1e74a0;" disabled="disabled" >                                        
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6  mb-3">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Nro. Doc.</span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_numdoc_familia" name="txt_numdoc_familia" style="color: #1e74a0;" disabled="disabled" >                                                                            
                                      </div>
                                    </div>
                                </div>




                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-6  mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" >Parentesco</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_parentesco" name="txt_parentesco" style="color: #1e74a0;" disabled="disabled" >                                                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6  mb-3">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Nombre</span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_nombre_Represent" name="txt_nombre_Represent" style="color: #1e74a0;" disabled="disabled" >
                                      </div>
                                    </div>
                                </div>



                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-6  mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" >Ap. Paterno</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_apepat_repres" name="txt_apepat_repres" style="color: #1e74a0;" disabled="disabled" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6  mb-3">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Ap. Materno</span>
                                        </div>
                                        <input type="text" class="form-control" id="txt_apemat_repres" name="txt_apemat_repres" style="color: #1e74a0;" disabled="disabled" >
                                      </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-6  mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" >Sexo</span>
                                            </div>
                                            <input type="input-group-text" class="form-control" id="txtgenero" name="txtgenero" style="color: #1e74a0;" disabled="disabled" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6  mb-3">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" >Fecha Nac.</span>
                                        </div>
                                        <input type="date" class="form-control" id="txt_fechaNac_repres" name="txt_fechaNac_repres" style="color: #1e74a0;" disabled="disabled" >                                  </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-6  mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" >Teléfono</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_telfijo" name="txt_telfijo" style="color: #1e74a0;" disabled="disabled" >
                                        </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Celular</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_celular" name="txt_celular" style="color: #1e74a0;" disabled="disabled" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Dirección</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_dir_repres" name="txt_dir_repres" style="color: #1e74a0;" disabled="disabled" >
                                        </div>
                                    </div>
                                </div>



                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Departamento</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_depa" name="txt_depa" style="color: #1e74a0;" disabled="disabled" >
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Provincia</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_prov" name="txt_prov" style="color: #1e74a0;" disabled="disabled" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Distrito</span>
                                            </div>
                                            <input type="text" class="form-control" id="txt_dist" name="txt_dist" style="color: #1e74a0;" disabled="disabled" >
                                        </div>
                                    </div>
                                </div>

                            </form>


                </div>
            </div>
        </div>



        </div>
    </div>



</div>
<!-- END MAIN CONTENT -->




<!-- START FOOTER -->
@include('vWebPage.basePie')
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/jquery-1.12.4.min.js"></script>
<!-- popper min js -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="/activos/pWebPage/shopwise_v1/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- owl-carousel min js  -->
<script src="/activos/pWebPage/shopwise_v1/assets/owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup min js  -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/magnific-popup.min.js"></script>
<!-- waypoints min js  -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/waypoints.min.js"></script>
<!-- parallax js  -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/parallax.js"></script>
<!-- countdown js  -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/jquery.countdown.min.js"></script>
<!-- imagesloaded js -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js -->
<script src="/activos/pWebPage/shopwise_v1/assets/js/scripts.js"></script>

<!-- sweetalert js
<script src="/activos/pWebPage/shopwise_v1/assets/js/sweetalert.min.js"></script>
-->
<script src="/activos/pWebPage/shopwise_v1/assets/js/sweetalert2.js"></script>

<script src="/activos/pWebPage/shopwise_v1/assets/js/a04aa47ba2.js" crossorigin="anonymous"></script>


</body>
</html>









































