

<?php 
if (isset($_GET['rhotel'])){
    $query = "
    
    INSERT INTO `habitacion`(`nombre`, `id_hotel`, `tipo_habitacion`, `precio`, `numero_habitacion`) VALUES (
    '".$_POST['nombre']."',
    '".$datos['id_hotel']."',
     '".$_POST['tipo']."',
    '".$_POST['precio']."',
    '".$_POST['numero']."')";
    echo $query;
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    echo '<script>alert("Registrado con exito!"); window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}
?>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Registro de Habitaciones</h3>
            <p>Datos de acceso</p>
        </center>
    </div>

	<div class="db-profile-edit">
       <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&rhotel=1">
                    <div>
                        <label>Nombre</label>
                        <div class="input-field s12">
                            <input type="text" class="validate" name="nombre">
                            
                        </div>
                    </div>
                       <div>
                           <label>Tipo de habitacion</label>
                        <div class="input-field s12">
                               <select name="tipo" class="validate" >
                                <option value=""></option>
                                <option value="1">Costariccense</option>
                    </select>
                            
                        </div>
                    </div>
                     <div>
                         <label>Precio</label>
                        <div class="input-field s12">
                            <input type="text" class="validate" name="precio">
                            
                        </div>
                    </div>   
                    <div>
                         <label>Numero</label>
                        <div class="input-field s12">
                            <input type="number" class="validate" name="numero">
                        </div>
                    </div>
                 
           
                    <div>
                        <div class="input-field s4"><center>
                            <input type="submit" value="Registrar" class="waves-effect waves-light log-in-btn"></center> </div>
                    </div>
                </form>
				</div>
