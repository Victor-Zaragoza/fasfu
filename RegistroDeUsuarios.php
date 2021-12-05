<?php
    session_start();
    //<?php if(!isset($_SESSION['errorNombre']) && isset($_SESSION[])) echo "value='David'";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido a Fasfu!</title>
        <link rel="stylesheet" href="css/estilosFasfu.css">
        <link rel="stylesheet" type="text/css" href="css/estilo_general.css"> 
    </head>
    <body >
        <?php
        //Agregamos el menú o encabezado.
        include ("encabezados.php");
        menu();
        ?>
        <form method="post" action="VerificacionRegistro.php">    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <div class="form">
            <div class="title">Bienvenido</div>
            <div class="subtitle">¡Registremos una nueva cuenta!</div>
            
            <div class="input-container ic1">
                <input id="usuario" class="input" type="text" name="usuario" placeholder=" " />
                <div class="cut"></div>
                <label for="usuario" class="placeholder">Nombre de Usuario</label>
            </div>
            
            <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorUsuario'])) echo $_SESSION['errorUsuario'];?>
            </div>
            
            <div class="input-container ic1">
                <input id="nombre" class="input" type="text" name="nombre" placeholder=" " />
                <div class="cut"></div>
                <label for="nombre" class="placeholder">Nombre Propio</label>
            </div>
            
            <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorNombre'])) echo $_SESSION['errorNombre'];?>
            </div>
            
            <div class="input-container ic2">
                <input id="apellidos" class="input" type="text" name="apellidos" placeholder=" " />
                <div class="cut"></div>
                <label for="apellidos" class="placeholder">Apellidos</label>
            </div>
            
            <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorApellidos'])) echo $_SESSION['errorApellidos'];?>
            </div>
            
            <div class="input-container ic2">
                <input id="fecha" class="input" type="date" name="fecha" placeholder=" " />
                <div class="cut"></div>
                <label for="fecha" class="placeholder">Fecha de Nacimiento</label>
            </div>
            
            <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorFecha'])) echo $_SESSION['errorFecha'];?>
            </div>
            
            <div class="input-container ic2">
                <input id="tele" class="input" type="text" name="tele" placeholder=" " />
                <div class="cut"></div>
                <label for="tele" class="placeholder">Teléfono</label>
            </div>
            
             <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorTele'])) echo $_SESSION['errorTele'];?>
            </div>
            
             <div class="input-container ic2">
                 <input id="calle" class="input" type="text" name="calle" placeholder=" " />
                <div class="cut"></div>
                <label for="calle" class="placeholder">Calle</label>
            </div>
            
            <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorCalle'])) echo $_SESSION['errorCalle'];?>
            </div>
            
             <div class="input-container ic2">
                 <input id="colonia" class="input" type="text" name="colonia" placeholder=" " />
                <div class="cut"></div>
                <label for="colonia" class="placeholder">Colonia</label>
            </div>
            
            <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorColonia'])) echo $_SESSION['errorColonia'];?>
            </div>
            
            <div class="subtitle">¿Qué comidas te interesan?</div>
            <div class="input-container ic2" style="overflow-y: auto">
                <input id="gusto1" name="gusto[]" type="checkbox" value="Mexicana"><label for="gusto1" class="subtitle">Mexicana</label>
                <input id="gusto2" name="gusto[]" type="checkbox" value="China"><label for="gusto2" class="subtitle">China</label>
                <input id="gusto3" name="gusto[]" type="checkbox" value="Española"><label for="gusto3" class="subtitle">Española</label>
                <input id="gusto4" name="gusto[]" type="checkbox" value="Coreana"><label for="gusto4" class="subtitle">Coreana</label>
                <input id="gusto5" name="gusto[]" type="checkbox" value="Francesa"><label for="gusto5" class="subtitle">Francesa</label>
                <input id="gusto6" name="gusto[]" type="checkbox" value="Indú"><label for="gusto6" class="subtitle">Indú</label>
                <input id="gusto7" name="gusto[]" type="checkbox" value="Italiana"><label for="gusto7" class="subtitle">Italiana</label>
                <input id="gusto8" name="gusto[]" type="checkbox" value="Japonesa"><label for="gusto8" class="subtitle">Japonesa</label>
            </div>
            
            <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorGustos'])) echo $_SESSION['errorGustos'];?>
            </div>
            
            <div class="input-container ic2">
                <input id="email" class="input" type="text" name="email" placeholder=" " />
                <div class="cut cut-short"></div>
                <label for="email" class="placeholder">Email</>
            </div>
            
            <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorEmail'])) echo $_SESSION['errorEmail'];?>
            </div>
            
            <div class="input-container ic2">
                <input id="contra" class="input" type="password" name="contra" placeholder=" " />
                <div style="font-family: sans-serif;color: red">
                <?php if(isset($_SESSION['errorContra'])) echo $_SESSION['errorContra'];?>
                </div>
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
                        
            <button type="submit" class="submit" onclick="">Registrarse</button>
        </div>
        </form>
    </body>
</html>

