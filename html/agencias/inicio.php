<?                
        $query = "SELECT usuario FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $query = "SELECT nombre as nombre_agencia, foto FROM `agencia` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);
        $datos = array_merge($datos,$datos2);
?>
		
<div class="dashboard" style="margin-top: 0px !important;">
			<div class="db-left">
				<div class="db-left-1">
					<h4><?php echo $datos['nombre_agencia']; ?></h4>
				</div>
				<div class="db-left-2">
					<ul>
                        <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=cuenta"><img src="images/icon/db2.png" alt="" />Cuenta</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=oferta"><img src="images/icon/db2.png" alt="" />Ver Ofertas</a>
						</li>
                        <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=oferta_nueva"><img src="images/icon/db2.png" alt="" />Crear Oferta</a>
						</li>                        
						<li>
							<a href="?pag=salir"><img src="images/icon/db8.png" alt="" /> Logout</a>
						</li>
					</ul>
				</div>
			</div>
            
            <div class="db-cent" style="padding: 55px;">			
                 <?php if(!isset($_GET['pagina'])){ 
                    include "html/agencias/cuenta.php";     
                        }else{
                            include "html/agencias/".$_GET['pagina'].".php";    
                        }
                    ?>
            </div>
        </div>
	</section>
