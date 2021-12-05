<?php
    include ("CompruebaSesion.php");
    $date = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Carrito Compras </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
     <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h2>Productos seleccionados</h2>
                        <?php
                            $total=0;  
                            $salida= "";
                            $salida .=" 
                                <table class= 'table table-bordered table-striped'>
                                  <tr>
                                    <th>ID_platillo</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                   </tr>
                                        ";
                                
                            if(!empty($_SESSION['usuario'])){
                                foreach ($_SESSION['usuario'] as $key =>$value){
                                    $salida.= " 
                                        <tr>
                                            <td>".$value['id_platillo']. "</td>
                                            <td>".$value['nombre']. "</td>
                                            <td>".$value['precio']. "</td>
                                            <td>".$value['cantidad']. "</td>
                                            <td>$". number_format($value['precio']* $value['cantidad'],2) . "</td>
                                            <td>   
                                                <a href='ConfirmarCompra.php?action=removeC&id_platillo=".$value['id_platillo']."'>
                                                <button class='btn btn-danger btn-block'>Eliminar</button>
                                                </a> 
                                            </td>
                                                    ";
                                    $total+= $value['cantidad']*$value['precio'];
                                }
                                
                                $salida .= " 
                                    <tr>
                                        <td colspan='2'></td>
                                        <td><b>Precio Total</b></td>
                                        <td>". number_format($total,2)."</td>
                                        <td>
                                            <a href='ConfirmarCompra.php?action=comprar'>
                                            <button class= 'btn btn-warning btn-block'>Realizar Compra</button>
                                        </td> 
                                        <td>
                                            <a href='VerCarrito3.php?action=clearall'>
                                            <button class= 'btn btn-warning btn-block'>Eliminar todo</button>
                                        </td>    
                                    </tr>";
                            }
                                
                            echo $salida;  
                                  
                            if(isset($_GET['action'])){
                                if($_GET['action']=='comprar'){
                                    echo "<script>
                                        alert('Compra Realizada');
                                            window.location= 'EnviarCorreo.php'
                                           </script>";
                                }
                                     
                                if($_GET['action']=='clearall')        
                                    unset ($_SESSION['usuario']); 
                                        
                                if ($_GET['action']=='removeC'){        
                                    foreach ($_SESSION['usuario'] as $key =>$value){        
                                        if($value['id_platillo']==$_GET['id_platillo'])        
                                            unset($_SESSION['usuario'][$key]);
                                    }    
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div> 
    
</body>
</html>
    

