@php
    //echo '<pre>';
    //print_r($wData);
    //echo '</pre>';
    $ObjMenu = $wData['DataMenu'];
    if($ObjMenu){
        $id_menu    = $ObjMenu->ID_MENU;
        $desc_menu  = $ObjMenu->DESC_MENU;
        $icono      = $ObjMenu->ICONO;
        $orden      = $ObjMenu->ORDEN;
    }else{
        $id_menu    = '';
        $desc_menu  = '';
        $icono      = '<i class="fa fa-fw fa-cubes"></i>';
        $orden      = '';
    }

@endphp

<form>

    <div class="row">

        <div class="col-md-12 col-lg-12">

            <input type="hidden" class="form-control" id="txhCodMenu" style="width: 60px;" value="{{$id_menu}}" >

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Nombre Menú</label>
                        <input type="text" class="form-control" id="txtNombre" value="{{$desc_menu}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Icono (Código HTML)</label>
                        <input type="text" class="form-control" id="txtIcono" value="{{$icono}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            @if($id_menu!='')

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Orden</label>
                        <input type="text" class="form-control" id="txtOrden" value="{{$orden}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            @endif

        </div>
    </div>
</form>
