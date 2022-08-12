var items = Array();

$( document ).ready(function() {
   var ajax = __ajax("https://noanlearning.space/profesores/listarCursos");
    ajax.done(function(response){ 
        $items=JSON.parse(response);
        if($items.estado==1){
            $("#listaCursos").html(crearHtml($items.items));
            $("#listaCursos2").html(crearHtmlCurso($items.items));
        }
    });
});

function crearHtmlCurso(lista) {
    var html = "";
    for (var i in lista) {
        html += `<option value="`+lista[i].id_curso+`">`+lista[i].codigo_curso+`</option>`;
    }
    return html;
}

function crearHtml(lista) {
    var html = "";
    for (var i in lista) {
        html += `<option value="` + lista[i].id_curso + `">` + lista[i].codigo_curso + " - " + lista[i].fecha_inicio + " - " +lista[i].fecha_fin+ ` </option>`;
    }
    return html;
}

$( document ).on("click","#agregar",function(e) {
    e.preventDefault();
    var estudiante = new Object();
    estudiante.codigo=$("#codigo").val();
    estudiante.nombre=$("#nombre").val();
    estudiante.apellido=$("#apellido").val();
    estudiante.correo=$("#correo").val();
    estudiante.institucion=$("#institucion").val();
    estudiante.curso=$("#listaCursos").val();
    var ajax = __ajax2("https://noanlearning.space/profesores/agregar/alumno",JSON.stringify(estudiante));
     ajax.done(function(response){ 
        var estudiante=JSON.parse(response);
        if (estudiante.estado==1) {
            $("#agregar").html("estudiante Agregado");
            setTimeout(function(){
                $("#agregar").html("Agregar Estudiante");
            },2000)
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


function agregarMasiva(){
    var formulario = document.getElementById('formulario');
    var masiva = document.getElementById('masiva');
    masiva.style.display = 'block';
    formulario.style.display = 'none';
}


function displayHTMLTable(results) {
    var table = "<h2>Se van a agregar los siguientes Alumnos:</h2><table class='table'><tr><td>Nombre</td><td>Apellido</td><td>Correo</td><td>Código</td><td>Institucion</td></tr>";
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


$(document).on("click", "#Subir", function(e) {
    e.preventDefault();
    var id_curso = $('#listaCursos2').val();
    var data = Array();
    data.push(id_curso);
    data.push(items);
    console.log(data);
    var prof=JSON.stringify(data);
    var ajax = __ajax2("https://noanlearning.space/profesores/agregarAlumnos", data);
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

