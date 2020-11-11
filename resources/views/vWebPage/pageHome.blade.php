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
            <div class="col-xl-3 d-none d-xl-block">
                <div class="sale-banner">
                    <a class="hover_effect1" href="#">
                        <img src="/activos/pWebPage/shopwise_v1/assets/images/shop_banner_img10.jpg" alt="shop_banner_img10">
                    </a>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Contenido</h4>
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
    </div>
</div>
<!-- END SECTION SHOP -->











@endsection

