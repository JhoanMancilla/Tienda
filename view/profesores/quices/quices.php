<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>agregar quiz</title>
	<script src="https://kit.fontawesome.com/a9633e48d1.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo constant('URLCSS');?>agregarQuiz.css?1">
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
	<div class="login">
	<h1 id="tituloLogin">Agregar Quiz</h1>
    <form method="post">
    	<input type="text" name="u" id="titulo" placeholder="Titulo" required="required" />
		<text>Descripcion</text>
        <textarea type="text" name="u" id="descripcion" placeholder="Descripcion" required="required"> </textarea>
		<text>Fecha Inicio</text>
        <input type="date" name="u" id="fechaInicio" required="required" />
		<text>Fecha Fin</text>
        <input type="date" name="u" id="fechaFin" required="required" />
		<select id="listaCursos">
        	
        </select>
        <button type="submit" class="btn btn-primary btn-block btn-large" id="agregar">Agregar Quiz</button><br>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo constant('URLJS');?>quices.js?4"></script>
</body>
</html>