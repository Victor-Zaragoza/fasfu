<?php
    //Comprobamos sesión abierta
    session_start();
    
    //Si el parámetro corresponde
    if(@$_GET['salir']== "true"){
        session_unset();
        session_destroy();
    }
    
    //Direccionamiento a página principal => index
    header('Location: index.php');
?>
