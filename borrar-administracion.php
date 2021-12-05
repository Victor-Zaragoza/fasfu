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
if (isset($_POST['tabla']) and isset($_POST['id'])) {

    //Realizar y verificar conexion base de datos
    include 'mysql/MysqlConn.php';
    $conexion = conectar();

    if (!$conexion) {
        echo "ERROR";
    }
    $sql = "";

    switch ($_POST['tabla']) {
        case 1: $sql = "DELETE FROM usuario WHERE id_usuario = '" . $_POST['id'] . "'";
            break;
        case 2: $sql = "DELETE FROM restaurante WHERE id_restaurante = " . $_POST['id'];
            break;
        case 3: $sql = "DELETE FROM platillos_bebidas WHERE id_platillo = " . $_POST['id'];
            break;
    }

    $resultado = $conexion->query($sql);

    /* if ($conexion->query($sql) === TRUE) {
      mysqli_close($conexion);
      echo '<script type="text/javascript"> alert("Registro exitosamente eliminado."); '
      . 'window.location.href="menu-administracion.php";</script>';
      } */

    mysqli_close($conexion);
}
header('Location:menu-administracion.php');
?>
