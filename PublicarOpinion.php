<?php
    session_start();
    include ("mysql/MysqlConn.php");
    $usuario = $_SESSION['usuario'];
    $idPlatillo = $_POST['idPlatillo'];
    $conexion = conectar();
    $sql = "INSERT INTO opiniones VALUES (DEFAULT, ".$idPlatillo.", '".$usuario."', '".$_POST['comentOpin']."',".$_POST['calif'].")";
    echo $sql;
    $result = $conexion->query($sql);
    if($result){
       mysqli_close($conexion);
       header("Location: VerPlatillo.php?idPlatillos=$idPlatillo");
    }else{
        echo 'Error';
    }    
    
?>
