<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Agregar Alumno</title>
    <script src="https://kit.fontawesome.com/a9633e48d1.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo constant('URLCSS');?>agregarAlumno.css?1">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="contenedor">
                <a href="/"><img src="<?php echo constant('URLIMG');?>logoApiDos.png" class="logotipo"></a>
                <a id="cerrar"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>
    </header>
<div id="formulario">
	<div class="login">
	<h1 id="tituloLogin">Agregar Estudiante</h1>
    <form>
        <input type="number" name="u" id="codigo" placeholder="Codigo" required="required" />
    	<input type="text" name="u" id="nombre" placeholder="Nombre" required="required" />
        <input type="text" name="u" id="apellido" placeholder="Apellido" required="required" />
        <input type="email" name="u" id="correo" placeholder="Correo" required="required" />
        <input type="text" name="u" id="institucion" placeholder="Institucion" required="required" />
        <select id="listaCursos">
        	
        </select>
        <button type="submit" id="agregar" class="btn btn-primary btn-block btn-large" id="">Agregar Estudiante</button><br>
    </form>
    <button type="submit" class="btn btn-primary btn-block btn-large" id="agregarMasiva" onclick="agregarMasiva()">Agregar Masivamente desde CSV</button><br>
    <button type="submit" onclick="window.location.href='/profesores/'" class="btn btn-primary btn-block btn-large" id="submit-login">Volver</button>
    </div>
</div>
<div class="login" id="masiva" style="display: none;">
    <div class="row">
                    <div class="col-md-12">
                              <label for="cursos">Elegir el curso al que agregará los alumnos:</label>
                              <select name="curso" id="listaCursos2">
                              </select>
                    </div>
                </div>
    <form class="form-inline">
                <div class="form-group">
                    <label for="files">Importar con CSV:</label><br>
                    <label>El formato debe ir: "Nombre,Apellido,Correo,Código,Institución</label><br>
                    <input type="file" id="files" class="form-control" accept=".csv" required />
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" id="subir-archivo" class="btn btn-primary">Subir Archivo</button>
                    <button type="submit" onclick="location.reload()" class="btn btn-primary" id="submit-login">Volver</button>
                </div>   
            </form>
            <br />
    <div id="preCarga">
        
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo constant('URLJS');?>agregar.js?6"></script>
<script src="<?php echo constant('URLJS');?>papaparse.min.js?18"></script>
</body>
</html>