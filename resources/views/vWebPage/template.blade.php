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
<title>Municipalidad de Independencia - @yield('title')</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="/images/iconos/muni_independencia.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/css/animate.css">
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="/activos/pWebPage/shopwise_v1/assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
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

</head>

<body>

<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER -->

<!-- Home Popup Section -->
<div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-7">
                        <div class="popup_content text-left">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h3>Subscribe Newsletter and Get 25% Discount!</h3>
                                </div>
                                <p>Subscribe to the newsletter to receive updates about new products.</p>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <input name="email" required type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-fill-out btn-block text-uppercase" title="Subscribe" type="submit">Subscribe</button>
                                </div>
                            </form>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Don't show this popup again!</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="background_bg h-100" data-img-src="/activos/pWebPage/shopwise_v1/assets/images/popup_img3.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Screen Load Popup Section -->


<!-- START HEADER -->
@include('vWebPage.baseHeader')
<!-- END HEADER -->


<!-- START SECTION BANNER -->
@yield('contentBanner')
<!-- END SECTION BANNER -->


<!-- END MAIN CONTENT -->
<div class="main_content">

    @yield('contentPage')



</div>
<!-- END MAIN CONTENT -->


@include('sweetalert::alert')



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

<script src="js/jsWeb/js_vistarapida.js"></script>

</body>
</html>
