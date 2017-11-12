<?php 
    $query = "SELECT usuario, contrasena FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    $datos2 = mysql_fetch_array($result, MYSQL_ASSOC);
    $query = "SELECT id_agencia, nombre, foto FROM `agencia` WHERE id_usuario = '".$_SESSION['usuario']."' ";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    $datos = mysql_fetch_array($result, MYSQL_ASSOC);
    $datos = array_merge($datos2,$datos);

    if (isset($_GET['rdescuento'])){
        $query = "

        INSERT INTO `descuento`(id_descuento, `id_agencia`, `id_habitacion`, `porcentaje`) VALUES ('".mysql_insert_id()."',
        '".$datos['id_agencia']."',
        '".$_POST['habitacion']."',
         '".$_POST['porcentaje']."')";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        echo '<script>alert("¡Registrado con éxito!"); window.location.href = "?pag='.$_GET['pag'].'&pagina=oferta";</script>';
    }
?>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Registro de ofertas</h3>
            <p>Datos de acceso</p>
        </center>
    </div>

	<div class="db-profile-edit">
        <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&rdescuento=1">
            <div>
                <label>Hotel</label>
                    <div class="input-field s12">
                        <select name="hotel" class="validate" >
                            <?php
                                $query = 'SELECT * FROM hotel';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    echo "<option value='".$line['id_hotel']."'>".$line['nombre']."</option>";
                                }
                            ?>                                                                      
                        </select>

                    </div>
            </div>
            <div>
                <label>Habitacion</label>
                    <div class="input-field s12">
                        <select name="habitacion" class="validate" >
                            <?php
                                //$query = 'SELECT * FROM habitacion where id_hotel =  '.$_POST['hotel'].'';
                                $query = 'SELECT * FROM habitacion';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    echo "<option value='".$line['id_habitacion']."'>".$line['nombre']."</option>";
                                }
                            ?>                                                                      
                        </select>

                    </div>
            </div>
             <div>
                 <label>Porcentaje</label>
                <div class="input-field s12">
                    <input type="text" class="validate" name="porcentaje">                            
                </div>
            </div>                       
            <div>
                <div class="input-field s4"><center>
                    <input type="submit" value="Registrar" class="waves-effect waves-light log-in-btn"></center> </div>
            </div>
        </form>
    </div>
