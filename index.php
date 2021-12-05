<?php
//Comprobamos sesión abierta
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="css/estilo_general.css">   
        <link rel="stylesheet" type="text/css" href="css/estilo_horizontal.css">  
        <script type="text/javascript" language="JavaScript">
            function consultaPlatillos(filtro, id){
                document.Filtro.busqueda.value = filtro;
                document.Filtro.id.value = id;
                document.Filtro.submit();
            }
        </script>
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
            <br><br>
            <?= secciones(1); ?>
            <!-- Seccion Tipos -->
            <br><br>
            <?= secciones(2); ?>
            <!-- Seccion Subtipos -->
            <br><br>
            <?= secciones(3); ?>
            <br><br>
        </div>
        
        <form name="Filtro" id="Filtro" method="post" action="vista-platillos.php" hidden>
            <input name="busqueda" id="busqueda" type="text" value="">
            <input name="id" id="id" type="text" value="">
        </form>
    </body>
</html>