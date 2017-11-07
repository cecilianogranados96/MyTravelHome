<br><br><br><br><br><br><br><br><br>
<?php 
 
if (isset($_GET['act'])){

        $query = "INSERT INTO `reservacion`(`id_usuario`, `id_habitacion`, `fecha_entrada`, `fecha_salida`) VALUES 
        (
        '".$_SESSION['usuario']."',
        '".$_GET['id']."',
        '".$_POST['entrada']."',
        '".$_POST['salida']."'
        ) ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
       
        $query = "UPDATE `habitacion` SET `estado`= 0 WHERE `id_habitacion` = ".$_GET['id']." ";
 
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
   
    
        echo '<script>alert("Reservado con exito!"); window.location.href = "?pag=mis_reservaciones";</script>';
}


?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Reservar una habitacion</h3>
            <p>My Travel Home</p>
        </center>
    </div>
    <div class="db-profile-edit">
        <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&id=<?php echo $_GET['id']; ?>&act=1">
            <div>
                <label>Nombre Completo</label>
                <div class="input-field s12">
                    <input type="text" value="<?php echo $datos['nombre']." ".$datos['apellido']; ?>" class="validate" disabled>

                </div>
            </div>
           
            <div>
                <label>Fecha de llegada</label>
                <div class="input-field s12">
                    <input type="date" class="validate" name="entrada" required>

                </div>
            </div>
            <div>
                <label>Fecha de salida</label>
                <div class="input-field s12">
                    <input type="date" class="validate" name="salida" required>

                </div>
            </div>
            
            <div>
                <label>Numero de cuenta</label>
                <div class="input-field s12">
                    <input type="number" class="validate" value="<?php echo $datos['cuenta_bancaria']; ?>" disabled>

                </div>
            </div>
        

            <div>
                <div class="input-field s4">
                    <center>
                        <input type="submit" value="Reservar" class="waves-effect waves-light log-in-btn"></center>
                </div>
            </div>
        </form>
    </div>
