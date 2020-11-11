
@php

$ObjProducto     = $wData['DataDetProducto'];
$ObjFotosDet     = $wData['DataFotosDetProd'];

/*
echo "<pre>";
print_r($ObjFotosDet);
echo "</pre>";
*/

if($ObjProducto){



$e_cod_prod       = $ObjProducto->cod_product;

$e_nom_prod       = $ObjProducto->name;

$e_cantidadfoto       = $ObjProducto->num_foto;

$e_desc_prod      = $ObjProducto->long_description;

$e_nom_marca      = $ObjProducto->nombre;

$e_fabricante      = $ObjProducto->tmp_codigo_fabricante;

$e_nomcategoria  = $ObjProducto->namecate;

$e_stock          = $ObjProducto->stock;

$e_price          = $ObjProducto->price;

$e_descuentos     = $ObjProducto->descuentos;

}else{


    $e_cod_prod       = '';

$e_nom_prod       = '';

$e_fabricante     = '';

$e_cantidadfoto = 0;

$e_desc_prod      = '';

$e_nom_marca      = '';

$e_nomcategoria  = '';

$e_stock          = '';

$e_price          = '';

$e_descuentos     = '';



}



@endphp

@extends('vWebPage.template')

@section('title', 'Detalle del Producto')


@section('contentBanner')

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Detalle del Producto</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Página</a></li>
                    <li class="breadcrumb-item active">Detalle del Producto</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

@endsection


@section('contentPage')


<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="product-image">

                    <div class="product_img_box">
                    @php
                   
                         if($ObjFotosDet){

                        $xNOM_FOTO_SMALL  = $ObjFotosDet[0]->NOM_FOTO_SMALL;
                        $xNOM_FOTO_ZOOM  = $ObjFotosDet[0]->NOM_FOTO_ZOOM;

                         }else{
                            $xNOM_FOTO_SMALL  = 'img_nodisponible.jpg';
                            $xNOM_FOTO_ZOOM = 'img_nodisponible.jpg';
                         }

                        $xruta_prod_small = "/images/productos/small/".$xNOM_FOTO_SMALL;
                        $xruta_prod_Zoom = "/images/productos/zoom/".$xNOM_FOTO_ZOOM;

                    @endphp
                        <img id="product_img" src="{{$xruta_prod_Zoom}}" data-zoom-image=""  alt="product_img1" />

                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>

                    </div>


                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">

                @php
                    if($ObjFotosDet) foreach ($ObjFotosDet as $xFotos){

                        $yNOM_FOTO_SMALL  = $xFotos->NOM_FOTO_SMALL;
                        $yNOM_FOTO_ZOOM  = $xFotos->NOM_FOTO_ZOOM;

                        $yRuta_prod_small = "/images/productos/small/".$yNOM_FOTO_SMALL;
                        $yRuta_prod_Zoom = "/images/productos/zoom/".$yNOM_FOTO_ZOOM;

                @endphp
                        <div class="item">

                            <a href="#" class="product_gallery_item active" data-image="{{$yRuta_prod_Zoom}}" data-zoom-image="{{$yRuta_prod_Zoom}}">
                                <img src="{{$yRuta_prod_small}}" alt="product_small_img1" />
                            </a>

                        </div>
                @php
                }
                @endphp
                    </div>


                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><a href="#">{{$e_nom_prod}}</a></h4>
                        <div class="product_price">
                            <span class="price">S/. {{$e_price}}</span>
                            <del>$55.25</del>
                            <div class="on_sale">
                                <span>35% Off</span>
                            </div>
                        </div>
                        <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width:80%"></div>
                                </div>
                                <span class="rating_num">(21)</span>
                            </div>
                        <div class="pr_desc">
                            <p>{{$e_desc_prod}}</p>
                        </div>
                        <div class="product_sort_info">
                            <ul>
                                <li><i class="linearicons-shield-check"></i> 1 Año de garantia Fabrica</li>
                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                            </ul>
                        </div>
                        <div class="pr_switch_wrap">
                            <span class="switch_lable">Color</span>
                            <div class="product_color_switch">
                                <span class="active" data-color="#87554B"></span>
                                <span data-color="#333333"></span>
                                <span data-color="#DA323F"></span>
                            </div>
                        </div>
                        <!--<div class="pr_switch_wrap">
                            <span class="switch_lable">Size</span>
                            <div class="product_size_switch">
                                <span>xs</span>
                                <span>s</span>
                                <span>m</span>
                                <span>l</span>
                                <span>xl</span>
                            </div>
                        </div>-->
                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus">
                            </div>
                        </div>
                        <div class="cart_btn">
                            <button class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Añadir al Carrito</button>
                            <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                            <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                        </div>
                    </div>
                    <hr />
                    <ul class="product-meta">
                        <li>Codigo Fabrica: <a href="#">{{$e_fabricante}}</a></li>
                        <li>Categoria: <a href="#"></a>{{$e_nomcategoria}}</li>
                        <li>Marca: <a href="#" rel="tag">{{$e_nom_marca}}</a></li>
                    </ul>

                    <div class="product_share">
                        <span>Redes Sociales:</span>
                        <ul class="social_icons">
                            <li><a href="https://www.facebook.com/RYMPORTATILES2018" target="_blank"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/rymportatiles/?hl=es-la" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-style3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Descripcion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Caracteristicas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Comentarios</a>
                        </li>
                    </ul>
                    <div class="tab-content shop_info_tab">
                        <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                        </div>
                        <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                            <table class="table table-bordered">
                            @php
                        $arrayListaCaracteristicas = $wData['DataCaracteristica'];

    if($arrayListaCaracteristicas) foreach ($arrayListaCaracteristicas as $Datcaracteristicas):
        $cabecerauno = $Datcaracteristicas->cabecera;
        $descriociondos = $Datcaracteristicas->detalle;
                        @endphp
                                <tr>
                                    <td><strong>{{$cabecerauno}}</strong></td>
                                    <td>{{$descriociondos}}</td>
                                </tr>
                                @php
    endforeach;
@endphp

                            </table>
                        </div>
                        <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                            <div class="comments">

                                <ul class="list_none comment_list mt-4">
                                @php
                        $arrayListaComentarios = $wData['DataComentario'];

    if($arrayListaComentarios) foreach ($arrayListaComentarios as $Datacomenprod):
        $COMENTARIOPRODUCTO = $Datacomenprod->COMENTARIO;
       $NOMBREPERSONA = $Datacomenprod->NOMBRECOMENTO;
       $FECHACOMEN = $Datacomenprod->FECHA;
                        @endphp
                                    <li>
                                        <div class="comment_img">
                                            <img src="/activos/pWebPage/shopwise_v1/assets/images/user1.jpg" alt="user1"/>
                                        </div>
                                        <div class="comment_block">
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                            </div>
                                            <p class="customer_meta">
                                                <span class="review_author">{{$NOMBREPERSONA}}</span>
                                                <span class="comment-date">{{$FECHACOMEN}}</span>
                                            </p>
                                            <div class="description">
                                                <p>{{$COMENTARIOPRODUCTO}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @php
    endforeach;
@endphp
                                </ul>
                            </div>
                            <div class="review_form field_form">
                                <h5>Agregar Comentario</h5>
                                <form class="row mt-3">
                                    <div class="form-group col-12">
                                        <div class="star_rating">
                                            <span data-value="1"><i class="far fa-star"></i></span>
                                            <span data-value="2"><i class="far fa-star"></i></span>
                                            <span data-value="3"><i class="far fa-star"></i></span>
                                            <span data-value="4"><i class="far fa-star"></i></span>
                                            <span data-value="5"><i class="far fa-star"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <textarea required="required" placeholder="Ingresar Comentario *" class="form-control" name="message" rows="4"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input required="required" placeholder="Nombre persona*" class="form-control" name="name" type="text">
                                     </div>
                                    <div class="form-group col-md-6">
                                        <input required="required" placeholder="Correo Comenta*" class="form-control" name="email" type="email">
                                    </div>

                                    <div class="form-group col-12">
                                        <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Enviar Comentario</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="small_divider"></div>
                <div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="heading_s1">
                    <h3>Productos Relacionados</h3>
                </div>
                <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                @php
                        $arrayListaProductosRelacion = $wData['DataProductoRelacion'];

    if($arrayListaProductosRelacion) foreach ($arrayListaProductosRelacion as $Dataproductorelacion):

            $nameproducto = $Dataproductorelacion->name;
           $precioproductore = $Dataproductorelacion->price;
            //$FECHACOMEN = $Dataproductorelacion->FECHA;

                        @endphp
                    <div class="item">
                        <div class="product">
                            <div class="product_img">
                                <a href="shop-product-detail.html">
                                    <img src="/activos/pWebPage/shopwise_v1/assets/images/product_img1.jpg" alt="product_img1">
                                </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Añadir al Carrito</a></li>
                                        <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="shop-product-detail.html">{{$nameproducto}}</a></h6>
                                <div class="product_price">
                                    <span class="price">S/.{{$precioproductore}}</span>
                                    <del>$55.25</del>
                                    <div class="on_sale">
                                        <span>35% Off</span>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                </div>
                                <div class="pr_switch_wrap">
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
    endforeach;
@endphp
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

@endsection

