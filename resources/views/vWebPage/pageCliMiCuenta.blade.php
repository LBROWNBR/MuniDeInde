@extends('vWebPage.template')

@section('title', 'Regístrate')


@section('contentBanner')

@php
    //print_r(Auth::user());
    //print_r(Session::all());
    /*
    echo "<pre>";
    print_r(Session('SessDatoCliente'));
    echo "</pre>";
    */

    $Auth_SESS_ID_CLI           = Session('SessDatoCliente')['SESS_ID_CLI'];
    $Auth_SESS_NOMBRE_CLI       = Session('SessDatoCliente')['SESS_NOMBRE_CLI'];
    $Auth_SESS_APELLIDOS_CLI    = Session('SessDatoCliente')['SESS_APELLIDOS_CLI'];
    $Auth_SESS_USER_CLI         = Session('SessDatoCliente')['SESS_USER_CLI'];


    if($Auth_SESS_ID_CLI ==''){
        header('Location: /acceder');
        exit;
    }

@endphp

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-title">
                    <h1>BIENVENIDO {{$Auth_SESS_NOMBRE_CLI}} {{$Auth_SESS_APELLIDOS_CLI}} </h1>
                    <input type="hidden" id="TXH_USERCLI" value="{{$Auth_SESS_ID_CLI}}">
                </div>
            </div>
            <div class="col-md-4">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Página</a></li>
                    <li class="breadcrumb-item active">Mi Cuenta</li>
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
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Tablero</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Ordenes</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My Direcciones</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Detalles de la cuenta</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="ti-lock"></i>Cerrar sesión</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Tablero</h3>
                            </div>
                            <div class="card-body">
                                <p>
                                    Desde el tablero de su cuenta. puede verificar y ver fácilmente sus <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">pedidos recientes</a>, administrar sus direcciones de envío y <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">facturación</a> y <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">editar su contraseña y los detalles de su cuenta.</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Ordenes</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#1234</td>
                                                <td>March 15, 2020</td>
                                                <td>Processing</td>
                                                <td>$78.00 for 1 item</td>
                                                <td><a href="#" class="btn btn-fill-out btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>#2366</td>
                                                <td>June 20, 2020</td>
                                                <td>Completed</td>
                                                <td>$81.00 for 1 item</td>
                                                <td><a href="#" class="btn btn-fill-out btn-sm">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header">
                                        <h3>Dirección de Facturación</h3>
                                    </div>
                                    <div class="card-body">
                                        <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                        <p>New York</p>
                                        <a href="#" class="btn btn-fill-out">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Dirección de Envio</h3>
                                    </div>
                                    <div class="card-body">
                                        <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                        <p>New York</p>
                                        <a href="#" class="btn btn-fill-out">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Detalles de la cuenta</h3>
                            </div>
                            <div class="card-body">
                                <p>Already have an account? <a href="#">Log in instead!</a></p>
                                <form method="post" name="enq">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Primer nombre <span class="required">*</span></label>
                                            <input required="" class="form-control" name="name" type="text">
                                         </div>
                                         <div class="form-group col-md-6">
                                            <label>Apellidos<span class="required">*</span></label>
                                            <input required="" class="form-control" name="phone">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Nombre para mostrar <span class="required">*</span></label>
                                            <input required="" class="form-control" name="dname" type="text">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Dirección de correo electrónico <span class="required">*</span></label>
                                            <input required="" class="form-control" name="email" type="email">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Contraseña actual <span class="required">*</span></label>
                                            <input required="" class="form-control" name="password" type="password">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Nueva contraseña<span class="required">*</span></label>
                                            <input required="" class="form-control" name="npassword" type="password">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Confirmar contraseña <span class="required">*</span></label>
                                            <input required="" class="form-control" name="cpassword" type="password">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->


@endsection

