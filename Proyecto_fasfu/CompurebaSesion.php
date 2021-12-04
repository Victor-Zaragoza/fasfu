<?php
    include('MysqlConn.php');
    $conn= conectar();
    session_start();
    
    if(isset($_POST['AgregaCarrito'])){
        if (isset($_SESSION['usuario'])){
            $id_sesion= array_column($_SESSION['usuario'], "id_platillo");
            
            if(!in_array($_GET['id_platillo'], $id_sesion)){
                $datos_de_sesion= array(
                'id_platillo' => $_GET['id_platillo'],
                'nombre' => $_POST['nombre'],
                'precio' => $_POST['precio'],
                'cantidad' => $_POST['cantidad']
            );
            
            $_SESSION['usuario'][]= $datos_de_sesion;
            }
        }
        else{
            $datos_de_sesion= array(
                'id_platillo' => $_GET['id_platillo'],
                'nombre' => $_POST['nombre'],
                'precio' => $_POST['precio'],
                'cantidad' => $_POST['cantidad']
            );
            
            $_SESSION['usuario'][]= $datos_de_sesion;
            
        }
   }
    
 ?>
