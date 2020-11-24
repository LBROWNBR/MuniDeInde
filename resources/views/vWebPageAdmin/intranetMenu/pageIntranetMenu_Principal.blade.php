<script src="../js/jsAdmin/jsAdminMenu.js"></script>

<style>
    .swal2-container{ z-index: 10000;}
</style>

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Registro de Menús</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Página</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Registro de Menús</a></li>
        </ol>
    </div>
    <div class="page-rightheader">
        <div class="btn btn-list">
        </div>
    </div>
</div>
<!--End Page header-->



<!-- Row -->
<div class="row">


    <div class="col-md-12 col-lg-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">LISTA DE MENÚ</h3>
                <div class="card-options">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" onclick="Form_Menu('')">Nuevo Menú</button>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">


                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-nowrap tablaEstilo" id="Table_Menu">
                        <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 5%">Ícono</th>
                                <th style="width: 65%">Descripción Menú</th>
                                <th style="width: 5%">Orden</th>
                                <th style="width: 10%">Ver SubMenu 01</th>
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


<div class="row">
    <div class="col-md-6 col-sm-12"><div id="Div_Area_SubMenuNivel01"></div></div>
    <div class="col-md-6 col-sm-12"><div id="Div_Area_SubMenuNivel02"></div></div>
</div>


<div class="modal fade" id="ModalForm_Menu" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #3F5367;">
                <h5 class="modal-title" id="ModalForm_Menu" style="color: #FFFFFF;">REGISTRO DE MENÚ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="background: #ffffff;">
                <div id="ModalBody_Menu"></div>
            </div>
            <div class="modal-footer" style="background: #E8E8E8;">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="btn_Registrar_Menu">Registrar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ModalForm_SubMenuN1" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #3F5367;">
                <h5 class="modal-title" id="ModalForm_SubMenuN1" style="color: #FFFFFF;">REGISTRO DE SUBMENÚ 01</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="background: #ffffff;">
                <div id="ModalBody_SubMenuN1"></div>
            </div>
            <div class="modal-footer" style="background: #E8E8E8;">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="btn_Registrar_SubMenu01">Registrar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ModalForm_SubMenuN2" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #3F5367;">
                <h5 class="modal-title" id="ModalForm_SubMenuN2" style="color: #FFFFFF;">REGISTRO DE SUBMENÚ 02</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="background: #ffffff;">
                <div id="ModalBody_SubMenuN2"></div>
            </div>
            <div class="modal-footer" style="background: #E8E8E8;">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="btn_Registrar_SubMenu02">Registrar</button>
            </div>
        </div>
    </div>
</div>

