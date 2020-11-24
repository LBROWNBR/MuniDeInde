@php
//echo '<pre>';
//print_r($wData);
//echo '</pre>';

$ObjSubMenuN1 = $wData['DataSubMenuN1'];
if($ObjSubMenuN1){
    $mDesc_SubMenuN1   = $ObjSubMenuN1->DESC_MENUSUB01;
}else{
    $mDesc_SubMenuN1   = '';
}

$ObjSubMenuN2 = $wData['DataSubMenuN2'];
if($ObjSubMenuN2){
    $id_SubMenuN2     = $ObjSubMenuN2->ID_MENUSUB02;
    $desc_SubMenuN2   = $ObjSubMenuN2->DESC_MENUSUB02;
    $link_SubMenuN2   = $ObjSubMenuN2->LINK_MENUSUB02;
    $icono_SubMenuN2  = $ObjSubMenuN2->ICONO;
    $orden_SubMenuN2  = $ObjSubMenuN2->ORDEN;
}else{
    $id_SubMenuN2     = '';
    $desc_SubMenuN2   = '';
    $link_SubMenuN2  = '';
    $icono_SubMenuN2  = '<i class="fa fa-circle-o"></i>';
    $orden_SubMenuN2  = '';
}

@endphp

<form>

    <div class="row">

        <div class="col-md-12 col-lg-12">

            <input type="hidden" class="form-control" id="txhCodSubMenuN2" style="width: 60px;" value="{{$id_SubMenuN2}}" >

            <h3>SubMenú 01 : "{{$mDesc_SubMenuN1}}"</h3>
            <hr style="border-top: 2px solid #3c8dbc;">

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Nombre Sub Menú Nivel 2</label>
                        <input type="text" class="form-control" id="txtNombreSubMenuN2" value="{{$desc_SubMenuN2}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Enlace SubMenú Nivel 2 (Ejemplo: /administrador/Principal_Inicio)</label>
                        <input type="text" class="form-control" id="txtEnlaceSubMenuN2" value="{{$link_SubMenuN2}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Icono (Código HTML)</label>
                        <input type="text" class="form-control" id="txtIconoSubMenuN2" value="{{$icono_SubMenuN2}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            @if($id_SubMenuN2!='')

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Orden</label>
                        <input type="text" class="form-control" id="txtOrdenSubMenuN2" value="{{$orden_SubMenuN2}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            @endif

        </div>
    </div>
</form>
