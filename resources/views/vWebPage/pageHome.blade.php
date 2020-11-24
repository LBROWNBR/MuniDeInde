@extends('vWebPage.template')

@section('title', 'Inicio')




@section('contentBanner')
    @include('vWebPage.baseBanner')
@endsection




@section('contentPage')







<!-- START SECTION SHOP -->
<div class="section small_pt small_pb">
    <div class="custom-container">
       
        <div class="row">
            <div class="col-xl-6 d-none d-xl-block">
                <div class="sale-banner">
                    <a class="hover_effect1" href="#">
                        <img src="/images/iconos/independencia1.jpg" alt="shop_banner_img10" style="border-style: groove; border-color: #f4f4f4; border-radius: 5px;">
                    </a>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-12">
                        <div class="">
                            <div style="text-align: center;">
                                <h3>HISTORIA</h3>
                            </div>

                            


                            <div style="border-style: groove; border-color: #f4f4f4; border-radius: 5px; padding: 10px;">

                                <p>Lima fue fundada el 18 de enero de 1535 por el
conquistador Francisco Pizarro. Estuvo considerada,
durante casi tres siglos, como la Capital Virreinal de
América del Sur. En 1821, pasó a ser capital del Perú
independiente; durante los primeros decenios de vida
republicana fue escenario de enfrentamientos políticos
entre distintos caudillos. Con el advenimiento del siglo XX,
Lima se modernizó y creció, intentando ponerse a tono
con las grandes capitales del mundo. En el 2002 el
departamento de Lima se dividió en Región Lima y Lima
Metropolitana, la capital del Perú. Sin embargo, si nos
remontamos a los 10 000 años A.C., Lima ya había sido
ocupada por grupos de cazadores y nómades que
recorrían los valles y costas del río Rímac en busca de
animales, mariscos y peces con los cuales alimentarse.
Hacia el siglo II D.C. la cultura Lima adquirió gran fuerza
en la zona.</p>
                                
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>


                        </div>
                    </div>
                </div>
            </div>
        </div>





    <div class="row">
        <div class="col-12"><br><br></div>
    </div>



      <div class="row">
        <div class="col-12">
            <div class="">
                <div style="text-align: center;">
                    <h3><u>INDEPENDENCIA</u></h3>
                </div>

                


                <div class="">
                        <img src="/images/iconos/mapaInde.jpg" alt="shop_banner_img10" style="border-style: groove; border-color: #f4f4f4; border-radius: 5px;">
                </div>

            </div>
        </div>
    </div>








    </div>
</div>
<!-- END SECTION SHOP -->











@endsection

