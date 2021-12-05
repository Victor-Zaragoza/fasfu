<?php
     include ("CompruebaSesion.php");
     date_default_timezone_set('America/Mexico_City');
     $date = date('Y-m-d H:i:s');
      $productosComprados= "Detalles de la compra del usuario ID: ";
      
     if(!empty($_SESSION['usuario'])){
          echo "<script>
              alert('Correo Enviado al Administrador con exito');
                window.location= 'VerCarrito3.php?action=clearall'
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
            
         foreach ($_SESSION['usuario'] as $key =>$value){
            
             $productosComprados .= "
                 
                  <tr>
                     <td>".$value['id_platillo']. "</td>
                    <td>".$value['nombre']. "</td>
                    <td>".$value['precio']. "</td>
                    <td>".$value['cantidad']. "</td>
                    <td>$". number_format($value['precio']* $value['cantidad'],2) . "</td>
                  </tr>
                  
                     ";
                    $total+= $value['cantidad']*$value['precio'];
         }
               $productosComprados .= "</table>";
    }
     
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fasfuweb@gmail.com';                     //SMTP username
        $mail->Password   = 'fasfuPrograweb1';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('fasfuweb@gmail.com', 'Fasfu');
        $mail->addAddress('victor.zaragoza111@gmail.com', 'Usuario');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject ='Nueva Compra realizada a las: '.$date;
        $mail->Body    = $productosComprados;

        if($mail->send())
            echo "<script>
                alert('Compra Realizada');
                window.location= 'VerCarrito3.php?action=clearall'
                </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>
