$(document).ready(function(){
    Listar_Roles();
});


function Listar_Roles() {

    var tabla = $('#Table_Rol').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        //"dom": 'Bfltip',//Definimos los elementos del control de tabla
        "dom": 'tp',//Definimos los elementos del control de tabla
        "language": {"url": "../activos/pWebPageAdmin/assets/Spanish.json"},
        "ajax":
            {
                url: '/administrador/Rol_Listar',
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


function Form_Rol(x_codigo) {

    $('#ModalForm_Rol').modal({backdrop: 'static', keyboard: false});

    carga_loading_02('ModalBody_Rol');
    $.ajax({
        url: "/administrador/Rol_Formulario",
        type: 'GET',
        data:{x_codigo: x_codigo},
        success:function (data) {
            $("#ModalBody_Rol").html(data);
        },
        error:function (msj) {
            console.log(msj);
        }
    });

}


$("#btn_Registrar_Rol").click(function () {

    var txhCodRol   = $("#txhCodRol").val();
    var txtRol  = $("#txtRol").val();

    if (txtRol==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Nombre del Rol", "warning");

    }else{
        var route = "/administrador/Rol_Registrar";
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token},
            type: 'POST',
            dataType: 'json',
            data:{
                txhCodRol:txhCodRol,
                txtRol:txtRol
            },
            success:function (respuesta) {

                if(respuesta == 1){
                    $("#ModalForm_Rol").modal('hide');
                    Swal.fire("¡Felicidades!", "Se registró de manera correcta su información", "success");
                    Listar_Roles();
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



function Eliminar_Rol(x_codigo){

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
                url: "/administrador/Rol_Eliminar",
                headers: {'X-CSRF-TOKEN': $("#token").val()},
                type: 'POST',
                dataType: 'json',
                data:{x_codigo: x_codigo },
                success: function(respuesta){

                    console.log(respuesta);
                    if(respuesta == 1){
                        Swal.fire("¡Felicidades!", "Se eliminó correctamente", "success");
                        Listar_Roles();
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



//################################################################################
//#################################  MENU ROL  ###################################
//################################################################################


function VerMenuRol(xCodRol) {

    $('#ModalForm_RolMenu').modal({backdrop: 'static', keyboard: false});

    carga_loading_02('ModalBody_RolMenu');
    $.ajax({
        url: "/administrador/Rol_PermisosFormulario",
        type: 'GET',
        data:{xCodRol: xCodRol},
        success:function (data) {
            $("#ModalBody_RolMenu").html(data);
        },
        error:function (msj) {
            console.log(msj);
        }
    });

}


$("#btn_Registrar_RolMenu").click(function () {

    var txhCodRol_F     = $("#txhCodRol_F").val();
    var Tot_SubMenu     = $("#Tot_SubMenu").val();
    var ItemsSUBMenu    = new Array();
    var Acum_SubMenu    = '';

    $t=0;
    for (k=1;k<=Tot_SubMenu;k++) {
        if($("input[name=checkbox_submenu"+k+"]:checkbox").is(":checked")){
           ItemsSUBMenu[k] =   $("#checkbox_submenu"+k).val();
            Acum_SubMenu    =   Acum_SubMenu+', '+ItemsSUBMenu[k];
            $t++;
        }
    }

    var new_ItemsSUBMenu    =   String(Acum_SubMenu).substring(1, String(Acum_SubMenu).length);

    //======================================================

    if ($t==0){
        alert('Debe seleccionar por lo menos una opción');

    }else{
        var route = "/administrador/Rol_PermisosRegistrar";
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token},
            type: 'POST',
            dataType: 'json',
            data:{
                txhCodRol_F:txhCodRol_F,
                new_ItemsSUBMenu:new_ItemsSUBMenu
            },
            success:function (respuesta) {

                console.log(respuesta);
                    if(respuesta == 1){
                        $("#ModalForm_RolMenu").modal('hide');
                        Swal.fire("¡Felicidades!", "Se registró correctamente", "success");
                        Listar_Roles();
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
