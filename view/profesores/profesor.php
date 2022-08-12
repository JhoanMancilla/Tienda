<html>
    <head>
        <meta charset="utf-8">
        <script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URLCSS');?>dataTable.css?1">
        <script language="JavaScript" src="<?php echo constant('URLJS');?>dataTable.js?1" type="text/javascript"></script>
        <script src="https://kit.fontawesome.com/a9633e48d1.js" crossorigin="anonymous"></script>
        <title>Pagina Principal</title>
        <link rel="shortcut icon" href="<?php echo constant('URLIMG');?>logoApiDos.png">
        <link rel="stylesheet" href="<?php echo constant('URLCSS');?>profesores.css?1">
        <link rel="stylesheet" href="<?php echo constant('URLCSS');?>agregarProfesor.css?1">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
            <header>
                <div class="contenedor">
                    <div class="menu">
                        <img href="<?php echo constant('URLCSS');?>admin.css?1" class="logotipo">
                        <nav>
                            <a href="ejercicios/">Ejercicios</a>
                            <a href="quices">Quices</a>
                            <a href="clases">Crear clase</a>
                            <a id="cerrar"><i class="fas fa-sign-out-alt"></i></a>
                        </nav>
                    </div>
                </div>
            </header>
        <div id="cuerpo">
            <div class="container">
                <div class="row">
                    <h2 class="text-center">Lista de Cursos</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                              <label for="cursos">Elegir un curso:</label>
                              <select name="curso" id="cuerpoCurso">
                                  
                              </select>
                              <br><br>
                              <input type="submit" value="Cargar Alumnos" onclick="infoAlumnos()">
                    </div>
                </div>
            </div><br>
            <div class="container">
                <div class="row">
                    <h2 class="text-center">Lista de estudiantes</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody id="cuerpoTabla">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><br>
            <div class="boton">
                <input onclick="window.location.href='/profesores/agregar'" type="submit" value="Agregar">
            </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script language="JavaScript" src="<?php echo constant('URLJS');?>profesor.js?1" type="text/javascript"></script>
        <script language="JavaScript" src="<?php echo constant('URLJS');?>papaparse.min.js" type="text/javascript"></script>
    </body>
</html>