<html>
    <head>
        <meta charset="utf-8">
        <script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
        <script language="JavaScript" src="<?php echo constant('URLJS');?>script.js?1" type="text/javascript"></script>
        <script src="https://kit.fontawesome.com/a9633e48d1.js" crossorigin="anonymous"></script>
        <title>Pagina Principal</title>
        <link rel="shortcut icon" href="<?php echo constant('URLIMG');?>logoApiDos.png">
        <link rel="stylesheet" href="<?php echo constant('URLCSS');?>administrador.css?1">
        <link rel="stylesheet" href="<?php echo constant('URLCSS');?>agregarProfesor.css?1">
    </head>
    <body>
            <header>
                <div class="contenedor">
                    <div class="menu">
                        <img src="<?php echo constant('URLIMG');?>logoApiDos.png" class="logotipo">
                        <nav>
                            <a id="cerrar"><i class="fas fa-sign-out-alt"></i></a>
                        </nav>
                    </div>
                </div>
            </header>
        <div id="cuerpo">
            <div class="container">
                <div class="row">
                    <h2 class="text-center">Lista de docentes</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Codigo</th>
                                <th>Correo</th>
                                <th>Institución</th>
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
                <input onclick="window.location.href='/administrador/agregar'" type="submit" value="Agregar">
            </div>
        
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script language="JavaScript" src="<?php echo constant('URLJS');?>admin.js?1" type="text/javascript"></script>
        <script language="JavaScript" src="<?php echo constant('URLJS');?>papaparse.min.js" type="text/javascript"></script>
    </body>
   
</html>