<?php
    session_start();
    include ("encabezados.php");
    menu();
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Carrito Compras </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/estilo_general.css">
    </head>
    <body>
     <div class="container-fluid">
        <div class="col-md-16">
            <div class="row">
                <div class="col-md-10">
                    <h2>Productos seleccionados</h2>
                        <?php
                        
                        //Mostrará una tabla con todo el contenido del carrito y opciones para elminiar y comprar. 
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
                                
                            if(!empty($_SESSION['carrito'])){
                                foreach ($_SESSION['carrito'] as $key =>$value){
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
                                        </tr>";
                                    $total+= $value['cantidad']*$value['precio'];
                                }
                                
                                $salida .= " 
                                    <tr>
                                        <td colspan=2><b>Precio Total</b></td>
                                        <td colspan=2>". number_format($total,2)."</td>
                                        <td>
                                            <a href='ConfirmarCompra.php?action=comprar'>
                                            <button class= 'btn btn-warning btn-block'>Realizar Compra</button>
                                        </td> 
                                        <td>
                                            <a href='ConfirmarCompra.php?action=clearall'>
                                            <button class= 'btn btn-warning btn-block'>Eliminar todo</button>
                                        </td>    
                                    </tr>";
                            }
                                
                            echo $salida;  
                                
                            //Si se presiona el boton comprar nos enviara a la 
                            //pagina para enviar el correo y finalizar la compra
                            if(isset($_GET['action'])){
                                if($_GET['action']=='comprar'){
                                    echo "<script>
                                        alert('Compra Realizada');
                                            window.location= 'EnviarCorreo.php'
                                           </script>";
                                }
                                  
                                //Si se presiona el boton Eliminar todo borra todos los datos del carrito   
                                if($_GET['action']=='clearall')       
                                    unset ($_SESSION['carrito']);
                                
                                //Solo eliminara el producto que se haya seleccionado
                                if ($_GET['action']=='removeC'){        
                                    foreach ($_SESSION['carrito'] as $key =>$value){        
                                        if($value['id_platillo']==$_GET['id_platillo'])        
                                            unset($_SESSION['carrito'][$key]);
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
    

