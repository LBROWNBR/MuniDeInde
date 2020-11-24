@php

//echo '<pre>';
//print_r($wData);
//echo '</pre>';

$ObjRol = $wData['DataRol'];
if($ObjRol){
    $id_rol     = $ObjRol->ID_ROL;
    $nom_rol    = $ObjRol->NOM_ROL;
}else{
    $id_rol     = '';
    $nom_rol    = '';
}

@endphp

<form>

    <div class="row">

        <div class="col-md-12 col-lg-12">

            <input type="hidden" class="form-control" id="txhCodRol" style="width: 60px;" value="{{$id_rol}}" >

            <div class="form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Nombre del Rol</label>
                        <input type="text" class="form-control" id="txtRol" value="{{$nom_rol}}" style="color: #1e74a0;">
                    </div>
                </div>
            </div>


        </div>
    </div>
</form>
