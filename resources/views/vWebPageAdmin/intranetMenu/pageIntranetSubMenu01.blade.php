@php

//echo '<pre>';
//print_r($wData);
//echo '</pre>';

$ObjMenu = $wData['DatoMenu'];
if($ObjMenu){
    $mID_MENU    = $ObjMenu->ID_MENU;
    $mDesc_menu  = $ObjMenu->DESC_MENU;
}else{
    $mID_MENU    = '';
    $mDesc_menu  = '';
}

@endphp




<!-- Row -->
<div class="row">


    <div class="col-md-12 col-lg-12">
        <div class="card">

            <div class="card-header">

                <div class="align-items-center mt-1">
                    <p class="font-weight-bold mb-0 fs-16">LISTA DE SUBMENU NIVEL 01</p>
                    <span>"{{$mDesc_menu}}"</span>
                </div>

                <div class="card-options">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" onclick="Form_SubMenu01('')">Nuevo SubMenú 01</button>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <input type="hidden" class="form-control" id="n1_txhCodMenu" style="width: 60px;" value="{{$mID_MENU}}" >

                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-nowrap tablaEstilo" id="Table_SubMenuN1">
                        <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 5%">Ícono</th>
                                <th style="width: 65%">Descripción SubMenú 01</th>
                                <th style="width: 5%">Orden</th>
                                <th style="width: 10%">Ver SubMenú 02</th>
                                <th style="width: 10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-12 col-lg-12"><br></div>
                    </div>
                </div>

                <!-- bd -->



            </div>
        </div>
    </div>

</div>
