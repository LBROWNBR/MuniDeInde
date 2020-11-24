

function MostrarDatosFamilia(x_codigo){
    $.ajax({
        url: "/administrador/MapeoFamilia_Datos",
        type: 'GET',
        data:{x_codigo: x_codigo},
        success:function (respuesta) {

            var JsonRpta = JSON.parse(respuesta);
            console.log(JsonRpta);


            $("#txt_nom_familia").val(JsonRpta.NOM_FAMILIA);
            $("#txt_tipDoc").val(JsonRpta.ABREV_TIPDOC);
            $("#txt_numdoc_familia").val(JsonRpta.NUMDOC_REPRES);
            $("#txt_parentesco").val(JsonRpta.DESC_TIPPARENT);
            $("#txt_nombre_Represent").val(JsonRpta.NOMBRE_REPRES);
            $("#txt_apepat_repres").val(JsonRpta.APEPAT_REPRES);
            $("#txt_apemat_repres").val(JsonRpta.APEMAT_REPRES);
            $("#txtgenero").val(JsonRpta.NOM_SEXO);
            $("#txt_fechaNac_repres").val(JsonRpta.FECNAC_REPRES);
            $("#txt_telfijo").val(JsonRpta.TEL_REPRES);
            $("#txt_celular").val(JsonRpta.CEL_REPRES);
            $("#txt_dir_repres").val(JsonRpta.DIR_REPRES);
            $("#txt_depa").val(JsonRpta.DEPARTAMENTO);
            $("#txt_prov").val(JsonRpta.PROVINCIA);
            $("#txt_dist").val(JsonRpta.DISTRITO);
           
        },
        error:function (msj) {
            console.log(msj);
        }
    });
}


