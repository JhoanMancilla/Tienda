var valorInicial="";
$(document).on("click", "#submit-login", function(e) {
    e.preventDefault();
    var usuario =new Object();
    usuario.correo=$("#username").val();
    usuario.clave=$("#password").val();
    var ajax = __ajax2("https://noanlearning.space/login/validar",JSON.stringify(usuario));
    ajax.done(function(response){
       var login=JSON.parse(response);
       if (login.estado==1) {
        $("#submit-login").val("Bienvenido Administrador");
        setTimeout(function(){
            $("#submit-login").html("Entrar");
            window.location="https://noanlearning.space/administrador/";
        },2000);
       }else if(login.estado==2){
        $("#submit-login").val("Bienvenido Profesor");
        setTimeout(function(){
            $("#submit-login").html("Entrar");
           window.location="https://noanlearning.space/profesores/";
        },2000);
            $("#submit-login").html("Bienvenido Alumno");
       }else if(login.estado==3){
            setTimeout(function(){
                $("#submit-login").html("Entrar");
                window.location="https://noanlearning.space/alumnos/";
            },2000);
            
       }else{
        $("#submit-login").css("background","linear-gradient(top, #c43177, #d44a4a)");
        $("#submit-login").html("Error De Credenciales");
        setTimeout(function(){
            $("#submit-login").css("background-color","#4a77d4");
            $("#submit-login").html("Entrar");
        },2000)
       }
    });
});

$(document).on("click","#switch",function(e){
    var cambio = $(this).val();
    valorInicial=cambio;
    $("#tituloLogin").html("Login " + cambio);
});

function __ajax2(url, dato) {
    var ajax = $.ajax({
        type: 'POST',
        url: url,
        data: { 'data': dato }
    })
    return ajax;
}
