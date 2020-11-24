@php
//echo '<pre>';
//print_r($wData);
//echo '</pre>';

$ObjSubMenuN1 = $wData['DataSubMenuN1'];
if($ObjSubMenuN1){
    $id_menusub01    = $ObjSubMenuN1->ID_MENUSUB01;
    $desc_menusub01  = $ObjSubMenuN1->DESC_MENUSUB01;
}else{
    $id_menusub01    = '';
    $desc_menusub01  = '';
}

@endphp

<!-- Row -->
<div class="row">


    <div class="col-md-12 col-lg-12">
        <div class="card">

            <div class="card-header">

                <div class="align-items-center mt-1">
                    <p class="font-weight-bold mb-0 fs-16">LISTA DE SUBMENU NIVEL 02</p>
                    <span>"{{$desc_menusub01}}"</span>
                </div>

                <div class="card-options">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" onclick="Form_SubMenuN2('')">Nuevo SubMenú 02</button>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <input type="hidden" class="form-control" id="n2_txhCodSubMenuN1" style="width: 60px;" value="{{$id_menusub01}}" >

                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-nowrap tablaEstilo" id="Table_SubMenuN2">
                        <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 5%">Ícono</th>
                                <th style="width: 65%">Descripción SubMenú 02</th>
                                <th style="width: 10%">Enlace</th>
                                <th style="width: 5%">Orden</th>
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
