<?php
    /*Este archivo se trata de la función para conectarse a la base de datos.
     Para mi página, utilicé una sola base de datos con 3 tablas; usuarios,
     publicaciones y respuestas.  
     */
    function conectar(){
        $servername = "localhost";
        $database  = "fasfu";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername,$username,$password,$database);

        if(!$conn){
            die("Error; La conexión no se realizó correctamente" . mysqli_connect_error());
        }
        //echo "Conexión correcta";
        //echo "<p>";
        $cbd = mysqli_select_db($conn, $database);
        if(!$cbd){
            die("Error de conexión con la base de datos");
        }
        //echo "Conexión a ". $database . " correcta";
       // echo "<p>";
        return($conn);
    }
?>