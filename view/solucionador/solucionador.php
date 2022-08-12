<html>
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/a9633e48d1.js" crossorigin="anonymous"></script>
        <title>Pagina Principal</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo constant('URLIMG');?>logoApiDos.png">
        <link rel="stylesheet" href="<?php echo constant('URLCSS');?>resolverEjercicio.css">
    </head>
    <body>
        <header>
            <nav class="navbar">
                <div class="contenedor">
                <a href="/"><img src="<?php echo constant('URLIMG');?>logoApiDos.png" class="logotipo"></a>
                <a href="login/" class="seccionMenu">Iniciar Sesion</a>
                </div>
            </nav>
        </header>
        <div class="center">
            <div class="inputs">
                <text>Variable Inicial</text>
                <input id="variableInicial"type="text" placeholder="Z" class="inputsHijos" onchange="validarInicial()">
                <text>Variables Terminales</text>
                <input id="variablesTerminales"type="text" placeholder="A,B,C" class="inputsHijos">
                <text>Variables No Terminales</text>
                <input id="variablesNoTerminales"type="text" placeholder="0,1,2" class="inputsHijos">
                <text>Sigma</text>
                <textarea id="sigma"type="text" class="inputsigma" placeholder="A->B1CD/GF/BDG/1" onchange="validarSigma()"></textarea>
                <label id="labelMensajes"></label>
                <div id="panelOperacionesChomsky">  
                    <button onClick="eliminarVariablesInutiles();" class="botonhijo">Eliminar Variables Inutiles</button>
                    <button onClick="eliminarVariablesInalcanzables();"class="botonhijo">Eliminar Variables Inalcanzables</button>
                    <button onClick="eliminarVariablesNulas();"class="botonhijo">Eliminar Variables Nulas</button>
                    <button onClick="eliminarVariablesUnitarias();"class="botonhijo">Eliminar Variables Unitarias</button>
                    <button onClick="NormalizarChomsky();"class="botonChomsky">Normalizar a Chomsky</button> 
                </div>  
                <div id="panelOperacionesGreibach" style="display: none;">  
                    <button onClick="eliminarRecursividad();" class="botonhijo">Eliminar Recursividad</button>
                    <button onClick="eliminarRecursividadInmediata();"class="botonhijo">Eliminar Recursividad inmediata</button>
                </div> 

            </div>
        </div>
        <div class="center">
            <div class="botones">
                <button onClick="cargarPrueba();"id="buttoncargarPrueba" class="botonhijo">Cargar Caso de Prueba </button>
                <button onClick="clean();"id="buttonLimpiar"class="botonhijo">Limpiar </button>
                <button onClick="cambiarNormalizacion();"id="buttonCambiarTipoNormalizacion" class="botonhijo">Cambiar A Greibarch</button>
            </div><br>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?php echo constant('URLJS');?>solucionador.js?1"></script>
    </body>
</html> 