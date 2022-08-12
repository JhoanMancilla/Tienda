var inputBloqueado=false;
var tipo1Normalizacion=true;
var campoVarInicial=document.getElementById('variableInicial');
var campoVarTerminales=document.getElementById('variablesTerminales');
var campoVarNoTerminales=document.getElementById('variablesNoTerminales');
var campoSigma=document.getElementById('sigma');
var mensajesInformacion=document.getElementById('labelMensajes');


//utlis
function __ajax(url) {
    var ajax = $.ajax({
        type: 'GET',
        
        url: url
    })
    return ajax;
} 
function __ajax2(url, dato) {
    var ajax = $.ajax({
        type: 'POST',
        url: url,
        
        data: { 'data': dato }
    })
    return ajax;
}




//funciones de pantalla
function cargarPrueba(){
    var ajax = __ajax("https://noan-learning.herokuapp.com/example");
    ajax.done(function(response){ 
        console.log(response)
        var respuesta=JSON.parse(response);
        console.log(respuesta);
        campoVarTerminales.innerHtml(respuesta.variablesTerminales);
        campoVarNoTerminales.innerHtml(respuesta.variablesNoTerminales);
        campoSigma.innerHtml(respuesta.sigma);
        
     });

}
function clean(){
            actualizarPantantalla("","","","","Escoge el paso que deseas:",false,true)
}
function actualizarPantantalla(sigma,terminales,noTerminales,inicial,mensajeAlerta,inputBloqueadoP,tipoNormalizacion){
    this.inputBloqueado=inputBloqueadoP;
    this.tipo1Normalizacion=tipoNormalizacion        
    campoSigma.innerHtml=sigma;
            campoVarTerminales.innerHtml=terminales;
            campoVarNoTerminales.innerHtml=noTerminales;
            campoVarInicial.innerHtml=inicial;
            mensajesInformacion.innerHtml=mensajeAlerta
            if(inputBloqueado){
                campoSigma.disabled=inputBloqueado;
                campoVarTerminales.disabled=inputBloqueado;
                campoVarInicial.disabled=inputBloqueado;
                campoVarNoTerminales.disabled=inputBloqueado;
            }
           cambiarNormalizacion();
}
function cambiarNormalizacion(){
    if(tipo1Normalizacion){
        document.getElementById(' panelOperacionesChomsky').style.display = 'block';
        document.getElementById(' panelOperacionesGreibach').style.display = 'none';
    }else{
        document.getElementById(' panelOperacionesChomsky').style.display = 'none';
        document.getElementById(' panelOperacionesGreibach').style.display = 'block';
    }
}

function validarCamposNoVacios(){

    
    var rta=
        campoSigma.value!="" &&
        campoVarInicial.value!=""&&
        campoVarTerminales.value!=""&&
        campoVarNoTerminales.value!="";

        return rta;
}

function validarCamposCorrectos(){
    if(validarCamposNoVacios()==false){
        alert("hay campos vacios, verifique");
        mensajesInformacion.innerHTML="hay campos vacios, verifique";
        return false;
    }
 
    return validarInicial() &&validarSigma();
}

function validarSigma(){
    return true;
}

function validarInicial(){

   var n= campoVarInicial.value.split(",").length;
   if(n>1){
    alert("solo puede haber una variable inicial");
       return false;
       
    }
   var terminales = campoVarTerminales.value.split(",");
   for (var i=0; i < terminales.length; i++) {
    if(terminales[i] == campoVarInicial.value);
    return true;
 }
 mensajesInformacion.innerHTML="la variable Inicial no existe dentro del conjunto de variables Terminales";
 return false;
}

function volverPaso(){

}

function prepararPeticion(paso){
    console.log("preparando");
    if(validarCamposCorrectos()!=true){
        alert("existen campos malformados, revise")
        mensajesInformacion.innerHtml="por favor, revise que los campos estén escritos correctamente";
        return ;
    }
    var peticion=new Object();
    peticion.paso=paso;
    peticion.codeResponse="";
    peticion.sigma=campoSigma.value;
    peticion.variablesNoTerminales=campoVarNoTerminales.value;
    peticion.variablesTerminales=campoVarTerminales.value;
    peticion.variableInicial=campoVarInicial.value;
    console.log(peticion);
}


//operaciones sobre Gramaticas
function eliminarVariablesInutiles(){
      var peticion= prepararPeticion("uselessVar");
     procesarRespuesta(peticion);
}

function eliminarVariablesInalcanzables(){
    var peticion= prepararPeticion("unreachableVar");
    procesarRespuesta(peticion);
}

function eliminarVariablesNulas(){
    var peticion= prepararPeticion("nullVar");

    procesarRespuesta(peticion);
    
}


function eliminarVariablesUnitarias(){
    var peticion=prepararPeticion("unitaryVar");
    procesarRespuesta(peticion);
}
function NormalizarChomsky(){
    var peticion=prepararPeticion("resolveChomsky");
    procesarRespuesta(peticion);
}
function eliminarRecursividad(){
    var peticion=prepararPeticion("deleteRecursivity");
    procesarRespuesta(peticion);
}
function eliminarRecursividadInmediata(){
    var peticion=prepararPeticion("deleteLeftRecursivity");
    procesarRespuesta(peticion);
}

function normalizarAChomsky(){
    var peticion= prepararPeticion("stepFullComsky");
    procesarRespuesta(peticion);
}

function procesarRespuesta(peticion){
    var ajax = __ajax2("https://noan-learning.herokuapp.com/step",JSON.stringify(peticion));
    ajax.done(function(response){ 
        console.log(response)
        var respuesta=JSON.parse(response);
        if (respuesta.codeResponse==500) {
            campoVarTerminales.innerHtml(respuesta.variablesTerminales);
            campoVarNoTerminales.innerHtml(respuesta.variablesNoTerminales);
            campoSigma.innerHtml(respuesta.sigma);
        }else{
            switch(respuesta.codeResponse){
                case "error-integrity":
                    break;
                case "error-logic":
                    "error Interno, discule las molestias"
                    break
                    case "incorrec-answer":
                        return"Respuesta Incorrecta"
                    case "operation404":
                        mensajesInformacion.innerHTML="paso solicitado no encontrado o aun no implementado"
                    break;
            }
        }
     });
}