var items = Array();

$(document).ready(function(){
	var ajax = __ajax("https://noanlearning.space/profesores/listarCursos");
    ajax.done(function(response){
        $items=JSON.parse(response);
        if($items.estado==1){
            $("#cuerpoCurso").html(crearHtmlCurso($items.items));
            $("#cuerpoCurso2").html(crearHtmlCurso($items.items));
        }else{
            alert("F");
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

$( document ).on("click","#cerrar",function() {
    var ajax = __ajax("https://noanlearning.space/login/cerrarSesion");
     ajax.done(function(response){ 
         window.location="https://noanlearning.space/";
     });
 });

function crearHtml(lista) {
    var html = "";
    for (var i in lista) {
        html += `<tr>
            <td>` + lista[i].codigo_curso + `</td>
            <td>` + lista[i].fecha_inicio + `</td>
            <td>` + lista[i].fecha_fin + `</td>
 </tr>`;
    }
    return html;
}

function crearHtmlCurso(lista) {
    var html = "";
    for (var i in lista) {
        html += `<option value="`+lista[i].id_curso+`">`+lista[i].codigo_curso+`</option>`;
    }
    return html;
}

function crearHtml2(lista) {
    var html = "";
    for (var i in lista) {
        html += `<tr>
            <td>` + lista[i].nombre + `</td>
            <td>` + lista[i].apellido + `</td>
            <td>` + lista[i].codigo + `</td>
            <td>` + lista[i].correo + `</td>
            <td>` + lista[i].institucion + `</td>
            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" id="editar" value="`+lista[i].id+`"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" id="eliminar" value="`+lista[i].id+`"><span class="glyphicon glyphicon-trash"></span></button></p></td>
            </tr>`;
    }
    return html;
}



function infoAlumnos(){
	var id_curso = $('#cuerpoCurso').val();
	var ajax = __ajax2("https://noanlearning.space/profesores/listarAlumnos",id_curso);
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
    var ajax = __ajax2("https://noanlearning.space/profesores/eliminarAlumno", $(this).val());
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



function __ajax2(url, dato) {
    var ajax = $.ajax({
        type: 'POST',
        url: url,
        data: { 'data': dato }
    })
    return ajax;
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
    var id_curso = $('#cuerpoCurso2').val();
    var data = Array();
    data.push(id_curso);
    data.push(items);
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



$(document).on("click", "#editar", function(e) {
    e.preventDefault();
    var ajax = __ajax2("https://noanlearning.space/profesores/listarAlumno", $(this).val());
    ajax.done(function(response){ 
        $items=JSON.parse(response);
        if($items.estado==1){
            $("#cuerpo").html(displayEditar($items.items));
        }else{
            alert("Error");       
        }
    });


});


function displayEditar(item) {

var html = "";
    html += `<div class="cuerpo"><div class="login">
    <h1 id="tituloLogin">Editar Alumno `+item.nombre+`</h1>
    <div>
        <input type="hidden" name="u" id="id" value="`+item.id+`" required="required" />
        <input type="number" name="u" id="codigo" value="`+item.codigo+`" required="required" />
        <input type="text" name="u" id="nombre" value="`+item.nombre+`" required="required" />
        <input type="text" name="u" id="apellido" value="`+item.apellido+`" required="required" />
        <input type="email" name="u" id="correo" value="`+item.correo+`" required="required" />
        <input type="text" name="u" id="institucion" value="`+item.institucion+`" required="required" /><br><br>
        <button class="btn btn-primary btn-block btn-large" id="actualizarAlumno" onclick="actualizarAlumno()" >Actualizar Alumno</button><br>
        <button type="submit" onclick="location.reload()" class="btn btn-primary btn-block btn-large" id="submit-login">Volver</button>
    </div>
</div></div>
    `;
return html;
}


function actualizarAlumno(){
    var alumno=Array();
    var id=$("#id").val();
    var codigo=$("#codigo").val();
    var nombre=$("#nombre").val();
    var apellido=$("#apellido").val();
    var correo=$("#correo").val();
    var institucion=$("#institucion").val();
    alumno.push(id,codigo,nombre,apellido,correo,institucion);
    console.log(alumno);
    var ajax = __ajax2("https://noanlearning.space/profesores/actualizarAlumno", JSON.stringify(alumno));
    ajax.done(function(response){ 
        $items=JSON.parse(response);
        if($items.estado==1){
            alert("Actualizado");
            location.reload();
        }else{
            alert("Error");       
        }
    });
}


