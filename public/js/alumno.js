$( document ).on("click","#cerrar",function() {
    var ajax = __ajax("https://noanlearning.space/login/cerrarSesion");
     ajax.done(function(response){ 
         window.location="https://noanlearning.space/";
     });
 });


$( document ).ready(function() {
   var ajax = __ajax("https://noanlearning.space/alumnos/listarEjercicios");
    ajax.done(function(response){ 
        $items=JSON.parse(response);
        if($items.estado==1){
            $("#tareas").html(crearHtml($items.items));
        }else{
            
        }
    });

    var ajax = __ajax("https://noanlearning.space/alumnos/listarQuices");
    ajax.done(function(response){ 
        $items=JSON.parse(response);
        if($items.estado==1){
            $("#quices").html(crearHtml($items.items));
        }else{
            
        }
    });
});


function __ajax(url) {
    var ajax = $.ajax({
        type: 'POST',
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

function crearHtml(lista) {
    var html = "";
    for (var i in lista) {
        c=i;
        c++;
        html += `<div class="card border-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Tarea `+c+`</div>
                <div class="card-body text-danger">
                  <h5 class="card-title">`+lista[i].titulo+`</h5>
                  <p class="card-text">`+lista[i].descripcion+`</p>
                  <p class="card-text">Tipo: `+lista[i].tipo_ejercicio+`</p>
                  <p class="card-text"><small class="text-muted">FECHA LIMITE: `+lista[i].fecha_fin+`</small></p></div></div>`;
    }
    return html;
}

