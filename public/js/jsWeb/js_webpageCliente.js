(function() {
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
                    AlertConfirmRegistrarCli(event);
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();


function MostrarProvincia(){

    var cbo_depacli =  $("#cbo_depacli").val();

    if(cbo_depacli == ''){
        alert('Seleccione Departamento');
    }else{

        var objComboProvincia = $("#cbo_provcli");

        objComboProvincia.empty();
        $.ajax({
            url: "/cliListarProv",
            type: 'GET',
            data:{cbo_depacli: cbo_depacli},
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

    var cbo_depacli =  $("#cbo_depacli").val();
    var cbo_provcli =  $("#cbo_provcli").val();

    if(cbo_depacli == ''){
        alert('Seleccione Departamento');
    }else if(cbo_provcli == ''){
        alert('Seleccione Provincia');
    }else{

        var objComboDistrito = $("#cbo_distcli");

        objComboDistrito.empty();
        $.ajax({
            url: "/cliListarDist",
            type: 'GET',
            data:{cbo_depacli: cbo_depacli, cbo_provcli: cbo_provcli},
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



function AlertConfirmRegistrarCli(e) {
    e.preventDefault();
    Swal.fire({
        title: '¿Confirma Registrar CLiente?',
        text: "Al registrarse obtendrá descuentos en su compra.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Registrar Cliente'
    }).then((result) => {
        if (result.isConfirmed) {
            RegistrarCliente();
        }
    });
}



function RegistrarCliente(){

    var formData    = new FormData($(".formulario")[0]);

    $.ajax({
        url: "/cliRegistrar",
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
                location.href = '/micuenta';
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
