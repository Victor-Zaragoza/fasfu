<?php
//Comprobamos sesión abierta
session_start();
if (!isset($_POST['busqueda'])) {
    header('index.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PLATILLOS</title>
        <link rel="stylesheet" type="text/css" href="css/estilo_general.css">
        <style type="text/css">


            *{
                margin: 0px;
                padding: 0px;
            }
            body{
                font-family: arial;
            }
            .main{

                margin: 2%;
            }

            .card{
                width: 20%;
                display: inline-block;
                box-shadow: 2px 2px 20px black;
                border-radius: 5px; 
                margin: 2%;
            }

            .image img{
                width: 100%;
                border-top-right-radius: 5px;
                border-top-left-radius: 5px;



            }

            .title{

                text-align: center;
                padding: 10px;

            }

            h1{
                font-size: 20px;
            }

            .des{
                padding: 3px;
                text-align: center;

                padding-top: 10px;
                border-bottom-right-radius: 5px;
                border-bottom-left-radius: 5px;
            }
            button{
                margin-top: 40px;
                margin-bottom: 10px;
                background-color: white;
                border: 1px solid black;
                border-radius: 5px;
                padding:10px;
            }
            button:hover{
                background-color: black;
                color: white;
                transition: .5s;
                cursor: pointer;
            }

        </style>
    </head>
    <body>
        <?php
        //Agregamos el menú o encabezado.
        include ("encabezados.php");
        menu();

        //Agregamos archivo para secciones
        include ("funciones.php");

        //Agregamos archivo para conexión
        include ('mysql/MysqlConn.php');
        ?>
        <!-- Seccion Restaurantes -->
        <div class="base">
            <br>
            <?=seleccionarFiltro();?>
            <br><br>
        </div>

    </body>
</html>


