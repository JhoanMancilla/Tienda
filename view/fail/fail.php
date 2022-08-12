<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Error 404</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .centrar{
                display: flex;
                justify-content: center;
            }

            body{
                background: #f87171;
            }

            .container-404{
                text-align: center;
                width: 100%;
                max-width: 600px;
                padding: 100px;
                line-height: 1.7;
                color: #fff;
                
            }

            div h1{
                font-size: 120px;
            }

            div p{
                font-size: 20px;
            }

            .boton{
                display: inline-block;
                margin-top: 15px;
                text-decoration: none;
                color: #fff;
                padding: 5px 30px;
                border-radius: 20px;
                border: 2px solid #fff
            }

            .boton:hover{
                background: #56acac;
            }

        </style>
    </head>
    <body>
        <div class="centrar">
            <div class="container-404">
                <h1>404</h1>
                <p>Esta pagina no esta disponible, accede a nuestra Pagina principal.</p>
                <a href="" class="boton">Volver</a>
            </div>
        </div>
    </body>
</html>