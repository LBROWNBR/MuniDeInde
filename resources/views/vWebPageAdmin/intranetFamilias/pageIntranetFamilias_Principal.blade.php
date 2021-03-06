<script src="../js/jsAdmin/jsAdminFamilia.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM_X4-4iiGr56sg-V7nlu0LcV6gv6kqoI"></script>

<style>
    .swal2-container{ z-index: 10000;}
</style>

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Administración de Familias</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Página</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Administración de Familias</a></li>
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
                <h3 class="card-title">LISTA DE REPRESENTANTES</h3>
            </div>

            <div class="card-body">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">


                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-nowrap tablaEstilo" id="Table_Representantes">
                        <thead>
                            <tr>
                                <th style="width: 5%">Código</th>
                                <th style="width: 10%">Fecha Registro</th>
                                <th style="width: 10%">Familia</th>
                                <th style="width: 10%">Tipo Documento</th>
                                <th style="width: 10%">Número Documento</th>
                                <th style="width: 10%">Parentesco</th>
                                <th style="width: 10%">Nombre Representante</th>
                                <th style="width: 10%">Apellido Paterno Representante</th>
                                <th style="width: 10%">Apellido Materno Representante</th>
                                <th style="width: 10%">Sexo</th>
                                <th style="width: 10%">Fecha Nacimiento</th>
                                <th style="width: 10%">Teléfono</th>
                                <th style="width: 10%">Celular</th>
                                <th style="width: 10%">Dirección</th>
                                <th style="width: 10%">Departamento</th>
                                <th style="width: 10%">Provincia</th>
                                <th style="width: 10%">Distrito</th>
                                <th style="width: 10%">Latitud</th>
                                <th style="width: 10%">Longitud</th>
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


<div class="modal fade" id="ModalForm_Representante" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #3F5367;">
                <h5 class="modal-title" id="ModalForm_Representante" style="color: #FFFFFF;">ACTUALIZACIÓN DEL REPRESENTANTE DE FAMILIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFFFFF;">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="background: #ffffff;">
                <div id="ModalBody_Representante"></div>
            </div>
            <div class="modal-footer" style="background: #E8E8E8;">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="btn_Actualizar_Repres">Actualizar</button>
            </div>
        </div>
    </div>
</div>
