<?php
//Comprobamos sesión abierta
session_start();

/* Si el la variable SESSION['user'] no existe
 *  o no es admin regresamos a index.php */
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario'] != "administrador") {
        header('Location:index.php');
    }
} else {
    header('Location:index.php');
}
?>
<html>
    <head>
        <title>ADMINISTRACI&Oacute;N</title> 
        <link rel="stylesheet" type="text/css" href="css/estilo_general.css"> 
    </head>
    <body>
        <?php
        //Agregamos el menú o encabezado.
        include ("encabezados.php");
        menu();
        ?>
        <div class="base" align="center">
            <br><br>
            <h1 align="center">ADMINISTRACIÓN FASFU</h1>
            <br><br><br>
            <p align="justify">
                Bienvenido a la administración de Fasfu, este apartado sirve para modificar,
                agregar o eliminar registros relacionados con los usuarios, restaurantes y platillos,
                además podrás enviar mensajes a los usuarios registrados.
            </p>
            <br><br>
            <!--Mostramos las opciones al administrador-->
            <a href="principal-administracion.php?tipo=1"><button class="btn">Administración de usuarios</button></a><br><br>
            <a href="principal-administracion.php?tipo=2"><button class="btn">Administración de restaurantes</button></a><br><br>
            <a href="principal-administracion.php?tipo=3"><button class="btn">Administración de platillos/bebidas</button></a><br><br>
        </div>
    </body>
</html>

