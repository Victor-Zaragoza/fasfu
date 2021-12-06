<?php

    session_start();
    
    //Obtiene la fecha actual
    date_default_timezone_set('America/Mexico_City');
    $date = date('Y-m-d H:i:s');
    
    $productosComprados= "Detalles de la compra del usuario: ".$_SESSION['usuario'];
    
    //Si la session con los datos del carrito no esta vacia, se enviará el Correo
    if(!empty($_SESSION['carrito'])){ 
        echo "<script>
                alert('Correo Enviado al Administrador con exito');
                window.location= 'index.php'
                </script>";
          
        $productosComprados .="  
            <table>
                <tr>
                    <th>ID_platillo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>                   
                </tr>";
        
        //Guardará en la variable $productosComprados los datos de todos lo productos del carrito
        foreach ($_SESSION['carrito'] as $key =>$value){
            
            $productosComprados .= "
                <tr>
                    <td>".$value['id_platillo']. "</td>
                    <td>".$value['nombre']. "</td>
                    <td>".$value['precio']. "</td>
                    <td>".$value['cantidad']. "</td>
                    <td>$". number_format($value['precio']* $value['cantidad'],2) . "</td>
                </tr> ";
            
            $total+= $value['cantidad']*$value['precio'];
         }
            $productosComprados .= "</table>";
    }
     
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Utilizamos estos tres archivos de la carpeta PHPMailer para enviar el correo
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        
        //Se realiza esta configuarcion ya que el correo es enviado desde LocalHost
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );
        
        //Datos del servidor
        $mail->SMTPDebug = 0;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'fasfuweb@gmail.com';                     
        $mail->Password   = 'fasfuPrograweb1';                              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

        //Definiendo el destinatario
        $mail->setFrom('fasfuweb@gmail.com', 'Fasfu');
        $mail->addAddress('victor.zaragoza111@gmail.com', $_SESSION['usuario']); 

        //El contenido de el correro ya esta almacenado en la variable $productosComprados
        $mail->isHTML(true);                                  
        $mail->Subject ='Nueva Compra realizada a las: '.$date;
        $mail->Body    = $productosComprados;

        if($mail->send()){
            unset($_SESSION['carrito']);
            echo "<script>
                  alert('Compra Realizada');
                  window.location= 'index.php'
                  </script>";
        }
    } catch (Exception $e) {
        echo "El correo no pudo ser enviado: {$mail->ErrorInfo}";
    }

?>
