<?php
    session_start();
    include ("MySqlConn.php");
    //$idPlatillo = $_POST['idPlatillos'];
    //Primero sacamos los datos del platillo
    $conexion = conectar();
    $idPlatillo = 8;
    $sql = "SELECT * FROM platillos_bebidas WHERE id_platillo = ".$idPlatillo."";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc(); 
    $nombrePlatillo = $row["nombre"];
    $descripcionPlatillo = $row["descripcion"];
    $imagenURL = $row["imagen"];
    //Calcular el promedio de calificaciones del platillo
    $sql = "SELECT ROUND(AVG(calificacion),1) AS promedio, COUNT(*) AS numOp FROM opiniones WHERE id_platillo = ".$idPlatillo;
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
    $promedio = $row['promedio']*10;
    $numeroDeOpiniones = $row['numOp'];
    mysqli_close($conexion);
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Publicaciones</title>
        <link rel="stylesheet" href="estilosFasfu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script>
        $('#mostrarComentar').click(function(){
            $('#comentar').show('slow');
            $('#mostrarComentar').hide(1000);
        });    
        $(document).ready(function() {
            // Establecemos las dimensiones de las estrellas
            var star_rating_width = $('.fill-ratings span').width();
            //Se pasan los porcentajes a las estrellas.
            $('.star-ratings').width(star_rating_width);
        });
        function mostrarCajaComentar(){
            //Mostramos la caja de opinar y escondemos el boton de opinar.
            $('#comentar').show('slow');
            $('#mostrarComentar').hide('slow');
        }
        
        function ocultarCajaComentar(){
            //Escondemos la caja de opinar y mostramos el boton de opinar.
            $('#comentar').hide('slow');
            $('#mostrarComentar').show('slow');
        }   
        </script>   
           
    </head>
    <body>
       <TABLE width="80%"> <TR><TD align="center">Aquí va la barra de herramientas</td></TR> <TR><TD>
       <DIV class=centerDiv>
	<P> 
            <H1 class=titulo align="CENTER" style="word-wrap: break-word"><?php echo $nombrePlatillo;?></H1><BR> 
            <IMG src="<?php echo $imagenURL?>" style="margin-left: auto;margin-right: auto;display: block;width: 70%"> 
            <TABLE align="center" >
                <TR> 
                    <TD style="vertical-align: middle">
                        <H1 class=titulo align="LEFT" style="word-wrap: break-word"><BR>Calificación de usuarios <?php echo "(".$numeroDeOpiniones.")";?>: </H1>
                    </TD>
                    <TD>
                        <div class="star-ratings">
                            <div class="fill-ratings" style="width: <?php echo $promedio?>%;">
                              <span>★★★★★</span>
                            </div>

                            <div class="empty-ratings">
                              <span>★★★★★</span>
                            </div>
                        </div>
                    </TD>
            </TR>
            </table>
            <DIV  style="position: relative;text-align: center;color: black">
                <DIV style="position: relative;">
                        <P style="font-family: bahnschrift;color: black;font-size: 21;text-align: justify;word-wrap: break-word">
                            <?php echo $descripcionPlatillo;?>
                        </P>
                </DIV>
            </DIV>
            <button id="mostrarComentar" onclick="mostrarCajaComentar()">Opinar</button>
            <DIV  id="comentar" style="position: relative;text-align: center;color: white;display: none;background-color: grey">
                <form method="get" action="PublicarOpinion.php">
                <input type="hidden" name="idPlatillo" value="<?php echo $idPlatillo;?>">    
                <DIV style="position: relative;">
                    <CENTER>
                        <P style="font-family: bahnschrift;color: black;font-size: 21;text-align: justify;word-wrap: break-word;">
                            ¿Del 1 al 10, cuánto te gustó el platillo?
                            <input type="number" required name="calif" min="0" max="10" value="0" step=".1" required="true"><BR>
                            <textarea name="comentOpin" rows="10" style="margin-left: auto;margin-right: auto;display: block;width: 70%" required="true">¡Escribe tu opinión aquí!
                            </textarea>
                        </P>
                    </CENTER>
                </DIV>
                <button type="submit">Enviar</button>    
                </form>
                <button id="ocultarComentar" onclick="ocultarCajaComentar()">Cancelar</button>
            </DIV> 
            
            
            <H1 class=titulo align="CENTER" style="word-wrap: break-word">Opiniones</H1>            
            <?php
                /*En toda esta sección imprimiremos las respuestas al post.
                */
                $conexion = conectar();
                if(!$conexion){
                    echo "ERROR";
                }else{
                    //echo "Conn ok <BR>";
                }
                
                $sql = "SELECT CONCAT(us.nombre,' ',us.apellidos) AS nombre, op.comentario, op.calificacion "
                        . "FROM usuario us, opiniones op WHERE op.id_platillo = ".$idPlatillo." AND op.id_usuario = us.id_usuario ORDER BY op.id_opinion DESC";
                
                //Primero vemos si hay respuestas en el post.
                if($result = $conexion->query($sql)){
                   if (mysqli_num_rows($result) > 0) {
                       //Se recorren las respuestas registradas y se imprimen.
                       while($row = $result->fetch_assoc()){
                           echo "
                           <DIV  style='position: relative;text-align: justify;color: black'>
                                <DIV style='position: relative;'>
                                    <P style='font-family: bahnschrift;color: black;font-size: 21;text-align: justify;word-wrap: break-word'>
                                        <B>".$row["nombre"]."</B> opina: 
                                        <div class='star-ratings'>
                                            <div class='fill-ratings' style='width: ".($row["calificacion"]*10)."%;'>
                                              <span>★★★★★</span>
                                            </div>

                                            <div class='empty-ratings'>
                                              <span>★★★★★</span>
                                            </div>
                                        </div><BR>"
                                        .$row["comentario"]."
                                    </P>
                                </DIV>
                            </DIV>       
                            
                            ";        
                           //Línea para dividir entre respuestas.
                           echo "<HR noshade size=10px width=100% color='black' style='border-radius: 50px'>";
                       }
            
                   }else{
                       //Si el post no tiene respuestas, se informa.
                       echo "<HR>
                           <DIV  style='position: relative;text-align: center;color: white'>
                                <DIV style='position: relative;'>

                                    <P style='font-family: bahnschrift;color: black;font-size: 21;text-align: justify;word-wrap: break-word'>
                                        No existen opiniones por el momento.
                                    </P>
                                </DIV>
                            </DIV>       
                            <HR noshade size=10px width=100% color='black' style='border-radius: 50px'>";
                   }
                }else{
                    echo "ERROR";
                }
                mysqli_close($conexion);
            ?>
       </p>
       </div>
                </TD></TR></table>   
    </body>
</html>
