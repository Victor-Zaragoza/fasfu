<?php
    session_start();
   
    if(isset($_POST['AgregaCarrito'])){
        
        //Tomará la columna de ID_platillo de la session carrito
        $id_plat= array_column($_SESSION['carrito'], "id_platillo");
        
        //Si el platillo no se encuentra en el carrito lo agrega
        if(!in_array($_GET['id_platillo'], $id_plat)){
                $datos_de_sesion= array(
                'id_platillo' => $_GET['id_platillo'],
                'nombre' => $_POST['nombre'],
                'precio' => $_POST['precio'],
                'cantidad' => $_POST['cantidad']
            );
            
            $_SESSION['carrito'][]= $datos_de_sesion;
            
            echo'<script type="text/javascript">
                alert("Producto añadido al carrito");
                window.location.href="index.php";
                </script>';
        }
        
        //Si ya se encuentra lo actualiza
        else{
            $datos_de_sesion= array(
                'id_platillo' => $_GET['id_platillo'],
                'nombre' => $_POST['nombre'],
                'precio' => $_POST['precio'],
                'cantidad' => $_POST['cantidad']
            );
            
            foreach ($_SESSION['carrito'] as $key =>$value){
                if($value['id_platillo']==$_GET['id_platillo'])
                    unset($_SESSION['carrito'][$key]);
            }
            
            $_SESSION['carrito'][]= $datos_de_sesion;
             echo'<script type="text/javascript">
                alert("Producto actualizado en el carrito");
                window.location.href="index.php";
                </script>';     
       }
    
    }
?>
