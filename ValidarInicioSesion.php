<?php
    session_start();
    include ("MySqlConn.php");
    function revisarNombre(){
        $bandera = false;
        $conn = conectar();
        $result = $conn->query("SELECT * FROM usuario WHERE id_usuario = '".$_POST['usuario']. "'");
        if ($_POST['usuario']==""){
            $_SESSION['errorULogin']="Por favor ingrese su nombre de usuario.";
            unset($_SESSION['errorCLogin']);
        }elseif (!(mysqli_num_rows($result) > 0)) {
            $_SESSION['errorULogin']="El nombre de usuario no existe!";
            unset($_SESSION['errorCLogin']);
        }else{ 
            $row = $result->fetch_assoc();
            unset($_SESSION['errorULogin']);
            $bandera = revisarContrasena($row["contrasena"]);
        }
        mysqli_close($conn);
        return $bandera;        
    }
    
    function revisarContrasena($contraEnc){
       $banderaContra = false;
       $encContra = md5($_POST["contra"]);
       if ($_POST['contra']==""){
            $_SESSION['errorCLogin']="La contraseña no puede ser vacía.";
        }elseif ($contraEnc!=$encContra) {
            $_SESSION['errorCLogin']="La contraseña es incorrecta.";
        }else{ 
            $banderaContra= true;
            unset($_SESSION['errorCLogin']);
        }     
       return $banderaContra;    
    }
    
    $revisar = revisarNombre();
    if($revisar){
        $_SESSION["usuario"]=$_POST["usuario"];
        header("Location: VerPlatillo.php");
    }else{
        header("Location: InicioDeSesion.php");
    }
    
?>
