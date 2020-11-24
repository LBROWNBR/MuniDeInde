$(document).ready(function(){
    Listar_Personal();
});


function Listar_Personal() {

    var tabla = $('#Table_Personal').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        //"dom": 'Bfltip',//Definimos los elementos del control de tabla
        "dom": 'tp',//Definimos los elementos del control de tabla
        "language": {"url": "../activos/pWebPageAdmin/assets/Spanish.json"},
        "ajax":
            {
                url: '/administrador/Personal_Listar',
                type : "get",
                dataType : "json",
                error: function(e){
                    console.log(e.responseText);
                }
            },
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
        "bDestroy": true,
        "iDisplayLength": 10,//Paginación
        "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
    });

}


function Form_Personal(x_codigo) {

    $('#ModalForm_Personal').modal({backdrop: 'static', keyboard: false});

    carga_loading_02('ModalBody_Personal');
    $.ajax({
        url: "/administrador/Personal_Formulario",
        type: 'GET',
        data:{x_codigo: x_codigo},
        success:function (data) {
            $("#ModalBody_Personal").html(data);
        },
        error:function (msj) {
            console.log(msj);
        }
    });

}


function MostrarProvincia(){

    var cboDepa =  $("#cboDepa").val();

    if(cboDepa == ''){
        alert('Seleccione Departamento');
    }else{
        var objComboProvincia = $("#cboProv");
        objComboProvincia.empty();

        $.ajax({
            url: "/administrador/Maestras_ListarProvincias",
            type: 'GET',
            data:{cboDepa: cboDepa},
            success:function (respuesta) {

                var JsonRpta = JSON.parse(respuesta);
                console.log(JsonRpta);

                objComboProvincia.append('<option value="" selected="selected" >Seleccione</option>');
                $(JsonRpta.DataProvincia).each(function (key, value) {
                    objComboProvincia.append("<option value="+value.CODPROV+" >"+value.NMBUBIGEO+"</option>");
                });
            },
            error:function (msj) {
                console.log(msj);
                Swal.fire("¡Error al consultar!", JSON.stringify(msj), "danger");
            }
        });

    }
}



function MostrarDistrito(){

    var cboDepa =  $("#cboDepa").val();
    var cboProv =  $("#cboProv").val();

    if(cboDepa == ''){
        Swal.fire("¡Información Incompleta!", "Seleccione Departamento", "warning");
    }else if(cboProv == ''){
        Swal.fire("¡Información Incompleta!", "Seleccione Provincia", "warning");
    }else{

        var objComboDistrito = $("#cboDist");

        objComboDistrito.empty();
        $.ajax({
            url: "/administrador/Maestras_ListarDistritos",
            type: 'GET',
            data:{cboDepa: cboDepa, cboProv: cboProv},
            success:function (respuesta) {

                var JsonRpta = JSON.parse(respuesta);
                console.log(JsonRpta);

                objComboDistrito.append('<option value="" selected="selected" >Seleccione</option>');
                $(JsonRpta.DataDistrito).each(function (key, value) {
                    objComboDistrito.append("<option value="+value.CODDIST+" >"+value.NMBUBIGEO+"</option>");
                });
            },
            error:function (msj) {
                console.log(msj);
                Swal.fire("¡Error al consultar!", JSON.stringify(msj), "danger");
            }
        });

    }
}



$("#btn_Registrar_Personal").click(function () {

    var txhCodPersonal      = $("#txhCodPersonal").val();
    var txtApePat           = $("#txtApePat").val();
    var txtApeMat           = $("#txtApeMat").val();
    var txtNombres          = $("#txtNombres").val();
    var cboTipDoc           = $("#cboTipDoc").val();
    var txtNumDoc           = $("#txtNumDoc").val();
    var cboSexo             = $("#cboSexo").val();
    var cboEstCivil         = $("#cboEstCivil").val();
    var txtfechaNac         = $("#txtfechaNac").val();
    var txtTelFijo          = $("#txtTelFijo").val();
    var txtCelular          = $("#txtCelular").val();
    var txtCorreo           = $("#txtCorreo").val();
    var cboDepa             = $("#cboDepa").val();
    var cboProv             = $("#cboProv").val();
    var cboDist             = $("#cboDist").val();
    var txtNomDireccion     = $("#txtNomDireccion").val();
    var txtNumDireccion     = $("#txtNumDireccion").val();
    var txtReferencia       = $("#txtReferencia").val();


    if (txtApePat==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Apellido Paterno", "warning");

    }else if (txtApeMat==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Apellido Materno", "warning");

    }else if (txtNombres==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Nombres", "warning");

    }else if(cboTipDoc == ''){
        Swal.fire("¡Información Incompleta!", "Seleccione Tipo Documento", "warning");

    }else if(txtNumDoc == ''){
        Swal.fire("¡Información Incompleta!", "Ingrese Nro Documento", "warning");

    }else if(cboSexo == ''){
        Swal.fire("¡Información Incompleta!", "Seleccione Sexo", "warning");

    }else if(cboEstCivil == ''){
        Swal.fire("¡Información Incompleta!", "Seleccione Estado Civil", "warning");

    }else if(txtfechaNac == ''){
        Swal.fire("¡Información Incompleta!", "Ingrese Fecha de Nacimiento", "warning");

    }else{
        var route = "/administrador/Personal_Registrar";
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token},
            type: 'POST',
            dataType: 'json',
            data:{
                txhCodPersonal:txhCodPersonal,
                txtApePat:txtApePat,
                txtApeMat:txtApeMat,
                txtNombres:txtNombres,
                cboTipDoc:cboTipDoc,
                txtNumDoc:txtNumDoc,
                cboSexo:cboSexo,
                cboEstCivil:cboEstCivil,
                txtfechaNac:txtfechaNac,
                txtTelFijo:txtTelFijo,
                txtCelular:txtCelular,
                txtCorreo:txtCorreo,
                cboDepa:cboDepa,
                cboProv:cboProv,
                cboDist:cboDist,
                txtNomDireccion:txtNomDireccion,
                txtNumDireccion:txtNumDireccion,
                txtReferencia:txtReferencia
            },
            success:function (respuesta) {

                if(respuesta == 1){
                    $("#ModalForm_Personal").modal('hide');
                    Swal.fire("¡Felicidades!", "Se registró correctamente su información", "success");
                    Listar_Personal();

                }else{
                    console.log(respuesta);
                    Swal.fire("¡Error al registrar!", JSON.stringify(respuesta), "danger");
                }
            },
            error:function (msj) {
                console.log(msj);
                Swal.fire("¡Error!", JSON.stringify(msj), "danger");
            }
        });
    }


});



function Eliminar_Personal(x_codigo){

    Swal.fire({
        title: 'Confirma eliminar este registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si. Eliminar',
        cancelButtonText: 'No. Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "/administrador/Personal_Eliminar",
                headers: {'X-CSRF-TOKEN': $("#token").val()},
                type: 'POST',
                dataType: 'json',
                data:{x_codigo: x_codigo },
                success: function(respuesta){

                    console.log(respuesta);
                    if(respuesta == 1){
                        Swal.fire("¡Felicidades!", "Se eliminó correctamente", "success");
                        Listar_Personal();
                    }else{
                        console.log(respuesta);
                        Swal.fire("¡Error al eliminar!", JSON.stringify(respuesta), "danger");
                    }

                },
                error:function (msj) {
                    console.log(msj);
                    Swal.fire("¡Error!", JSON.stringify(msj), "danger");
                }
            });
        }
    });

}

