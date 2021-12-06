<?php

//Funcion para mostrar las opciones o páginas por las que el cleinet puede navegar
function menu() {
    //En este caso se pregunta si hay un usuario o no
    if (isset($_SESSION['usuario'])) {//Si existe sesión activa muestra 
        $sesion = "CERRAR SESIÓN";
        $sesion_url = "cerrarSesion.php?salir=true";
    } else { //Si no hay sesión activa
        $sesion = "INICIAR SESIÓN";
        $sesion_url = "InicioDeSesion.php";
    }
    echo '
        <header class="header"><nav class="nav"><a href="#" class="submenu menu-link">Fasfu</a>
        <ul class="menu-navegacion" type="none">
            <li class="menu-item"><a href="index.php" class="menu-link sel-link">HOME</a></li>';
            
    
    if (isset($_SESSION['usuario']))//Si hay sesión activo
        echo '<li class="menu-item"><a href="ConfirmarCompra.php?action=enviarCorreo&total=$total" class="menu-link sel-link">CARRITO DE COMPRAS</a></li>';
    
    if (isset($_SESSION['usuario'])) {//Si hay sesión activo
        if($_SESSION['usuario'] == "administrador"){//Y el usuario es administrador
            echo '<li class="menu-item"><a href="menu-administracion.php" class="menu-link sel-link">ADMINISTRACIÓN</a></li>';
        }
    }
    echo '<li class="menu-item"><a href="' . $sesion_url . '" class="menu-link sel-link">' . $sesion . '</a></li>
       </ul></nav></header>';
}
?>


