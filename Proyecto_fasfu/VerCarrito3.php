<?php
    include ("CompurebaSesion.php");
    
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
                        <h2>Carrito de compras</h2>
                        <div class="col-md-12">
                            <div class="row">
                        <?php
                             $sql = "SELECT * FROM platillos_bebidas";
                             $result = $conn->query($sql);
                             
                              if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                        ?>
                                <div class="col-md-4">
                                  <form method="POST" action="VerCarrito3.php?id_platillo=<?=$row['id_platillo']?>">
                                    <img src="<?=$row['imagen']?>" style="height: 150px;">
                                    <h5 class="text-center"><?= $row['nombre']?></h5>
                                    <h5 class="text-center">$<?= $row['precio']?></h5>
                                    <input type="hidden" name="nombre" value="<?=$row['nombre']?>">
                                    <input type="hidden" name="precio" value="<?=$row['precio']?>">
                                    <input type="number" name="cantidad" value="1" class="from-control">
                                    <input type="submit" name="AgregaCarrito" class=" btn btn-warning btn-block my-2" value="Añade al carrito"> 
                                  </form>
                                </div> 
                              <?php }} ?>
                       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Productos seleccionados</h2>
                            <?php
                                $salida= "";
                                $salida .=" 
                                    <table class= 'table table-bordered table-striped'>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Precio Total</th>
                                            
                                        </tr>
                                        ";
                                
                                        if(!empty($_SESSION['usuario'])){
                                            $total=0;
                                            $cont=0;
                                           foreach ($_SESSION['usuario'] as $key =>$value){
                                                 $total+= $value['cantidad']*$value['precio'];
                                                 $cont++;
                                           }
                                           
                                            $salida .= " 
                                                    <tr>
                                                        <td><b>$cont</b></td>
                                                        <td>". number_format($total,2)."</td>
                                                         <td>
                                                            <a href='VerCarrito3.php?action=verCarrito'>
                                                            <button class= 'btn btn-warning btn-block'>Ver Carrito</button>
                                                        </td> 
                                                        <td>
                                                            <a href='VerCarrito3.php?action=clearall'>
                                                            <button class= 'btn btn-warning btn-block'>Eliminar todo</button>
                                                        </td>       
                                                    </tr>
                                                        ";
                                        }
                                
                                  echo $salida;      
                            ?>
                    </div>
                </div>
            </div>
            
        </div>
        
        <?php
            if(isset($_GET['action'])){
                if($_GET['action']=='verCarrito')
                  echo "<script>
                    window.location= 'ConfirmarCompra.php?action=enviarCorreo&total=$total'
                    </script>";
                
                if($_GET['action']=='clearall')
                    unset ($_SESSION['usuario']); 
                if ($_GET['action']=='remove'){
                    foreach ($_SESSION['usuario'] as $key =>$value){
                        if($value['id_platillo']==$_GET['id_platillo']){
                            unset($_SESSION['usuario'][$key]);
                        }
                    }
                }
                
            }
        ?>
    </body>
</html>
