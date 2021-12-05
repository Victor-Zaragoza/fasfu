<?php
//Función para conexión a base de datos
function conectar() {
    //Parámetros de conexión
    $servername = "localhost";
    $database = "fasfu";
    $username = "root";
    $password = "";

    //Creamos la conexión
    $conn = mysqli_connect($servername, $username, $password, $database);

    //Checamos la conexión
    if (!$conn) {
        die("ERROR: la conexión no se realizó correctamente" . mysqli_connect_error());
    }
    $cbd = mysqli_select_db($conn, $database);
    if (!$cbd) {
        die("ERROR DE CONEXIÓN CON LA BASE DE DATOS");
    }
    return($conn);
}

?>
