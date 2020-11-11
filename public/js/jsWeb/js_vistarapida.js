/*
function MostrarProducto(x_codigo) {

 
       
    // $('#ModalForm_Producto').modal({ backdrop: 'static', keyboard: false });
 
     //carga_loading('ModalBody_Producto');
     $.ajax({
         url: "/vistarapida",
         type: 'GET',
         data: { x_codigo: x_codigo },
         success: function (data) {
             $("onload-popup").html(data);
         },
         error: function (msj) {
             console.log(msj);
         }
     });
 
 }*/

 $('.popup-ajax_vista').magnificPopup({
    type: 'ajax',
    callbacks: {
        ajaxContentAdded: function() {
            carousel_slider();
            slick_slider();
         }
    },
    function() {
         Var1 = $('#myVar').val(); 
        }
});