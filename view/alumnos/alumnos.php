<html>
    <head>
        <meta charset="utf-8">
        <title>Pagina Principal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a9633e48d1.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="<?php echo constant('URLIMG');?>logoApiDos.png">
        <link rel="stylesheet" href="<?php echo constant('URLCSS');?>alumnos.css?1">
    </head>
    <body>
        <header>
            <div class="contenedor">
                 <div class="menu">
                    <img src="<?php echo constant('URLIMG');?>logoApiDos.png" class="logotipo">
                    <nav>
                        <a href="#">Quices</a>
                        <a id="cerrar"><i class="fas fa-sign-out-alt"></i></a>
                    </nav>
                </div>
            </div>
        </header>
        <div class="titulo">
            <h1 class="display-6">Progreso</h1><br>
        </div>
        <div class="barraprog">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
        </div><br><br><br>
        <div class="titulo">
            <h1 class="display-6">Actividades a realizar</h1><br>
        </div>
        <div class="tareas" id="tareas">
            
        </div>
        <br>
         <div class="titulo">
            <h1 class="display-6">Quices a realizar</h1><br>
        </div>
        <div class="tareas" id="quices">
            
        </div>
        





        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script language="JavaScript" src="<?php echo constant('URLJS');?>alumno.js?2" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>