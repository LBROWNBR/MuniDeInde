@php
    //echo '<pre>';
    //print_r($wData);
    //echo '</pre>';

    $ObjMenu = $wData['DataMenu'];
    if($ObjMenu){
      $desc_menu  = $ObjMenu->DESC_MENU;
    }else{
      $desc_menu  = '';
    }

    $ObjSubMenu01 = $wData['DataSubMenuN1'];
    if($ObjSubMenu01){
        $id_SubMenuN1       = $ObjSubMenu01->ID_MENUSUB01;
        $desc_SubMenuN1     = $ObjSubMenu01->DESC_MENUSUB01;
        $icono_SubMenuN1    = $ObjSubMenu01->ICONO;
        $orden_SubMenuN1    = $ObjSubMenu01->ORDEN;
    }else{
        $id_SubMenuN1       = '';
        $desc_SubMenuN1     = '';
        $icono_SubMenuN1    = '<i class="fa fa-fw fa-list-alt"></i>';
        $orden_SubMenuN1    = '';
    }

@endphp

<form>

    <div class="row">

        <div class="col-md-12 col-lg-12">

            <input type="hidden" class="form-control" id="txhCodSubMenuN1" style="width: 60px;" value="{{$id_SubMenuN1}}" >

            <h3>Menú : "{{$desc_menu}}"</h3>
            <hr style="border-top: 2px solid #3c8dbc;">

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Nombre Sub Menú Nivel 1</label>
                        <input type="text" class="form-control" id="txtNombreSubMenuN1" value="{{$desc_SubMenuN1}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Icono (Código HTML)</label>
                        <input type="text" class="form-control" id="txtIconoSubMenuN1" value="{{$icono_SubMenuN1}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            @if($id_SubMenuN1!='')

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Orden</label>
                        <input type="text" class="form-control" id="txtOrdenSubMenuN1" value="{{$orden_SubMenuN1}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>

            @endif

        </div>
    </div>
</form>
