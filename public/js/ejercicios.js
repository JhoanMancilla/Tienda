var items = Array();

$(document).ready(function(){
    var ajax = __ajax("https://noanlearning.space/profesores/listarCursos");
    ajax.done(function(response){
        $items=JSON.parse(response);
        if($items.estado==1){
            $("#cuerpoCurso").html(crearHtmlCurso($items.items));
            $("#cuerpoCurso2").html(crearHtmlCurso($items.items));
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

$( document ).on("click","#cerrar",function() {
    var ajax = __ajax("https://noanlearning.space/login/cerrarSesion");
     ajax.done(function(response){ 
         window.location="https://noanlearning.space/";
     });
 });


function crearHtmlCurso(lista) {
    var html = "";
    for (var i in lista) {
        html += `<option value="`+lista[i].id_curso+`">`+lista[i].codigo_curso+`</option>`;
    }
    return html;
}


$('#subir-archivo').on("click",function(e){
    e.preventDefault();
    $('#files').parse({
        config: {
            delimiter: "auto",
            complete: displayHTMLTable,
        },
        before: function(file, inputElem)
        {
            //console.log("Parsing file...", file);
        },
        error: function(err, file)
        {
            //console.log("ERROR:", err, file);
        },
        complete: function()
        {
            //console.log("Done with all files");
        }
    });
});


function displayHTMLTable(results) {
    var table = "<h2>Se van a agregar los siguientes Ejercicios:</h2><table class='table'><tr><td>Titulo</td><td>Descripción</td><td>Fecha Inicio</td><td>Fecha Fin</td><td>Tipo</td></tr>";
    var data = results.data;
    for (i = 0; i < data.length; i++) {
        table += "<tr>";
        var row = data[i];
        var cells = row.join(",").split(",");
        items.push(cells);
        for (j = 0; j < cells.length; j++) {
            table += "<td> ";
            table += cells[j];
            table += "</th>";
        }
        table += "</tr>";
    }
    table += "</table>";
    table += "<button id='Subir'>Agregar Alumnos</button>";
    $("#preCarga").html(table);
}

function crearHtml2(lista) {
    var html = "";
    for (var i in lista) {
        html += `<tr>
            <td>` + lista[i].titulo + `</td>
            <td>` + lista[i].descripcion + `</td>
            <td>` + lista[i].fecha_inicio + `</td>
            <td>` + lista[i].fecha_fin + `</td>
            <td>` + lista[i].tipo_ejercicio + `</td>
            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" id="editar" value="`+lista[i].id+`"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" id="eliminar" value="`+lista[i].id+`"><span class="glyphicon glyphicon-trash"></span></button></p></td>
            </tr>`;
    }
    return html;
}


function infoEjercicios(){
    var id_curso = $('#cuerpoCurso').val();
    var ajax = __ajax2("https://noanlearning.space/profesores/listarEjercicios",id_curso);
    ajax.done(function(response){
        $items=JSON.parse(response);
        if($items.estado==1){
            $("#cuerpoTabla").html(crearHtml2($items.items));
        }else{
            alert("F");
        }
    });     
}


$(document).on("click", "#eliminar", function(e) {
    e.preventDefault();
    var ajax = __ajax2("https://noanlearning.space/profesores/eliminarEjercicio", $(this).val());
    ajax.done(function(response){ 
        $items=JSON.parse(response);
        if($items.estado==1){
            alert("Se ha eliminado");
            location.reload();
        }else{
            alert("Error");       
        }
    });
});


$(document).on("click", "#agregarEjercicio", function(e) {
    e.preventDefault();
    var ejercicio = Array();
    var id_curso = $('#cuerpoCurso').val();
    var tipo_ejercicio= $('#cuerpoTipo').val();
    var titulo = $('#titulo').val();
    var descripcion = $('#descripcion').val();
    var fecha_inicio = $('#fecha_inicio').val();
    var fecha_fin = $('#fecha_fin').val();
    var data = Array();
    ejercicio.push(titulo,descripcion,fecha_inicio,fecha_fin,tipo_ejercicio,id_curso);
    var ejercicio2=JSON.stringify(ejercicio);
    var ajax = __ajax2("https://noanlearning.space/profesores/agregarEjercicio", ejercicio);
    ajax.done(function(response){ 
        $items=JSON.parse(response);
        if($items.estado==1){
            alert("Se ha agregado");
            location.reload();
        }else{
            alert("Error");       
        }
    });
});




