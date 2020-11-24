(function() {
    IniciarMapa();
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    //alert("failed");
                }else{
                    event.preventDefault();
                    AlertConfirmRegistrarRepresFamilia(event);
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();



function carga_loading_02(containerid){
    var oDiv = document.getElementById(containerid);
    oDiv.style.display='block';
    oDiv.style.visibility= "visible";
    document.getElementById(containerid).innerHTML= '<div style="text-align: center"><img src="/images/iconos/loading.gif" /><br>Cargando...<br><br></div>';
}



function FormIntegrante(x_codigo) {

    $('#ModalForm_Familia').modal({backdrop: 'static', keyboard: false});

    carga_loading_02('ModalBody_Familia');    
    $.ajax({
        url: "/administrador/Producto_Formulario",
        type: 'GET',
        data:{x_codigo: x_codigo},
        success:function (data) {
            $("#ModalBody_Familia").html(data);
        },
        error:function (msj) {
            console.log(msj);
        }
    });
}



function MostrarProvincia(){

    var cbo_depa =  $("#cbo_depa_fam").val();

    if(cbo_depa == ''){
        alert('Seleccione Departamento');
    }else{

        var objComboProvincia = $("#cbo_prov_fam");

        objComboProvincia.empty();
        $.ajax({
            url: "/ListarProv",
            type: 'GET',
            data:{cbo_depa: cbo_depa},
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
            }
        });

    }
}




function MostrarDistrito(){

    var cbo_depa =  $("#cbo_depa_fam").val();
    var cbo_prov =  $("#cbo_prov_fam").val();

    if(cbo_depa == ''){
        alert('Seleccione Departamento');
    }else if(cbo_prov == ''){
        alert('Seleccione Provincia');
    }else{

        var objComboDistrito = $("#cbo_dist_fam");

        objComboDistrito.empty();
        $.ajax({
            url: "/ListarDist",
            type: 'GET',
            data:{cbo_depa: cbo_depa, cbo_prov: cbo_prov},
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
            }
        });

    }
}



function AlertConfirmRegistrarRepresFamilia(e) {
    e.preventDefault();
    Swal.fire({
        title: '¿Confirma Registrar Datos del Representante de la Familia?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Registrar Cliente'
    }).then((result) => {
        if (result.isConfirmed) {
            RegistrarRepresFamilia();
        }
    });
}



function RegistrarRepresFamilia(){

    var formData    = new FormData($(".formulario")[0]);    

    $.ajax({
        url: "/RegistrarRepresFamilia",
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response){

            var objRpta = JSON.parse(response);
            console.log(objRpta);

            if(objRpta.rs=='1'){
                Swal.fire(objRpta.titulo, objRpta.mensaje, objRpta.tipo);
                clearForm();
            }else{
                Swal.fire(objRpta.titulo, objRpta.mensaje, objRpta.tipo);
            }
        },
        error: function(rpta){
            console.log("error");
            console.log(rpta);
        }
    });

}


function clearForm() {
    $("#txh_codrepres").val('');
    $("#txt_nom_familia").val('');
    $("#cbotipdoc_familia").val('');
    $("#txt_numdoc_familia").val('');
    $("#cboparentesco").val('');
    $("#txt_nombre_Represent").val('');
    $("#txt_apepat_repres").val('');
    $("#txt_apemat_repres").val('');
    $("#cbogenero_repres").val('');
    $("#txt_fechaNac_repres").val('');
    $("#txt_telfijo").val('');
    $("#txt_celular").val('');
    $("#txt_dir_repres").val('');
    $("#cbo_depa_fam").val('');
    $("#cbo_prov_fam").val('');
    $("#cbo_dist_fam").val('');
    $("#txt_latitud").val('');
    $("#txt_longitud").val('');  
};


function IniciarMapa() {

    // Creating map object
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 16,
        center: new google.maps.LatLng(-11.986844, -77.103421),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // creates a draggable marker to the given coords
    var vMarker = new google.maps.Marker({
        position: new google.maps.LatLng(-11.986844, -77.103421),
        draggable: true
    });

    // adds a listener to the marker
    // gets the coords when drag event ends
    // then updates the input with the new coords
    google.maps.event.addListener(vMarker, 'dragend', function (evt) {
        $("#txt_latitud").val(evt.latLng.lat().toFixed(6));
        $("#txt_longitud").val(evt.latLng.lng().toFixed(6));

        map.panTo(evt.latLng);
    });

    // centers the map on markers coords
    map.setCenter(vMarker.position);

    // adds the marker on the map
    vMarker.setMap(map);
}