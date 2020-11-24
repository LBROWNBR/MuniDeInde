<script src="../js/jsAdmin/jsAdminMapeoFamilia.js"></script>
<style>
    .swal2-container{ z-index: 10000;}
</style>

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Mapeo de Familias</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Página</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Mapeo de Familias</a></li>
        </ol>
    </div>
    <div class="page-rightheader">
        <div class="btn btn-list">
        </div>
    </div>
</div>
<!--End Page header-->



<!-- Row -->
<div class="row">

    <div class="col-md-7">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">MAPEO DE FAMILIAS POBRES</h3>
            </div>

            <div class="card-body">

@php 

$arrayDataRepresentanteFamilias = $wData['DataRepresentanteFamilias'];

    /*
    echo '<pre>';
    print_r($arrayDataRepresentanteFamilias);
    echo '</pre>';
    */

    $acumulador = '';

    if($arrayDataRepresentanteFamilias) foreach ($arrayDataRepresentanteFamilias as $DataRepresFamilia):
        $xID_REPRES = $DataRepresFamilia->ID_REPRES;
        $xNOM_FAMILIA = $DataRepresFamilia->NOM_FAMILIA;
        $xLATITUD = $DataRepresFamilia->LATITUD;
        $xLONGITUD = $DataRepresFamilia->LONGITUD;


        $acumulador = $acumulador.'{ID_REPRES: '.$xID_REPRES.', NOM_FAMILIA: "'.$xNOM_FAMILIA.'" , LATITUD: '.$xLATITUD.', LONGITUD: '.$xLONGITUD.'}, ';

    endforeach;

@endphp
            

                    <div id="map" style="width:100%; height:450px; overflow: auto; border-style: groove; border-color: #f4f4f4; border-radius: 5px;"> </div>   


            </div>
        </div>
    </div>



    <div class="col-md-5">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">DATOS DE LA FAMILIA</h3>
            </div>

            <div class="card-body">


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


            </div>
        </div>
    </div>

</div>


        
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCKiIqCdZGrVxx06LSbe7uG3zXOq1Cz5k&callback=initMap" async defer></script>


    <script type="text/javascript">
    
    function initMap() {

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
            
            <?php echo $acumulador;?>
            
        ];

        /*
        var chinchetas = [
            {ID_REPRES: "1", NOM_FAMILIA: "VELI RICSI", LATITUD:41.3887900, LONGITUD:2.1589900},
            {ID_REPRES: "3", NOM_FAMILIA: "garcia manrique", LATITUD:42.268750, LONGITUD:2.957293}, 
            {ID_REPRES: "4", NOM_FAMILIA: "FAMILIA MASTO", LATITUD:41.128584, LONGITUD:1.226946},
        ];
        */
        
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
    
    google.maps.event.addDomListener(window, "load", initMap);



    </script>



    