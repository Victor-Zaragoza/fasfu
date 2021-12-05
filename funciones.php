<?php

//Función para crear categorias
function categorias($titulo, $tabla, $sql) {
    //Obtener registros
    $result = $GLOBALS['conexion']->query($sql);

    //Crear lista
    if ($result->num_rows > 0) {
        echo "<h1>$titulo</h1>";
        echo '<div class="itemsH">';
        while ($row = $result->fetch_assoc()) {
            //Función que hará al dar clic en el botón
            $sentencia_funcion = "consultaPlatillos('" . $tabla . "','" . $row['id'] . "');";

            //Crear categoría.
            echo '<div class="itemH">';
            echo'<button onClick="' . $sentencia_funcion . '">';
            echo '<img align=center class="opcion" src="' . $row['imagen'] . '" alt="' . $row['nombre'] . '">';
            echo '<br><h3 align=center>' . $row['nombre'] . '</h3></button><br>';
            echo '</div>';
        }
        echo '</div>';
    }
}

//Función principal para crear las secciones de Fasfu
function secciones($categoria) {
    //Indica el tipo de consulta por parte del administrador
    $GLOBALS['categoria'] = $categoria;

    //Conexión a la base de datos
    $GLOBALS['conexion'] = conectar();

    //Verifica la conexion
    if (!$GLOBALS['conexion']) {
        echo "ERROR";
    }

    if ($GLOBALS['categoria'] == 1) {// 1, por restaurante
        categorias("Restaurantes", "restaurante", "SELECT id_restaurante id, nombre, imagen FROM restaurante");
    }

    if ($GLOBALS['categoria'] == 2) {// 2, por tipo
        categorias("Tipos", "tipo", "SELECT nombre_tipo id, nombre_tipo nombre, imagen FROM tipo");
    }

    if ($GLOBALS['categoria'] == 3) {// 3, por subtipo
        categorias("Subtipos", "subtipo", "SELECT nombre_subtipo id, nombre_subtipo nombre, imagen FROM subtipo");
    }

    //Cerrar conexión
    mysqli_close($GLOBALS['conexion']);
}

//Función para designar h1 de la página
function tituloFiltro() {
    $titulo = "";
    switch ($_POST['busqueda']) {
        case "restaurante":
            $sql = "SELECT nombre FROM restaurante WHERE id_restaurante=" . $_POST['id'];
            $result = $GLOBALS['conexion']->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc())
                    $titulo = "Platillos de Restaurante: " . $row['nombre'];
            }
            break;
        case "tipo" :
            $titulo = "Platillos de Categoría: " . $_POST['id'];
            break;
        case "subtipo":
            $titulo = "Platillos de Sección: " . $_POST['id'];
            break;
    }
    echo "<h1 align=center>$titulo</h1>";
}

//Función para desplegar los platillos de la consulta
function catalogo($result){
    if ($result->num_rows > 0) {
        echo '<div class="main">';
        while ($row = $result->fetch_assoc()){
            echo '<div class="cards">'
            . '<div class="image">'
            . '<a href="VerPlatillo.php?idPlatillos='.$row['id_platillo'].'">'
            . '<img src="'.$row['imagen'].'"></a>'
            . '</div>'
            . '<div class="title">'
            . '<h1>'.$row['nombre'].'</h1>'
            . '</div>'
            . '<div class="descripcion">'
            . '<h2>'.$row['precio'].'</h2>'
            . '</div>'
            . '<button>Comprar</button>'
            . '</div>';
            
        }
        echo "</div>";
    }else{
        echo "No existen resultados para esta búsqueda.";
    }
}
//Función general de las consultas de platillos por categorías
function seleccionarFiltro() {

    //Conexión a la base de datos
    $GLOBALS['conexion'] = conectar();

    //Verifica la conexion
    if (!$GLOBALS['conexion']) {
        echo "ERROR";
    }

    tituloFiltro();
    echo '<br><br>';

    $sql = "";
    switch ($_POST['busqueda']) {
        case "restaurante":
            $sql = "SELECT * FROM platillos_bebidas WHERE id_restaurante=" . $_POST['id'];
            break;
        case "tipo" :
            $sql = "SELECT platillos_bebidas.id_platillo, platillos_bebidas.nombre, platillos_bebidas.precio, platillos_bebidas.imagen "
                    . "FROM (platillos_bebidas INNER JOIN restaurante) WHERE restaurante.nombre_tipo ='" . $_POST['id'] . "'";
            break;
        case "subtipo":
            $sql = "SELECT * FROM platillos_bebidas WHERE nombre_subtipo=" . $_POST['id'];
            break;
    }
    
    $result = $GLOBALS['conexion']->query($sql);
    
    //Mostrar en página los platillos
    catalogo($result);
}
?>


