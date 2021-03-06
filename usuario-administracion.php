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
if (!isset($_POST['tabla']) and!isset($_POST['usuario'])) {
    header('Location:menu-administracion.php');
}
?>
<html>
    <head>
        <title>ADMINISTRACI&Oacute;N DE USUARIOS</title> 
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
            //Se establecen valores de inputs vacíos
            $valores_form = ["", "", "", "", "", "", "", "", ""];

            //Propiedades para nuevo registro 
            $modo = 1;
            $modoTitulo = "Registro de usuario";
            $editable = "";

            if (isset($_POST['id'])) {//Si es modificar un usuario
                //Accede a la base de datos, se realiza select en tabla usuario del id indicado.
                //Conecta  al servidor Mysql y a la base de datos
                include ("mysql/MysqlConn.php");
                $conexion = conectar();

                //Sentencia select
                $sql = "SELECT * FROM usuario WHERE id_usuario ='" . $_POST['id'] . "'";
                $result = $conexion->query($sql);

                //Pasar datos obtenidos al arreglo $valores_form
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $valores_form[0] = $row['id_usuario'];
                        $valores_form[1] = $row['nombre'];
                        $valores_form[2] = $row['apellidos'];
                        $valores_form[3] = $row['fecha'];
                        $valores_form[4] = $row['email'];
                        $valores_form[5] = $row['telefono'];
                        $valores_form[6] = $row['calle'];
                        $valores_form[7] = $row['colonia'];
                        //$valores_form[8] = $row['contrasena'];
                    }
                }

                //Propiedades para actualización
                $modo = 2;
                $editable = "readonly";
                $modoTitulo = "Actualización de usuario";
            }
            ?>
            <form name="formUsuario" method="post" action="usuario-administracion.php">    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <div class="form">
                    <div class="title"><?= $modoTitulo; ?></div>

                    <input id="modo" name="modo" hidden value="<?= $modo; ?>">

                    <div class="input-container ic1">
                        <input id="usuario" class="input" type="text" name="usuario" placeholder=" " value="<?= $valores_form[0] ?>" <?= $editable; ?> minlength="6" maxlength="20" required/>
                        <div class="cut"></div>
                        <label for="usuario" class="placeholder">Nombre de Usuario</label>
                    </div>

                    <output name="avisoUsuario" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="input-container ic1">
                        <input id="nombre" class="input" type="text" name="nombre" placeholder=" " value="<?= $valores_form[1] ?>" maxlength="30" required/>
                        <div class="cut"></div>
                        <label for="nombre" class="placeholder">Nombre Propio</label>
                    </div>

                    <output name="avisoNombre" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="input-container ic2">
                        <input id="apellidos" class="input" type="text" name="apellidos" placeholder=" " value="<?= $valores_form[2] ?>" maxlength="60" required/>
                        <div class="cut"></div>
                        <label for="apellidos" class="placeholder">Apellidos</label>
                    </div>

                    <output name="avisoApellidos" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="input-container ic2">
                        <input id="fecha" class="input" type="date" name="fecha" placeholder=" " value="<?= $valores_form[3] ?>" required/>
                        <div class="cut"></div>
                        <label for="fecha" class="placeholder">Fecha de Nacimiento</label>
                    </div>

                    <output name="avisoFecha" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="input-container ic2">
                        <input id="tele" class="input" type="text" name="tele" placeholder=" " value="<?= $valores_form[5] ?>" maxlength="10" minlength="10" required/>
                        <div class="cut"></div>
                        <label for="tele" class="placeholder">Teléfono</label>
                    </div>

                    <output name="avisoTel" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="input-container ic2">
                        <input id="calle" class="input" type="text" name="calle" placeholder=" " value="<?= $valores_form[6] ?>" maxlength="30" required/>
                        <div class="cut"></div>
                        <label for="calle" class="placeholder">Calle</label>
                    </div>

                    <output name="avisoCalle" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="input-container ic2">
                        <input id="colonia" class="input" type="text" name="colonia" placeholder=" " value="<?= $valores_form[7] ?>" maxlength="30" required/>
                        <div class="cut"></div>
                        <label for="colonia" class="placeholder">Colonia</label>
                    </div>

                    <output name="avisoColonia" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="subtitle">¿Qué comidas te interesan?</div>
                    <div class="input-container ic2" style="overflow-y: auto">
                        <input id="gusto1" name="gusto[]" type="checkbox" value="Mexicana"><label for="gusto1" class="subtitle">Mexicana</label>
                        <input id="gusto2" name="gusto[]" type="checkbox" value="China"><label for="gusto2" class="subtitle">China</label>
                        <input id="gusto3" name="gusto[]" type="checkbox" value="Española"><label for="gusto3" class="subtitle">Española</label>
                        <input id="gusto4" name="gusto[]" type="checkbox" value="Coreana"><label for="gusto4" class="subtitle">Coreana</label>
                        <input id="gusto5" name="gusto[]" type="checkbox" value="Francesa"><label for="gusto5" class="subtitle">Francesa</label>
                        <input id="gusto6" name="gusto[]" type="checkbox" value="Comida India"><label for="gusto6" class="subtitle">Comida India</label>
                        <input id="gusto7" name="gusto[]" type="checkbox" value="Italiana"><label for="gusto7" class="subtitle">Italiana</label>
                        <input id="gusto8" name="gusto[]" type="checkbox" value="Japonesa"><label for="gusto8" class="subtitle">Japonesa</label>
                    </div>

                    <output name="avisoGustos" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="input-container ic2">
                        <input id="email" class="input" type="text" name="email" placeholder=" " value="<?= $valores_form[4] ?>" maxlength="40" required/>
                        <div class="cut cut-short"></div>
                        <label for="email" class="placeholder">Email</>
                    </div>

                    <output name="avisoEmail" style="font-family: sans-serif;color: red">
                    </output>

                    <div class="input-container ic2">
                        <input id="contra" class="input" type="password" name="contra" placeholder=" " value="<?= $valores_form[8] ?>" maxlength="20" required/>
                        <output name="avisoContra" style="font-family: sans-serif;color: red">
                        </output>
                        <br>
                        <abbr title="	* No puede ser vacía
                              * Debe de tener al menos una minúscula
                              * Debe de tener al menos una mayúscula
                              * Debe de tener al menos un dígito
                              * Debe de tener al menos un carácter especial
                              * Debe de ser entre 8 caracteres y 20
                              * No puede tener espacios en blanco
                              " aria-label="required" color="white">Requerimientos de contraseña.</abbr>
                        <div class="cut cut-short"></div>
                        <label for="contra" class="placeholder">Contraseña</>
                    </div>

                    <input type="button" class="submit" value="<?= $modoTitulo ?>" onclick="validarU(this.form);">
                </div>
            </form>
            <?php
        } elseif (isset($_POST['usuario'])) {//Si ya se envió el formulario
            
            //Realizar y verificar conexion base de datos
            include 'mysql/MysqlConn.php';
            
            $conexion = conectar();
            if (!$conexion) {
                echo "ERROR";
            }

            if ($_POST['modo'] == 1) {//Si es un nuevo registro INSERT
                $contraMD5 = md5($_POST['contra']);

                $sql = "INSERT INTO usuario VALUES ('" . $_POST['usuario'] .
                        "', '" . $_POST['nombre'] .
                        "', '" . $_POST['apellidos'] .
                        "', '" . $contraMD5 .
                        "', '" . $_POST['fecha'] .
                        "', '" . $_POST['email'] .
                        "', '" . $_POST['tele'] .
                        "', '" . $_POST['calle'] .
                        "', '" . $_POST['colonia'] . "')";

                $resultado = $conexion->query($sql);
                
                //Dar de alta gustos
                foreach ($_POST['gusto'] as $gusto) {
                    $sql = "INSERT INTO gustos VALUES ('" . $_POST['usuario'] . "', '" . $gusto . "')";
                    $resultado = $conexion->query($sql);
                }
                
                //Cerrar conexión
                mysqli_close($conexion);
                
                echo '<script type="text/javascript"> alert("Registro exitoso"); '
                . 'window.location.href="menu-administracion.php";</script>';
            }
            
            if ($_POST['modo'] == 2) {//Si es actualización UPDATE
                $contraMD5 = md5($_POST['contra']);
                $sql = "UPDATE usuario SET id_usuario = '" . $_POST['usuario'] . "',"
                        . " nombre = '" . $_POST['nombre'] . "',"
                        . " apellidos = '" . $_POST['apellidos'] . "',"
                        . " contrasena = '" . $contraMD5 . "',"
                        . " fecha = '" . $_POST['fecha'] . "',"
                        . " email = '" . $_POST['email'] . "',"
                        . " telefono = '" . $_POST['tele'] . "',"
                        . " calle = '" . $_POST['calle'] . "',"
                        . " colonia = '" . $_POST['colonia'] . "'"
                        . " WHERE usuario.id_usuario = '" . $_POST['usuario'] . "'";

                $resultado = $conexion->query($sql);

                //Borrar datos previos de la tabla gustos
                $sql = "DELETE FROM gustos WHERE id_usuario='" . $_POST['usuario'] . "'";
                if ($conexion->query($sql) === TRUE) {
                    
                }
                
                //Indicador de fin de modificación
                $fin = false;
                
                //Insertar los gustos del usuario
                foreach ($_POST['gusto'] as $gusto) {
                    $sql = "INSERT INTO gustos VALUES ('" . $_POST['usuario'] . "', '" . $gusto . "')";
                    $resultado = $conexion->query($sql);
                    $fin = true;
                }
                
                //Cerrar conexión
                mysqli_close($conexion);

                if ($fin == true) {
                    echo '<script type="text/javascript"> alert("Actualización exitosa"); '
                    . 'window.location.href="menu-administracion.php";</script>';
                }
            }
        }
        ?>

    </body>
</html>

