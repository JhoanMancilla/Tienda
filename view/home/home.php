<html>
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/a9633e48d1.js" crossorigin="anonymous"></script>
        <title>Pagina Principal</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo constant('URLIMG');?>logoApiDos.png">
        <link rel="stylesheet" href="<?php echo constant('URLCSS');?>home.css">
    </head>
    <body>
        <header>
            <nav class="navbar">
                <div class="contenedor">
                    <img src="<?php echo constant('URLIMG');?>logoApiDos.png" class="logotipo">
                    <a href="login/">Iniciar Sesion</a>
                    <a href="solucionador">Resolver Ejercicio</a>
                </div>
            </nav>
            <div class="contenedor-imagen">
                <div class="imgprincipal">
                    <div class="fondo" id="fondo">
                        <h1 class="texto">FNC & FNG</h1>
                    </div>
                </div>
            </div>
        </header>
            <main class="container">
                <div class="row nosotros justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="subtitulo"><span>Definición</span></h2>
                        <h3 class="titulo">¿Que es?</h3>
                        <p>Gramática transformacional es una expresión que designa al tipo de gramática generativa que utiliza reglas transformacionales u otros mecanismos para representar el desplazamiento de constituyentes y otros fenómenos del lenguaje natural</p>
                    </div>
                </div>
                <div class="row gramatica">
                    <article class="col-12 text-center">
                        <h2 class="subtitulo"><span>Gramatica Formal</span></h2>
                        <h3 class="titulo">¿Que es?</h3>
                        <p>Es una estructura lógico-matemática con un conjunto de reglas de formación que definen las cadenas de caracteres admisibles en un determinado lenguaje formal o lengua natural. Las gramáticas formales aparecen en varios contextos diferentes: la lógica matemática, las ciencias de la computación y la lingüística teórica, frecuentemente con métodos e intereses divergentes.</p>
                    </article>
                </div>
                <div class="fnc">
                    <div class="col-12 text-center">
                        <h2 class="subtitulo"><span>Forma Normal de Chomsky</span></h2>
                        <h3 class="titulo">Definición</h3>
                        <p>Una gramática formal está en Forma normal de Chomsky si todas sus reglas de producción son de alguna de las siguientes formas:<br><br> A->BC o<br> A->α.<br><br> Donde A, B y C son simbolos no terminales (o variables) y α es un simbolo terminal.<br> Todo lenguaje independiente del contexto que no posee a la cadena vacía, es expresable por medio de una gramática en forma normal de Chomsky (GFNCH) y recíprocamente. Además, dada una gramática independiente del contexto, es posible algorítmicamente producir una GFNCH equivalente, es decir, que genera el mismo lenguaje.</p>
                    </div>
                </div>
                <div class="fng">
                    <div class="col-12 text-center">
                        <h2 class="subtitulo"><span>Forma Normal de Greibach</span></h2>
                        <h3 class="titulo">Definición</h3>
                        <p>Una gramática independiente del contexto (GIC) está en Forma normal de Greibach (FNG) si todas y cada una de sus reglas de producción tienen un consecuente que empieza por un carácter del alfabeto, también llamado símbolo terminal. Formalmente, cualquiera de las reglas tendrá la estructura:<br><br>A-> αw<br><br>Donde "A" es el antecedente de la regla, que en el caso de las GIC debe ser necesariamente un solo símbolo auxiliar. Por su parte, "a" es el mencionado comienzo del consecuente y, por tanto, un símbolo terminal. Finalmente, "w" representa una concatenación genérica de elementos gramaticales, esto es, una sucesión exclusivamente de auxiliares, inclusive, pudiera ser la palabra vacía; en este caso particular, se tendría una regla llamada "terminal":<br><br>A->α<br><br>Existe un teorema que prueba que cualquier GIC, cuyo lenguaje no contiene a la palabra vacía, si no lo está ya, se puede transformar en otra equivalente que sí esté en FNG. Para su demostración, normalmente, se procede por construcción, es decir, se plantea directamente un algoritmo capaz de obtener la FNG a partir de una GIC dada.</p>
                    </div>
                </div>
                <div class="row quienessomos">
                    <article class="col-12 text-center">
                        <h2 class="subtitulo"><span>Quienes Somos</span></h2>
                        <h3 class="titulo">Equipo de Trabajo</h3>
                    </article>

                    <div class="col-12">
                        <div class="row justify-content-center">
                            <article class="col-6 col-lg-3 py-1">
                                <figure class="persona">
                                    <img src="<?php echo constant('URLIMG');?>CristianLopez.jpg" class="img-fluid">
                                    <figcaption class="overlay">
                                        <p class="overlay-texto">Cristian Lopez</p>
                                    </figcaption>
                                </figure>
                            </article>

                            <article class="col-6 col-lg-3 py-1">
                                <figure class="persona">
                                    <img src="<?php echo constant('URLIMG');?>DaniloQuintero.jpg" class="img-fluid">
                                    <figcaption class="overlay">
                                        <p class="overlay-texto">Danilo Quintero</p>
                                    </figcaption>
                                </figure>
                            </article>

                            <article class="col-6 col-lg-3 py-1">
                                <figure class="persona">
                                    <img src="<?php echo constant('URLIMG');?>JhoanMancilla.jpg" class="img-fluid">
                                    <figcaption class="overlay">
                                        <p class="overlay-texto">Jhoan Mancilla</p>
                                    </figcaption>
                                </figure>
                            </article>

                            <article class="col-6 col-lg-3 py-1">
                                <figure class="persona">
                                    <img src="<?php echo constant('URLIMG');?>eduado.jpeg" class="img-fluid">
                                    <figcaption class="overlay">
                                        <p class="overlay-texto">Eduardo Pico</p>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                </div>
            </main>
            <div class="container-fluid">
                <footer class="row justify-content-center fotercito">
                    <div class="col-auto">
                        <a href="#"><img src="<?php echo constant('URLIMG');?>facebook.png"></a>
                        <a href="#"><img src="<?php echo constant('URLIMG');?>instagram.png"></a>
                        <a href="#"><img src="<?php echo constant('URLIMG');?>twitter.png"></a>
                    </div>
                </footer>
                <div class="row justify-content-center copy">
                        <h4>@ 2021 Copyright: FNC & FNG</h4>
                </div>
            </div>


            <script src="<?php echo constant('URLJS');?>home.js"></script>
    </body>
</html>