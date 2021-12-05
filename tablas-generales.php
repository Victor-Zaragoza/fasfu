<?php

//Función para administración usuarios
function consUsuarios() {
    //Sentencia para consulta de usuarios
    $sql = "SELECT id_usuario id, concat(nombre,' ',apellidos) nombres,fecha,"
            . "email,telefono, concat(calle,' ',colonia) domicilio FROM usuario";
    $GLOBALS['result'] = $GLOBALS['conexion']->query($sql);

    //Arreglo con los títulos e índices de la tabla usuario
    $arr_usuarios = array("id" => "USUARIO",
        "nombres" => "NOMBRE COMPLETO",
        "fecha" => "FECHA NACIMIENTO",
        "email" => "EMAIL",
        "telefono" => "TELÉFONO",
        "domicilio" => "DOMICILIO",
        "gustos" => "GUSTOS");
    
    //Llamada a función de crear tabla.
    tabla($arr_usuarios);
}

//Función para administración de restaurantes
function consRestaurantes() {
    //Sentencia para consulta de restaurantes
    $sql = "SELECT id_restaurante id, nombre, nombre_tipo FROM restaurante";
    $GLOBALS['result'] = $GLOBALS['conexion']->query($sql);

    //Arreglo con los títulos e índices de la tabla restaurantes
    $arr_restaurantes = array("id" => "ID",
        "nombre" => "NOMBRE DEL RESTAURANTE",
        "nombre_tipo" => "TIPO RESTAUTANTE");
    
    //Llamada a función de crear tabla.
    tabla($arr_restaurantes);
    
}

//Función para administración de Platillos
function consPlatillos() {
    //Sentencia para consulta de platillos
    $sql = "SELECT id_platillo id, id_restaurante, nombre, nombre_subtipo, descripcion FROM platillos_bebidas";
    $GLOBALS['result'] = $GLOBALS['conexion']->query($sql);

    //Arreglo con los títulos e índices de la tabla platillos_bebidas
    $arr_usuarios = array("id" => "ID PLATILLO",
        "id_restaurante" => "ID RESTAURANTE",
        "nombre" => "NOMBRE PLATILLO",
        "nombre_subtipo" => "SUBTIPO",
        "descripcion" => "DESCRIPCIÓN");
    
    //Llamada a función de crear tabla.
    tabla($arr_usuarios);
    
}
//Funcion para crear url del formulario
function crearURL(){
    if($GLOBALS['tipo'] == 1){
        return "usuario-administracion.php";
    }
    if($GLOBALS['tipo'] == 2){
        return "restaurante-administracion.php";
    }
    if($GLOBALS['tipo'] == 3){
        return "platillo-administracion.php";
    }
}
//Función para vista general de la página (Usuario o Restaurante o Platillo)
//La función muestra h1, botón añadir, url respectiva
function nombrarAdmin($nombre, $boton, $accion){
    echo '<div class="base">
        <h1 align="center">'.$nombre.'</h1>
        <br><br>
        <div align="right">
            <form name="formAgregar" method="post" enctype="multipart/form-data" 
              action="'.$boton.'-administracion.php">
              <input name="tabla" id="tabla" type="hidden" value="'.$accion.'">
              <input class="btn" type="submit" name="Agregar" id="Agregar" value=" Añadir '.$boton.'">
            </form>
        </div>
        <br><br>';
}

//Función que imprime los gustos del usuario
function gustos($id) {
    $sql = "SELECT nombre_tipo FROM gustos where id_usuario = '" . $id . "'";
    $result = $GLOBALS['conexion']->query($sql);
    echo "<td><ul>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["nombre_tipo"] . "</li>";
        }
        echo "</ul></td>";
    }
}

//Función que imprime los títulos de los campos de la tabla
function titulosColumnas($filtros) {
    echo "<tr>";
    foreach ($filtros as $titulo => $nombre) {
        echo "<th align=left>" . $nombre . "</th>";
    }
    echo "<th></th>";
}

//Función que imprime los valores de cada registro
function valoresColumnas($filtros) {
    if ($GLOBALS['result']->num_rows > 0) {
        while ($row = $GLOBALS['result']->fetch_assoc()) {
            echo "<tr>";
            foreach ($filtros as $titulo => $nombre) {
                if ($titulo != "gustos") {
                    echo "<td>" . $row["$titulo"] . "</td>";
                }
            }
            if ($GLOBALS['tipo'] == 1) {
                gustos($row["id"]);
            }
            echo '<td align=center>
                <form name="formAgregar" method="post" enctype="multipart/form-data" action="'.crearURL().'">
                    <input name="tabla" id="tabla" type="hidden" value="'.$GLOBALS['tipo'].'">
                    <input name="id" id="id" type="hidden" value="'.$row["id"].'">
                    <input type="submit" name="Modificar" id="Modificar" value="Modificar">
                </form>
                <form name="formEliminar" method="post" enctype="multipart/form-data" action="borrar-administracion.php">
                    <input name="tabla" id="tabla" type="hidden" value="'.$GLOBALS['tipo'].'">
                    <input name="id" id="id" type="hidden" value="'.$row["id"].'">
                    <input type="submit" name="Eliminar" id="Eliminar" value="Eliminar">
                </form>
                </td>';
            echo "</tr>";
        }
    }
}

function tabla($filtros) {
    echo '<table border=1 width="100%">';

    //Imprimir encabezados de las columnas (títulos)
    titulosColumnas($filtros);

    //Imprimir datos de consulta extraidos de la base de datos
    valoresColumnas($filtros);

    echo "</table>";
}

function listado($tipo_admin) {
    //Indica el tipo de consulta por parte del administrador
    $GLOBALS['tipo'] = $tipo_admin;

    //Conecta  al servidor Mysql y a la base de datos
    include ("mysql/MysqlConn.php");
    $GLOBALS['conexion'] = conectar();

    //Verifica la conexion
    if (!$GLOBALS['conexion']) {
        echo "ERROR";
    }

    if ($GLOBALS['tipo'] == 1) {// Tipo 1 indica el apartado de usuarios
        nombrarAdmin("ADMINISTRACIÓN DE USUARIOS", "usuario", 1);
        consUsuarios();
    }
    
    if ($GLOBALS['tipo'] == 2) {// Tipo 2 indica el apartado de restaurantes
        nombrarAdmin("ADMINISTRACIÓN DE RESTAURANTES", "restaurante", 2);
        consRestaurantes();
    }
    
    if ($GLOBALS['tipo'] == 3) {// Tipo 3 indica el apartado de platillos
        nombrarAdmin("ADMINISTRACIÓN DE PLATILLOS Y BEBIDAS", "platillo", 3);
        consPlatillos();
    }
    
    //Cerrar conexión
    mysqli_close($GLOBALS['conexion']);
}
