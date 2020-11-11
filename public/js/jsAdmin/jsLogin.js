
function AccederLogin(){

    var txtCorreo       = $("#txtCorreo").val();
    var txtClave           = $("#txtClave").val();

    if(txtCorreo == ''){        
        alert('Ingrese Correo');

    }else if(txtClave == ''){
        alert('Ingrese COntraseña');
        
    }else{
    
        $.ajax({
            url: "/administrador/ValidarLogin",
            headers: {'X-CSRF-TOKEN': $("#token").val()},
            type: 'POST',
            //dataType: 'json',
            data:{
                txtCorreo:txtCorreo,
                txtClave:txtClave
            },
            success:function (valor) {
                console.log("Paso--->");
                console.log(valor);
            },
            error:function (msj) {
                console.log("Error--->");
                console.log(msj);
                
            }
        });
    
    }

}