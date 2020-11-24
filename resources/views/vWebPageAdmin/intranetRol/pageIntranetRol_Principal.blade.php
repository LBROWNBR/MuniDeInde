<script src="../js/jsAdmin/jsAdminRol.js"></script>

<style>
    .swal2-container{ z-index: 10000;}
</style>

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Registro de Rol</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Página</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Registro de Rol</a></li>
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
                <h3 class="card-title">LISTA DE ROL</h3>
                <div class="card-options">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" onclick="Form_Rol('')">Nuevo ROL</button>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">


                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-nowrap tablaEstilo" id="Table_Rol">
                        <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 75%">Rol</th>
                                <th style="width: 10%">Permisos</th>
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


<div class="modal fade" id="ModalForm_Rol" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #3F5367;">
                <h5 class="modal-title" id="ModalForm_Rol" style="color: #FFFFFF;">REGISTRO DE ROL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="background: #ffffff;">
                <div id="ModalBody_Rol"></div>
            </div>
            <div class="modal-footer" style="background: #E8E8E8;">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="btn_Registrar_Rol">Registrar</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="ModalForm_RolMenu" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #3F5367;">
                <h5 class="modal-title" id="ModalForm_RolMenu" style="color: #FFFFFF;">ASIGNACIÓN DE PERMISOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="background: #ffffff;">
                <div style=" overflow-x : hidden; overflow-y: scroll; height: 700px;" >
                    <div id="ModalBody_RolMenu"></div>
                </div>
            </div>
            <div class="modal-footer" style="background: #E8E8E8;">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="btn_Registrar_RolMenu">Registrar</button>
            </div>
        </div>
    </div>
</div>
