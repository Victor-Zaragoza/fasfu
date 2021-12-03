<?php
    include ("CompurebaSesion.php");
    $date = date('Y-m-d H:i:s');
    $total=$_GET['total'];
   
     $destinatario = "zaragoza_victorr@outlook.com"; 
    $asunto = "Nueva compra registrada"; 
    $cuerpo = " 
            <html> 
                <head> 
                <title>Nueva compra realizada por Usuario: </title> 
                </head> 
                <body> 
                        <h1>Detalles de compra</h1> 
                        <p> 
                        <b>La compra fue registrada el $date </b>. 
                            Total de la compra: $total
                        </p> 
                </body> 
            </html> 
        "; 
        
       if(mail($destinatario, $asunto, $cuerpo)){
           echo "<script>
                    alert('Correro enviado');
                    window.location= 'VerCarrito3.php'
                    </script>";
       }
    
?>

