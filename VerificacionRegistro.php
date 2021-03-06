<?php
    session_start();
    include ("mysql/MysqlConn.php");
    
    function verificarNombreUsuario(){
        $bandera = false;
        $conn = conectar();
        $result = $conn->query("SELECT * FROM usuario WHERE id_usuario = '".$_POST['usuario']. "'");
        if ($_POST['usuario']==""){
            $_SESSION['errorUsuario']="El nombre de usuario no puede ser vacío.";
        }elseif (preg_match('/[0-9]/', $_POST['usuario'])) {
            $_SESSION['errorUsuario']="El nombre de usuario no puede contener números.";
        }elseif (mysqli_num_rows($result) > 0) {
            $_SESSION['errorUsuario']="El nombre de usuario ya existe.";
        }else{ 
            $bandera= true;
            unset($_SESSION['errorUsuario']);
        }
        mysqli_close($conn);
        return $bandera;
    }
    
    function verificarNombrePropio(){
        $bandera = false;
        if ($_POST['nombre']==""){
            $_SESSION['errorNombre']="El nombre no puede ser vacío.";
        }elseif (preg_match('/[0-9]/', $_POST['nombre'])) {
            $_SESSION['errorNombre']="El nombre no puede contener números.";
        }else{ 
            $bandera= true;
            unset($_SESSION['errorNombre']);
        }
        
        return $bandera;
    }
    
    function verificarApellidos(){
        $bandera = false;
        if ($_POST['apellidos']==""){
            $_SESSION['errorApellidos']="Sus apellidos no pueden ser vacíos.";
        }elseif (preg_match('/[0-9]/', $_POST['apellidos'])) {
            $_SESSION['errorApellidos']="Sus apellidos no pueden contener números.";
        }else{ 
            $bandera= true;
            unset($_SESSION['errorApellidos']);
        }
        
        return $bandera;
    }
    
    function verificarCorreo(){
        $bandera = false;
        if ($_POST['email']==""){
            $_SESSION['errorEmail']="El email no puede ser vacío.";
        }elseif (!preg_match('/^(.+\@.+\..+)$/', $_POST['email'])) {
            $_SESSION['errorEmail']="El email no es válido (Ej. paco12@gmail.com).";
        }else{ 
            $bandera= true;
            unset($_SESSION['errorEmail']);
        }
        
        return $bandera;
    }
    
    function verificarTelefono(){
       $bandera = false;
       if ($_POST['tele']==""){
            $_SESSION['errorTele']="El teléfono no puede ser vacío.";
        }elseif (!preg_match('/^\d{10}$/', $_POST['tele'])) {
            $_SESSION['errorTele']="El teléfono no es de 10 dígitos";
        }else{ 
            $bandera= true;
            unset($_SESSION['errorTele']);
        }
        
        return $bandera;
    }
    
    function verificaCalle(){
        $bandera = false;
        if ($_POST['calle']==""){
            $_SESSION['errorCalle']="Por favor ingrese una calle.";
        }else{ 
            $bandera= true;
            unset($_SESSION['errorCalle']);
        }
        
        return $bandera;
    }
    
    function verificaColonia(){
        $bandera = false;
        if ($_POST['colonia']==""){
            $_SESSION['errorColonia']="Por favor ingrese una colonia.";
        }else{ 
            $bandera= true;
            unset($_SESSION['errorColonia']);
        }
        
        return $bandera;
    }
    
    function verificarContrasena(){
       $bandera = false;
       if ($_POST['contra']==""){
            $_SESSION['errorContra']="La contraseña no puede ser vacía.";
        }elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/', $_POST['contra'])) {
            $_SESSION['errorContra']="La contraseña no cumple con los requisitos.";
        }else{ 
            $bandera= true;
            unset($_SESSION['errorContra']);
        }
        
        return $bandera;
    }
    
    function verificarGustos(){
       $bandera = false;
       //$gustos = $_POST['gusto'];
       if ($_POST['gusto']==null){
            $_SESSION['errorGustos']="Por favor seleccione al menos 1 gusto.";
        }else{ 
            $bandera= true;
            unset($_SESSION['errorGustos']);
        }
        
        return $bandera;
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>¡Bienvenido a Fasfu!</title>
        <link rel="stylesheet" href="css/estilosFasfu.css">
    </head>
    <body >
        <?php
            $sentencia1 = verificarNombrePropio();
            $sentencia2 = verificarApellidos();
            $sentencia3 = verificarCorreo();
            $sentencia5 = verificaCalle();
            $sentencia6 = verificarTelefono();
            $sentencia7 = verificarContrasena();
            $sentencia8 = verificarGustos();
            $sentencia9 = verificaColonia();
            $sentencia10 = verificarNombreUsuario();
            if($sentencia1 && $sentencia2 && $sentencia3 && $sentencia5 && $sentencia6 && $sentencia7 && $sentencia8 && $sentencia9 && $sentencia10){
                $conn = conectar();
                $contraMD5 = md5($_POST['contra']);
                $sql = "INSERT INTO usuario VALUES ('".$_POST['usuario'].
                        "', '".$_POST['nombre'].
                        "', '".$_POST['apellidos'].
                        "', '".$contraMD5.
                        "', '".$_POST['fecha'].
                        "', '".$_POST['email'].
                        "', '".$_POST['tele'].
                        "', '".$_POST['calle'].
                        "', '".$_POST['colonia']."')";
                $resultado = $conn->query($sql);
                
                foreach ($_POST['gusto'] as $gusto){
                    $sql = "INSERT INTO gustos VALUES ('".$_POST['usuario']."', '".$gusto."')";
                    $resultado = $conn->query($sql);
                }
                mysqli_close($conn);
        ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <div class="form">
            <div class="title">Bienvenido <?php echo $_POST['nombre']?>!</div>
            <div class="subtitle">
                Ya puedes iniciar sesión!
                <A href="InicioDeSesion.php">¡Ya puedes iniciar sesión!</A>
            </div>
            
        </div>
        <?php
            }else header('Location: RegistroDeUsuarios.php')
//echo $sentencia1.", ".$sentencia2.", ".$sentencia3.", ".$sentencia4.", ".$sentencia5.", ".$sentencia6.", ".$sentencia7.", ".$sentencia8.", ".$sentencia9.", ".$sentencia10;//header('Location: RegistroDeUsuarios.php')
        ?>
    </body>
</html>
