$(document).ready(function(){
    Listar_Respresentantes();
});


function Listar_Respresentantes() {

    var tabla = $('#Table_Representantes').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        //"dom": 'Bfltip',//Definimos los elementos del control de tabla
        "dom": 'tp',//Definimos los elementos del control de tabla
        "language": {"url": "../activos/pWebPageAdmin/assets/Spanish.json"},
        "ajax":
            {
                url: '/administrador/Familia_Listar',
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


function Form_Representante(x_codigo) {

    $('#ModalForm_Representante').modal({backdrop: 'static', keyboard: false});

    carga_loading_02('ModalBody_Representante');
    $.ajax({
        url: "/administrador/Familia_Formulario",
        type: 'GET',
        data:{x_codigo: x_codigo},
        success:function (data) {
            $("#ModalBody_Representante").html(data);
        },
        error:function (msj) {
            console.log(msj);
        }
    });

}


$("#btn_Actualizar_Repres").click(function () {

  
    var txh_codrepres   = $("#txh_codrepres").val();
    var txt_nom_familia  = $("#txt_nom_familia").val();
    var cbotipdoc_familia  = $("#cbotipdoc_familia").val();
    var txt_numdoc_familia  = $("#txt_numdoc_familia").val();
    var cboparentesco  = $("#cboparentesco").val();
    var txt_nombre_Represent  = $("#txt_nombre_Represent").val();
    var txt_apepat_repres  = $("#txt_apepat_repres").val();
    var txt_apemat_repres  = $("#txt_apemat_repres").val();
    var cbogenero_repres  = $("#cbogenero_repres").val();
    var txt_fechaNac_repres  = $("#txt_fechaNac_repres").val();
    var txt_telfijo  = $("#txt_telfijo").val();
    var txt_celular  = $("#txt_celular").val();
    var txt_dir_repres  = $("#txt_dir_repres").val();
    var cbo_depa_fam  = $("#cbo_depa_fam").val();
    var cbo_prov_fam  = $("#cbo_prov_fam").val();
    var cbo_dist_fam  = $("#cbo_dist_fam").val();
    var txt_latitud  = $("#txt_latitud").val();
    var txt_longitud  = $("#txt_longitud").val();

    if (txt_nom_familia==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Nombre del Familia", "warning");

    }else if (cbotipdoc_familia==''){
        Swal.fire("¡Información Incompleta!", "Seleccione Tipo documento", "warning");

    }else if (txt_numdoc_familia==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Nro. documento", "warning");

    }else if (cboparentesco==''){
        Swal.fire("¡Información Incompleta!", "Seleccione Parentesco", "warning");

    }else if (txt_nombre_Represent==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Nombre del Representante", "warning");

    }else if (txt_apepat_repres==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Apellido Paterno del Representante", "warning");

    }else if (txt_apemat_repres==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Apellido Materno del Representante", "warning");

    }else if (cbogenero_repres==''){
        Swal.fire("¡Información Incompleta!", "Seleccione Género", "warning");

    }else if (txt_fechaNac_repres==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Fecha Nacimiento", "warning");

    }else if (txt_celular==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Celular ", "warning");

    }else if (txt_dir_repres==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Dirección", "warning");

    }else if (cbo_depa_fam==''){
        Swal.fire("¡Información Incompleta!", "Seleccione Departamento", "warning");

    }else if (cbo_prov_fam==''){
        Swal.fire("¡Información Incompleta!", "Seleccione Provincia", "warning");

    }else if (cbo_dist_fam==''){
        Swal.fire("¡Información Incompleta!", "Seleccione Distrito", "warning");

    }else if (txt_latitud==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Latitud", "warning");

    }else if (txt_longitud==''){
        Swal.fire("¡Información Incompleta!", "Ingrese Longitud", "warning");

    }else{
        $.ajax({
            url: "/administrador/Familia_Registrar",
            headers: {'X-CSRF-TOKEN':$("#token").val()},
            type: 'POST',
            dataType: 'json',
            data:{
                txh_codrepres : txh_codrepres,
                txt_nom_familia : txt_nom_familia,
                cbotipdoc_familia : cbotipdoc_familia,
                txt_numdoc_familia : txt_numdoc_familia,
                cboparentesco : cboparentesco,
                txt_nombre_Represent : txt_nombre_Represent,
                txt_apepat_repres : txt_apepat_repres,
                txt_apemat_repres : txt_apemat_repres,
                cbogenero_repres : cbogenero_repres,
                txt_fechaNac_repres : txt_fechaNac_repres,
                txt_telfijo : txt_telfijo,
                txt_celular : txt_celular,
                txt_dir_repres : txt_dir_repres,
                cbo_depa_fam : cbo_depa_fam,
                cbo_prov_fam : cbo_prov_fam,
                cbo_dist_fam : cbo_dist_fam,
                txt_latitud : txt_latitud,
                txt_longitud : txt_longitud
            },
            success:function (respuesta) {

                if(respuesta == 1){
                    $("#ModalForm_Representante").modal('hide');
                    Swal.fire("¡Felicidades!", "Se actualizó de manera correcta su información", "success");
                    Listar_Respresentantes();
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



function Eliminar_Representante(x_codigo){

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
                url: "/administrador/Familia_Eliminar",
                headers: {'X-CSRF-TOKEN': $("#token").val()},
                type: 'POST',
                dataType: 'json',
                data:{x_codigo: x_codigo },
                success: function(respuesta){

                    console.log(respuesta);
                    if(respuesta == 1){
                        Swal.fire("¡Felicidades!", "Se eliminó correctamente", "success");
                        Listar_Respresentantes();
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

