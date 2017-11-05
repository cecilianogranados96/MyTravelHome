
<?
        
        $query = "SELECT * FROM `adm_hotel` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);
        $query = "SELECT usuario FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos2 = mysql_fetch_array($result, MYSQL_ASSOC);
        
        $query = "SELECT nombre as nombre_hotel FROM `hotel` WHERE id_hotel = '".$datos['id_hotel']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos3 = mysql_fetch_array($result, MYSQL_ASSOC);       

        $datos = array_merge($datos,$datos2,$datos3);

        print_r($datos);



?>

<div class="dashboard" style="margin-top: 0px !important;">
			<div class="db-left">
				<div class="db-left-1">
					<h4><?php echo $datos['nombre_hotel']; ?></h4>
				</div>
				<div class="db-left-2">
					<ul>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>"> <img src="images/icon/db1.png" alt="" /> Cuenta</a>
						</li>
                         <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=registro_habitaciones"> <img src="images/icon/db2.png" alt="" />Registro de Habitaciones</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=habitaciones"> <img src="images/icon/db2.png" alt="" />Habitaciones</a>
						</li>
                        <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=reportes"> <img src="images/icon/db2.png" alt="" />Reportes</a>
						</li>
                        <?php if($datos['admin']==0){ ?> 
                            <li>
                                <a href="?pag=<?php echo $_GET['pag']; ?>&pagina=registro_personal"> <img src="images/icon/db2.png" alt="" />Registro de personal</a>
                            </li>
                                <li>
                                <a href="?pag=<?php echo $_GET['pag']; ?>&pagina=personal"> <img src="images/icon/db2.png" alt="" />Personal</a>
                            </li>
                        
                            <li>
                                <a href="?pag=<?php echo $_GET['pag']; ?>&pagina=cuenta_hotel"> <img src="images/icon/db2.png" alt="" />Cuenta Hotel</a>
                            </li>
                        
                        
                        <?php } ?>
                        
                         
						<li>
							<a href="?pag=salir"> <img src="images/icon/db8.png" alt="" /> Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="db-cent" style="padding: 55px;">
			
                <?php if(!isset($_GET['pagina'])){ 
                        include "html/hoteles/cuenta.php";     
                    }else{
                        include "html/hoteles/".$_GET['pagina'].".php";    
                    }
                ?>

			</div>
		</div>
	</section>