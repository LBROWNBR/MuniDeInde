@extends('vWebPage.template')

@section('title', 'Mapeo Familias Pobres')


@section('contentBanner')

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

@endsection


@section('contentPage')


<!-- STAT SECTION ABOUT -->
<div style="padding: 0 0 20px 25px;">
    <div class="row">

            <div class="col-md-7">
                
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


 <script type="text/javascript">



    //(function(){
        //initMapeo();
        //google.maps.event.addDomListener(window, "load", initMapeo);        
//    })();

    
    /*
    function initMapeo() {

        var mapa;
        var marcador;
        var bounds = new google.maps.LatLngBounds();

        var centroMapa = new google.maps.LatLng(-11.655171, -77.146272); //LIMA-PERU

        var opcionesDeMapa = {
            zoom: 13,
            center: centroMapa,
            //center: {lat: 41.3887900, lng: 2.1589900},
            mapTypeId: google.maps.MapTypeId.ROADMAP //SATELITE, HYBRID, ROADMAP, TERRAIN
        };  

        mapa = new google.maps.Map(document.getElementById("map"), opcionesDeMapa);
        mapa.setTilt(50);

        var chinchetas = [            
            <?php //echo $acumuladorData;?>            
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
                    infoWindow.setContent('FAMILIA: '+ chinchetas[i].NOM_FAMILIA+' <br>'+'<strong><a href="#" onclick="MostrarDatosFamilia(\''+chinchetas[i].ID_REPRES+'\')" >Ver Datos</a></strong>');
                    infoWindow.open(map, marcador);
                }
            })(marcador, i));

            mapa.fitBounds(bounds);

        }
    }

    */


    var markerData = [
        ["FIRST", "LAST", "ADDRESS", "PHONE", 39.6387797, -104.8007541],
        ["FIRST", "LAST", "ADDRESS", "PHONE", 39.6125868, -105.1377128],
        ["FIRST", "LAST", "ADDRESS", "PHONE", 30.6940368, -88.0945316]
      ];

      var map;

      function initMapeo() {
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
@endsection

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFMa4pd7uMEU0NRi7dHS7YVBcFQvKG5Ow&signed_in=true&callback=initMapeo"></script>

<!--<script src="https://maps.googleapis.com/maps/api/js?callback=initMapeo&key=AIzaSyBCKiIqCdZGrVxx06LSbe7uG3zXOq1Cz5k" async defer></script>-->
<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQe8zAswRPjwNhvDT32t0iJaO55US4Zo0&callback=initMapeo"></script>-->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCKiIqCdZGrVxx06LSbe7uG3zXOq1Cz5k&callback=initMapeo" async defer></script>-->
