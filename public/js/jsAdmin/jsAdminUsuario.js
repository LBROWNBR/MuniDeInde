$(document).ready(function(){
    Listar_Usuarios();
});


function Listar_Usuarios() {

    var tabla = $('#Table_Users').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        //"dom": 'Bfltip',//Definimos los elementos del control de tabla
        "dom": 'tp',//Definimos los elementos del control de tabla
        "language": {"url": "../activos/pWebPageAdmin/assets/Spanish.json"},
        "ajax":
            {
                url: '/administrador/Usuario_Listar',
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


function Form_User(x_codigo) {

    $('#ModalForm_User').modal({backdrop: 'static', keyboard: false});

    carga_loading_02('ModalBody_User');
    $.ajax({
        url: "/administrador/Usuario_Formulario",
        type: 'GET',
        data:{x_codigo: x_codigo},
        success:function (data) {
            $("#ModalBody_User").html(data);
        },
        error:function (msj) {
            console.log(msj);
        }
    });

}


function ValidaCheck(){

    var cbox_ConservPSWD = $('input[name=cbox_ConservPSWD]:checked').val();

    if(cbox_ConservPSWD){
        $("#txt_NomPassword").val('*****************');
        $("#txt_NomPassword").prop('disabled', true);

    }else{
        $("#txt_NomPassword").val('');
        $("#txt_NomPassword").prop('disabled', false);
    }

}

$("#btn_Registrar_User").click(function () {

    var txhCodUser              = $("#txhCodUser").val();
    var cbo_Personal            = $("#cbo_Personal").val();
    var cbo_rol                 = $("#cbo_rol").val();
    var txtCorreoUsuario        = $("#txtCorreoUsuario").val();
    var txt_NomPassword         = $("#txt_NomPassword").val();
    var cbox_ConservPSWD        = $('input[name=cbox_ConservPSWD]:checked').val();
    var txt_Password_Old        = $("#txt_Password_Old").val();

    if(cbox_ConservPSWD){
        var check_ConservPSWD = 1;
    }else{
        var check_ConservPSWD = 0;
    }

    if (cbo_Personal==''){
        Swal.fire("¡Información Incompleta!", "Seleccione Personal", "warning");

    }else if (cbo_rol==''){
        Swal.fire("¡Información Incompleta!", "Seleccione Rol", "warning");

    }else if (txtCorreoUsuario==''){
        Swal.fire("¡Información Incompleta!", "Ingrese correo del Usuario", "warning");

    }else if(check_ConservPSWD == 0 && txt_NomPassword == ''){
        Swal.fire("¡Información Incompleta!", "Ingrese Contraseña", "warning");

    }else{
        var route = "/administrador/Usuario_Registrar";
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token},
            type: 'POST',
            dataType: 'json',
            data:{
                txhCodUser:txhCodUser,
                cbo_Personal: cbo_Personal,
                cbo_rol: cbo_rol,
                txtCorreoUsuario:txtCorreoUsuario,
                txt_NomPassword:txt_NomPassword,
                check_ConservPSWD:check_ConservPSWD,
                txt_Password_Old:txt_Password_Old
            },
            success:function (respuesta) {

                if(respuesta == 1){
                    $("#ModalForm_User").modal('hide');
                    Swal.fire("¡Felicidades!", "Se registró correctamente su información", "success");
                    Listar_Usuarios();

                }else if(respuesta == 2){
                    Swal.fire("¡Error al registrar!", "Usuario ya existe.", "warning");

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



function Eliminar_User(x_codigo){

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
                url: "/administrador/Usuario_Eliminar",
                headers: {'X-CSRF-TOKEN': $("#token").val()},
                type: 'POST',
                dataType: 'json',
                data:{x_codigo: x_codigo },
                success: function(respuesta){

                    console.log(respuesta);
                    if(respuesta == 1){
                        Swal.fire("¡Felicidades!", "Se eliminó correctamente", "success");
                        Listar_Usuarios();
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

