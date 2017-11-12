

<?php 

if (isset($_GET['rhotel'])){
    $query = "INSERT INTO `usuario`(`usuario`, `contrasena`, `tipo`) VALUES ('".$_POST['user']."','".md5($_POST['pass'])."',1)";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    $query = "INSERT INTO `adm_hotel`(`id_usuario`, `nombre`, `apellido`, `nacionalidad`, `genero`, `cedula`, `admin`,id_hotel) 
        VALUES ('".mysql_insert_id()."','".$_POST['apellido_p']."','".$_POST['apellido_p']."','".$_POST['nacionalidad']."','".$_POST['genero']."','".$_POST['cedula']."','".$_POST['admin']."','".$datos['id_hotel']."')";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    echo '<script>alert("Registrado con exito!"); window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}
?>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Registro de personal</h3>
            <p>Datos de acceso</p>
        </center>
    </div>

	<div class="db-profile-edit">
       <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&rhotel=1">
                    <div>
                        <label>Usuario</label>
                        <div class="input-field s12">
                            <input type="text" class="validate" name="user">
                            
                    </div>
                    </div>
                       <div>
                           <label>Contraseña</label>
                        <div class="input-field s12">
                            <input type="password" class="validate" name="pass">
                            
                        </div>
                    </div>
                     <div>
                         <label>Nombre de la persona</label>
                        <div class="input-field s12">
                            <input type="text" class="validate" name="nombre_p">
                            
                        </div>
                    </div>   
                     <div>
                         <label>Apellido de la persona</label>
                        <div class="input-field s12">
                            <input type="text" class="validate" name="apellido_p">
                            
                        </div>
                    </div>
                     <div>
                           <label>Cedula</label>
                        <div class="input-field s12">
                            <input type="number" class="validate"  name="cedula">
                          
                        </div>
                    </div>
                     <div>
                            <label>Genero</label>
                        <div class="input-field s12">
                               <select name="genero" class="validate" >
                                <?php
                                    $query = 'SELECT * FROM genero';
                                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                        echo "<option value='".$line['id_genero']."'>".$line['nombre']."</option>";
                                    }
                                ?>
                            </select>
                         
                        </div>
                    </div>
                                     
                   <div>
                       <label>Nacionalidad</label>
                        <div class="input-field s12">
                            
                            <select name="nacionalidad" class="validate" >
                                   <?php
                                    $query = 'SELECT * FROM nacionalidad';
                                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                        echo "<option value='".$line['id_nacionalidad']."'>".$line['nombre']."</option>";
                                    }
                                ?>
                            </select>
                            
                        </div>
                    </div> 
           
                    <input type="text" class="validate"  value="<?php echo $datos['id_adm_hotel']; ?>" name="admin" hidden="1">
                    
                    <div>
                        <div class="input-field s4"><center>
                            <input type="submit" value="Registrar" class="waves-effect waves-light log-in-btn"></center> </div>
                    </div>
                </form>
				</div>
