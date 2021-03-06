<?php
//Comprobamos sesión abierta
session_start();

if (isset($_SESSION['usuario'])) {//Si la variable SESSION['user'] existe
    if ($_SESSION['usuario'] != "administrador") { //Si no es admin
        header('Location:index.php');
    }
} else {//Si no existe usuario registrado
    header('Location:index.php');
}
//Si no existen esta variable no puede acceder a la página y regresa al menu administrador
if (!isset($_POST['tabla']) and!isset($_POST['restaurante'])) {
    header('Location:menu-administracion.php');
}
?>
<html>
    <head>
        <title>ADMINISTRACI&Oacute;N DE RESTAURANTES</title> 
        <link rel="stylesheet" type="text/css" href="css/estilo_general.css"> 
        <script type="text/javascript" src="validaciones.js"></script>
        <link rel="stylesheet" href="estilosFasfu.css">
    </head>
    <body>
        <?php
        //Agregamos el menú o encabezado.
        include ("encabezados.php");
        menu();

        if (isset($_POST['tabla'])) {//Si no se ha enviado el formulario
            //Conecta  al servidor Mysql y a la base de datos
            include ("mysql/MysqlConn.php");
            $conexion = conectar();

            //Se establecen valores de inputs vacíos
            $valores_form = ["Asignado al ser registrado", "", "", ""];

            //Propiedades para nuevo registro 
            $modo = 1;
            $modoTitulo = "Registro de restaurante";
            $editable = "";

            if (isset($_POST['id'])) {//Si es modificar un restaurante
                //Sentencia select
                $sql = "SELECT * FROM restaurante WHERE id_restaurante ='" . $_POST['id'] . "'";
                $result = $conexion->query($sql);

                //Pasar datos obtenidos al arreglo $valores_form
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $valores_form[0] = $row['id_restaurante'];
                        $valores_form[1] = $row['nombre'];
                        $valores_form[2] = $row['nombre_tipo'];
                        $valores_form[3] = $row['imagen'];
                    }
                }

                //Propiedades para actualización
                $modo = 2;
                $modoTitulo = "Actualización de restaurante";
            }
            ?>
            <form name="formRestaurante" method="post" action="restaurante-administracion.php" enctype="multipart/form-data">    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <div class="form">
                    <div class="title"><?= $modoTitulo; ?></div>

                    <input id="modo" name="modo" hidden value="<?= $modo; ?>">

                    <div class="input-container ic1">
                        <input id="restaurante" class="input" type="text" name="restaurante" placeholder=" " value="<?= $valores_form[0] ?>" readonly/>
                        <div class="cut"></div>
                        <label for="usuario" class="placeholder">ID del Restaurante</label>
                    </div>


                    <div class="input-container ic1">
                        <input id="nombre" class="input" type="text" name="nombre" placeholder=" " value="<?= $valores_form[1] ?>" maxlength="30"/>
                        <div class="cut"></div>
                        <label for="nombre" class="placeholder">Nombre del Restaurante</label>
                    </div>

                    <output name="avisoNombre" style="font-family: sans-serif;color: red">
                    </output>


                    <div class="input-container ic1">
                        <select name="tipos" id="tipos" class="input" required>
                            <option selected disabled style="color:red" class="input" value="0">Seleccione una categoría:</option>
                            <!-- En el próximo código se buscan todos los tipos de comida existentes -->
                            <?php
                            //Sentencia para buscar nombre_tipo
                            $sql = "SELECT nombre_tipo FROM tipo";
                            $result = $conexion->query($sql);

                            //Ciclo para asignar las opciones
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $valor = $row["nombre_tipo"];
                                    echo '<option class="input" value="' . $valor . '"';
                                    if ($row["nombre_tipo"] == $valores_form[2]) {
                                        echo " selected";
                                    }
                                    echo '>' . $valor . '</option>';
                                }
                            }

                            //Cierre de la conexión a la base de datos
                            mysqli_close($conexion);
                            ?>
                        </select><br><br>
                    </div>

                    <output name="avisoTipo" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="input-container ic2">
                        <input id="archivo" class="input" type="file" name="archivo" accept="image/*" maxlength="40" required/>
                        <div class="cut"></div>
                        <label for="archivo" class="placeholder">Imagen</>
                    </div>

                    <output name="avisoImagen" style="font-family: sans-serif;color: red">
                    </output>

                    <input type="button" class="submit" value="<?= $modoTitulo ?>" onclick="validarR(this.form);">
                </div>
            </form>
            <?php
        } elseif (isset($_POST['restaurante'])) {//Si ya se envió el formulario
            //Realizar y verificar conexion base de datos
            include 'mysql/MysqlConn.php';

            $conexion = conectar();
            if (!$conexion) {
                echo "ERROR";
            }

            $GLOBALS['id_insert'] = 0;

            if ($_POST['modo'] == 1) {//Si es un nuevo registro INSERT
                $sql = "INSERT INTO restaurante VALUES (NULL , '" . $_POST['nombre'] .
                        "', '" . $_POST['tipos'] .
                        "', NULL)";

                $resultado = $conexion->query($sql);
                $GLOBALS['id_insert'] = $conexion->insert_id;
            }

            if ($_POST['modo'] == 2) {//Si es actualización UPDATE
                $sql = "UPDATE restaurante set nombre='" . $_POST['nombre'] .
                        "', nombre_tipo='" . $_POST['tipos'] . "' WHERE id_restaurante = " . $_POST['restaurante'];

                $resultado = $conexion->query($sql);
                $GLOBALS['id_insert'] = $_POST['restaurante'];
            }

            //Para modificar el campo imagen
            if ($_FILES["archivo"]["error"] > 0) {
                echo '<script type="text/javascript"> alert("No se pudo cargar imagen");</script>';
            } else {
                $extensiones = array("image/gif", "image/png", "image/jpg");
                $limite_kb = 3000;
            }
            if (in_array($_FILES["archivo"]["type"], $extensiones) && $_FILES["archivo"]["size"] <= $limite_kb * 1024) {
                $ruta = 'imagenes/restaurantes/';
                $archivo = $ruta . $_FILES["archivo"]["name"];

                if (!file_exists($archivo)) {
                    $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
                    if ($resultado) {
                        echo "Guardado";
                    }
                } else {
                    echo "Existe nombre de archivo";
                }
            }

            //Guardar imagen
            $sql = "UPDATE restaurante SET imagen = '" . $archivo . "' WHERE id_restaurante =" . $GLOBALS['id_insert'];
            $resultado = $conexion->query($sql);

            //Cerrar conexión
            mysqli_close($conexion);
        }
        ?>

    </body>
</html>