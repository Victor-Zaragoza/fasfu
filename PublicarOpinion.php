<?php
    session_start();
    include ("MySqlConn.php");
    //$usuario = $_SESSION['usuario'];
    $usuario = "Bluestar";
    $idPlatillo = $_GET['idPlatillo'];
    $conexion = conectar();
    $sql = "INSERT INTO opiniones VALUES (DEFAULT, ".$idPlatillo.", '".$usuario."', '".$_GET['comentOpin']."',".$_GET['calif'].")";
    echo $sql;
    $result = $conexion->query($sql);
    if($result){
       mysqli_close($conexion);
       header("Location: VerPlatillo.php");
    }else{
        echo 'Error';
    }    
    
?>
