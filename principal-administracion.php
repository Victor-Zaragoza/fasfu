<?php
//Comprobamos sesión abierta
session_start();

if (isset($_SESSION['usuario'])) {//Si la variable SESSION['user'] existe
    if ($_SESSION['usuario'] != "administrador") { //Si no es admin
        header('Location:index.php');
    }
} else {//Si no existe usuario registrado
    header('Location:index.php');
}
if (!isset($_GET['tipo'])){//Si no existe la variable 
    header('Location:menu-administracion.php');
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>ADMINISTRACIÓN DE PÁGINA</title>
        <link rel="stylesheet" type="text/css" href="css/estilo_general.css"> 
    </head>
    <body>
        <?php
        //Agregamos el menú o encabezado.
        include ("encabezados.php");
        menu();
        //Llamar a la función que cree la vista de administración deseada
        include ("tablas-generales.php");
        
        //Se usa un filtro para saber que parámetro mandar a la función
        if($_GET['tipo'] == 1){//Administración de usuarios
            listado(1);
        }elseif ($_GET['tipo'] == 2) {//Administración de restaurantes
            listado(2);            
        }elseif($_GET['tipo'] == 3) {//Administración de platillos/bebidas
            listado(3);
        }   
        ?>
        <br><br>
    </div>
</body>
</html>