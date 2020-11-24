$(document).ready(function(){
    Listar_Menus();
});


function Listar_Menus() {

    var tabla = $('#Table_Menu').dataTable({
        "responsive": true,
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        //"dom": 'Bfltip',//Definimos los elementos del control de tabla
        "dom": 'tp',//Definimos los elementos del control de tabla
        "language": {"url": "../activos/pWebPageAdmin/assets/Spanish.json"},
        "ajax":
            {
                url: '/administrador/Menu_Listar',
                type : "get",
                dataType : "json",
                error: function(e){
                    console.log(e.responseText);
                }
            },
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
        "bDestroy": true,
        "iDisplayLength": 10,//Paginación
        "order": [[ 3, "asc" ]]//Ordenar (columna,orden)
    });

}



function Form_Menu(x_codigo) {

    $('#ModalForm_Menu').modal({backdrop: 'static', keyboard: false});

    carga_loading_02('ModalBody_Menu');
    $.ajax({
        url: "/administrador/Menu_Formulario",
        type: 'GET',
        data:{x_codigo: x_codigo},
        success:function (data) {
            $("#ModalBody_Menu").html(data);
        },
        error:function (msj) {
            console.log(msj);
        }
    });

}


$("#btn_Registrar_Menu").click(function () {

    var txhCodMenu  = $("#txhCodMenu").val();
    var txtNombre   = $("#txtNombre").val();
    var txtIcono    = $("#txtIcono").val();
    var txtOrden    = $("#txtOrden").val();

    if (txtNombre==''){
        Swal.fire("¡Información Incompleta!", "Ingrese nombre del menú", "warning");
    }else if(txtIcono==''){
        Swal.fire("¡Información Incompleta!", "Ingrese código del icono", "warning");
    }else if(txhCodMenu!='' && txtOrden==''){
        Swal.fire("¡Información Incompleta!", "Ingrese orden del registro", "warning");

    }else{
        var route = "/administrador/Menu_Registrar";
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token},
            type: 'POST',
            dataType: 'json',
            data:{
                txhCodMenu:txhCodMenu,
                txtNombre:txtNombre,
                txtIcono:txtIcono,
                txtOrden:txtOrden
            },
            success:function (respuesta) {

                if(respuesta == 1){
                    $("#ModalForm_Menu").modal('hide');
                    Swal.fire("¡Felicidades!", "Se registró de manera correcta su información", "success");
                    Listar_Menus();
                    Cerrar_SubMenuN1();
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


function Delete_Menu(x_codigo){

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
                url: "/administrador/Menu_Eliminar",
                headers: {'X-CSRF-TOKEN': $("#token").val()},
                type: 'POST',
                dataType: 'json',
                data:{x_codigo: x_codigo },
                success: function(respuesta){

                    console.log(respuesta);
                    if(respuesta == 1){
                        Swal.fire("¡Felicidades!", "Se eliminó correctamente", "success");
                        Listar_Menus();
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

}



function VerSubMenuNivel01(xCodMenu){

    Cerrar_SubMenuN2();
    carga_loading_02('Div_Area_SubMenuNivel01');
    $.ajax({
        url: "/administrador/Menu_SubMenuNivel01Inicio",
        type: 'GET',
        data:{xCodMenu: xCodMenu},
        success:function (data) {
            $("#Div_Area_SubMenuNivel01").html(data);
            Listar_SubMenuNivel01();
        }
    });

}

function Listar_SubMenuNivel01() {

    var tabla = $('#Table_SubMenuN1').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        //"dom": 'Bfltip',//Definimos los elementos del control de tabla
        "dom": 'tp',//Definimos los elementos del control de tabla
        "language": {"url": "../activos/pWebPageAdmin/assets/Spanish.json"},
        "ajax":
            {
                url: '/administrador/Menu_SubMenuNivel01Listar',
                type : "get",
                dataType : "json",
                data: function ( d ) {
                    d.sCodMenu   = $("#n1_txhCodMenu").val();
                },
                error: function(e){
                    console.log(e.responseText);
                }
            },
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
        "bDestroy": true,
        "iDisplayLength": 10,//Paginación
        "order": [[ 3, "asc" ]]//Ordenar (columna,orden)
    });

}


function Form_SubMenu01(xCodSubMenu1) {

    var xCodMenu = $("#n1_txhCodMenu").val();
    $('#ModalForm_SubMenuN1').modal({backdrop: 'static', keyboard: false});

    carga_loading_02('ModalBody_SubMenuN1');
    $.ajax({
        url: "/administrador/Menu_SubMenuNivel01Formulario",
        type: 'GET',
        data:{
            xCodMenu: xCodMenu,
            xCodSubMenu1: xCodSubMenu1
        },
        success:function (data) {
            $("#ModalBody_SubMenuN1").html(data);
        },
        error:function (msj) {
            console.log(msj);
        }
    });

}



$("#btn_Registrar_SubMenu01").click(function () {

    var txhCodMenu  = $("#n1_txhCodMenu").val();
    var txhCodSubMenuN1     = $("#txhCodSubMenuN1").val();
    var txtNombreSubMenuN1  = $("#txtNombreSubMenuN1").val();
    var txtIconoSubMenuN1   = $("#txtIconoSubMenuN1").val();
    var txtOrdenSubMenuN1   = $("#txtOrdenSubMenuN1").val();

    if (txtNombreSubMenuN1==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Nombre del Sub Menú Nivel 1", "warning");

    }else if(txtIconoSubMenuN1==''){
        Swal.fire("¡Información Incompleta!", "Ingrese código del Icono", "warning");

    }else if(txhCodSubMenuN1 !='' && txtOrdenSubMenuN1==''){
        Swal.fire("¡Información Incompleta!", "Ingrese orden del registro.", "warning");

    }else{
        var route = "/administrador/Menu_SubMenuNivel01Registrar";
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token},
            type: 'POST',
            dataType: 'json',
            data:{
                txhCodMenu:txhCodMenu,
                txhCodSubMenuN1:txhCodSubMenuN1,
                txtNombreSubMenuN1:txtNombreSubMenuN1,
                txtIconoSubMenuN1:txtIconoSubMenuN1,
                txtOrdenSubMenuN1:txtOrdenSubMenuN1
            },
            success:function (respuesta) {

                console.log(respuesta);
                if(respuesta == 1){
                    $("#ModalForm_SubMenuN1").modal('hide');
                    Swal.fire("¡Felicidades!", "Se registró correctamente", "success");
                    Listar_SubMenuNivel01();
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



function Elim_SubMenuN1(xCodSubMenuN1){

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
                url: "/administrador/Menu_SubMenuNivel01Eliminar",
                headers: {'X-CSRF-TOKEN': $("#token").val()},
                type: 'POST',
                dataType: 'json',
                data:{xCodSubMenuN1: xCodSubMenuN1 },
                success: function(respuesta){

                    console.log(respuesta);
                    if(respuesta == 1){
                        Swal.fire("¡Felicidades!", "Se eliminó correctamente", "success");
                        Listar_SubMenuNivel01();
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

}



//################################################################################
//#########################  MENU SUBNIVEL 01  ##############################
//################################################################################


function VerSubMenuNivel02(xCodSubMenuN1){

    carga_loading_02('Div_Area_SubMenuNivel02');
    $.ajax({
        url: "/administrador/Menu_SubMenuNivel02Inicio",
        type: 'GET',
        data:{xCodSubMenuN1: xCodSubMenuN1},
        success:function (data) {
            $("#Div_Area_SubMenuNivel02").html(data);
            Listar_SubMenuNivel02();
        }
    });

}


function Listar_SubMenuNivel02() {

    var tabla = $('#Table_SubMenuN2').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        //"dom": 'Bfltip',//Definimos los elementos del control de tabla
        "dom": 'tp',//Definimos los elementos del control de tabla
        "language": {"url": "../activos/pWebPageAdmin/assets/Spanish.json"},
        "ajax":
            {
                url: '/administrador/Menu_SubMenuNivel02Listar',
                type : "get",
                dataType : "json",
                data: function ( d ) {
                    d.sCodSubMenuN1   = $("#n2_txhCodSubMenuN1").val();
                },
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


function Form_SubMenuN2(xCodSubMenuN2) {

    $('#ModalForm_SubMenuN2').modal({backdrop: 'static', keyboard: false});

    var xCodSubMenuN1 = $("#n2_txhCodSubMenuN1").val();
    carga_loading_02('ModalBody_SubMenuN2');

    $.ajax({
        url: "/administrador/Menu_SubMenuNivel02Formulario",
        type: 'GET',
        data:{
            xCodSubMenuN1: xCodSubMenuN1,
            xCodSubMenuN2: xCodSubMenuN2
        },
        success:function (data) {
            $("#ModalBody_SubMenuN2").html(data);
        },
        error:function (msj) {
            console.log(msj);
        }
    });

}


$("#btn_Registrar_SubMenu02").click(function () {

    var txhCodSubMenuN1     = $("#n2_txhCodSubMenuN1").val();
    var txhCodSubMenuN2     = $("#txhCodSubMenuN2").val();
    var txtNombreSubMenuN2  = $("#txtNombreSubMenuN2").val();
    var txtEnlaceSubMenuN2  = $("#txtEnlaceSubMenuN2").val();
    var txtIconoSubMenuN2   = $("#txtIconoSubMenuN2").val();
    var txtOrdenSubMenuN2   = $("#txtOrdenSubMenuN2").val();

    if (txtNombreSubMenuN2==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Nombre del Sub Menú Nivel 2", "warning");

    }else if (txtEnlaceSubMenuN2==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Enlace del Sub Menú Nivel 2", "warning");

    }else if(txtIconoSubMenuN2==''){
        Swal.fire("¡Información Incompleta!", "Ingrese código del Icono", "warning");

    }else if(txhCodSubMenuN2 != '' && txtOrdenSubMenuN2==''){
        Swal.fire("¡Información Incompleta!", "Ingrese orden del registro", "warning");

    }else{
        var route = "/administrador/Menu_SubMenuNivel02Registrar";
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token},
            type: 'POST',
            dataType: 'json',
            data:{
                txhCodSubMenuN1:txhCodSubMenuN1,
                txhCodSubMenuN2:txhCodSubMenuN2,
                txtNombreSubMenuN2:txtNombreSubMenuN2,
                txtEnlaceSubMenuN2:txtEnlaceSubMenuN2,
                txtIconoSubMenuN2:txtIconoSubMenuN2,
                txtOrdenSubMenuN2:txtOrdenSubMenuN2
            },
            success:function (respuesta) {

                console.log(respuesta);
                if(respuesta == 1){
                    $("#ModalForm_SubMenuN2").modal('hide');
                    Swal.fire("¡Felicidades!", "Se registró correctamente", "success");
                    Listar_SubMenuNivel02();
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


function Elim_SubMenuN2(xCodSubMenuN2){

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
                url: "/administrador/Menu_SubMenuNivel02Eliminar",
                headers: {'X-CSRF-TOKEN': $("#token").val()},
                type: 'POST',
                dataType: 'json',
                data:{xCodSubMenuN2: xCodSubMenuN2 },
                success: function(respuesta){

                    console.log(respuesta);
                    if(respuesta == 1){
                        Swal.fire("¡Felicidades!", "Se eliminó correctamente", "success");
                        Listar_SubMenuNivel02();
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

}


function Cerrar_SubMenuN1(){
    $("#Div_Area_SubMenuNivel01").html("");
    $("#Div_Area_SubMenuNivel02").html("");
}

function Cerrar_SubMenuN2(){
    $("#Div_Area_SubMenuNivel02").html("");
}
