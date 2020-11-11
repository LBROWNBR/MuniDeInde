@php

$ObjProducto     = $wData['DataDetProducto'];
$ObjFotosDet         = $wData['DataFotosDetProd'];


if($ObjProducto){
    $e_nom_prod       = $ObjProducto->name;
    $e_price          = $ObjProducto->price;
    $e_nombrecategoria = $ObjProducto->namecate;
    $e_nombremarca = $ObjProducto->nombre;
    $e_codigofabrica = $ObjProducto->tmp_codigo_fabricante;
    $e_desc_prod      = $ObjProducto->long_description;

}else{
    $e_nom_prod = '';
    $e_codigofabrica = '';
    $e_price = '';
    $e_desc_prod = '';
    $e_nombremarca = '';
    $e_nombrecategoria = '';
}
/*
echo "<pre>";
print_r($ObjProducto);
echo "</pre>";
*/


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
<div class="ajax_quick_view">
	<div class="row">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
          <div class="product-image">
                <div class="product_img_box">

                    <img id="product_img" src="{{$xruta_prod_small}}" data-zoom-image="/images/productos/00499501.jpg" alt="product_img1" />
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
                        <span class="price">S/.{{$e_price}}</span>
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
                            <li><i class="linearicons-shield-check"></i>1 Año de garantia por la marca</li>
                            <li><i class="linearicons-sync"></i>Politica de Devolucion hasta 30 dias</li>
                            <li><i class="linearicons-bag-dollar"></i>Delivery y envio a nivel Nacional</li>
                        </ul>
                    </div>


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
                        <button class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i>Añadir al Carrito</button>
                        <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                        <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                    </div>
                </div>
                <hr />
                <ul class="product-meta">
                    <li>Codigo Fabrica: <a href="#">{{$e_codigofabrica}}</a></li>
                    <li>Categoria: <a href="#">{{$e_nombrecategoria}}</a></li>
                    <li>Marca: <a href="#" rel="tag">{{$e_nombremarca}}</a></li>
                </ul>

                <div class="product_share">
                    <span>Share:</span>
                    <ul class="social_icons">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/activos/pWebPage/shopwise_v1/assets/js/scripts.js"></script>
