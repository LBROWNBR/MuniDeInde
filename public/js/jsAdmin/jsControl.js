$(document).ready(function(){

});

function carga_loading_01(containerid){
    var oDiv = document.getElementById(containerid);
    oDiv.style.display='block';
    oDiv.style.visibility= "visible";
    document.getElementById(containerid).innerHTML= '<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>';
}

function carga_loading_02(containerid){
    var oDiv = document.getElementById(containerid);
    oDiv.style.display='block';
    oDiv.style.visibility= "visible";
    document.getElementById(containerid).innerHTML= '<div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>';
}

function carga_loading_03(containerid){
    var oDiv = document.getElementById(containerid);
    oDiv.style.display='block';
    oDiv.style.visibility= "visible";
    document.getElementById(containerid).innerHTML= '<div class="dimmer active"><div class="spinner3"><div class="dot1"></div><div class="dot2"></div></div></div>';
}

function carga_loading_04(containerid){
    var oDiv = document.getElementById(containerid);
    oDiv.style.display='block';
    oDiv.style.visibility= "visible";
    document.getElementById(containerid).innerHTML= '<div class="dimmer active"><div class="spinner4"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>';
}

function carga_loading_05(containerid){
    var oDiv = document.getElementById(containerid);
    oDiv.style.display='block';
    oDiv.style.visibility= "visible";
    document.getElementById(containerid).innerHTML= '<div class="sk-folding-cube"><div class="sk-cube1 sk-cube"></div><div class="sk-cube2 sk-cube"></div><div class="sk-cube4 sk-cube"></div><div class="sk-cube3 sk-cube"></div></div>';
}

function carga_loading_06(containerid){
    var oDiv = document.getElementById(containerid);
    oDiv.style.display='block';
    oDiv.style.visibility= "visible";
    document.getElementById(containerid).innerHTML= '<div class="lds-hourglass"></div>';
}

function carga_loading_07(containerid){
    var oDiv = document.getElementById(containerid);
    oDiv.style.display='block';
    oDiv.style.visibility= "visible";
    document.getElementById(containerid).innerHTML= '<div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>';
}

function carga_loading_08(containerid){
    var oDiv = document.getElementById(containerid);
    oDiv.style.display='block';
    oDiv.style.visibility= "visible";
    document.getElementById(containerid).innerHTML= '<div class="spinner1"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>';
}


function DirectPage(route) {
    carga_loading_02('div_contenido_body');
    $.get(route, function (data) {
        $("#div_contenido_body").html(data);
    });
}

