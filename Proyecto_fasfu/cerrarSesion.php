<?php
   session_start();
   
   if(session_destroy()) {
      echo "<script>
                alert('Sesion Cerrada');
                window.location= 'index.php'
                </script>";
   }

?>

