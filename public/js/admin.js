var items = Array();

$( document ).ready(function() {
   var ajax = __ajax("https://noanlearning.space/administrador/listarProfesores");
    ajax.done(function(response){ 
        $items=JSON.parse(response);
        if($items.estado==1){
            $("#cuerpoTabla").html(crearHtml($items.items));
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


$(document).on("click", "#eliminar", function(e) {
    e.preventDefault();
    var ajax = __ajax2("https://noanlearning.space/administrador/eliminarProfesor", $(this).val());
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


$(document).on("click", "#Subir", function(e) {
    e.preventDefault();
    var prof=JSON.stringify(items);
    var ajax = __ajax2("https://noanlearning.space/administrador/agregarProfesores", prof);
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



function displayHTMLTable(results) {
    var table = "<h2>Se van a agregar los siguientes profesores:</h2><table class='table'><tr><td>Nombre</td><td>Apellido</td><td>Correo</td><td>Código</td><td>Institucion</td></tr>";
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
    table += "<button id='Subir'>Agregar Profesores</button>";
    $("#preCarga").html(table);
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

$(document).on("click", "#editar", function(e) {
    e.preventDefault();
    var ajax = __ajax2("https://noanlearning.space/administrador/listarProfesor", $(this).val());
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
    <h1 id="tituloLogin">Editar Docente `+item.nombre+`</h1>
    <div>
        <input type="hidden" name="u" id="id" value="`+item.id+`" required="required" />
        <input type="number" name="u" id="codigo" value="`+item.codigo+`" required="required" />
        <input type="text" name="u" id="nombre" value="`+item.nombre+`" required="required" />
        <input type="text" name="u" id="apellido" value="`+item.apellido+`" required="required" />
        <input type="email" name="u" id="correo" value="`+item.correo+`" required="required" />
        <input type="text" name="u" id="institucion" value="`+item.institucion+`" required="required" /><br><br>
        <button class="btn btn-primary btn-block btn-large" id="actualizarProfesor" onclick="actualizarProfesor()" >Actualizar Docente</button><br>
        <button type="submit" onclick="location.reload()" class="btn btn-primary btn-block btn-large" id="submit-login">Volver</button>
    </div>
</div></div>
    `;
return html;
}


function actualizarProfesor(){
    var profesor=Array();
    var id=$("#id").val();
    var codigo=$("#codigo").val();
    var nombre=$("#nombre").val();
    var apellido=$("#apellido").val();
    var correo=$("#correo").val();
    var institucion=$("#institucion").val();
    profesor.push(id,codigo,nombre,apellido,correo,institucion);
    var ajax = __ajax2("https://noanlearning.space/administrador/actualizarProfesor", JSON.stringify(profesor));
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

function agregarMasiva(){
    var formulario = document.getElementById('formulario');
    var masiva = document.getElementById('masiva');
    masiva.style.display = 'block';
    formulario.style.display = 'none';
}



function agregarSolo(){
    var profesor=Array();
    var codigo=$("#codigo").val();
    var nombre=$("#nombre").val();
    var apellido=$("#apellido").val();
    var correo=$("#correo").val();
    var institucion=$("#institucion").val();
    profesor.push(codigo,nombre,apellido,correo,institucion);
    console.log(profesor);
    var ajax = __ajax2("https://noanlearning.space/administrador/agregarProfesor", JSON.stringify(profesor));
    ajax.done(function(response){ 
        $items=JSON.parse(response);
        if($items.estado==1){
            alert("Agregado");
            location.reload();
        }else{
            alert("Error");       
        }
    });
}

