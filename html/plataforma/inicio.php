<?
##################################################################
# 
# OBJETIVO:
# =========
#
# Página de inicio
#
# Desarrollo:
# 
# - SILVIA CALDERÓN NAVARRO
#
#
###################################################################

        
        $query = "SELECT * FROM `adm_plataforma` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);
        $query = "SELECT usuario FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos2 = mysql_fetch_array($result, MYSQL_ASSOC);
        $query = "SELECT usuario as nombre FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos3 = mysql_fetch_array($result, MYSQL_ASSOC);    
        
        $datos = array_merge($datos,$datos2,$datos3);

?>

    <div class="dashboard" style="margin-top: 0px !important;">
			<div class="db-left">
				<div class="db-left-1">
                    <h4>Administrador</h4>                    
				</div>
				<div class="db-left-2">
					<ul>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>"><img src="images/icon/db1.png" alt="" /> General</a>
						</li>                    
                        <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=bitacora"><img src="images/icon/h7.png" alt="" /> Bitácora</a>
						</li>
                        <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=hoteles"><img src="images/icon/h5.png" alt="" /> Hoteles</a>
						</li>
                        
                        <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=aportes"><img src="images/icon/h2.png" alt="" /> Aportes</a>
						</li>
                        
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=categorias"><img src="images/icon/h1.png" alt="" /> Categorías</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=tipos"><img src="images/icon/db3.png" alt="" /> Tipos de hotel</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=precios"><img src="images/icon/db6.png" alt="" /> Precios</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=puntuaciones"><img src="images/icon/db1.png" alt="" /> Puntuaciones</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=servicios"><img src="images/icon/h2.png" alt="" /> Servicios</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=habitaciones"><img src="images/icon/h5.png" alt="" /> Habitaciones</a>
						</li>
						<li>
							<a href="?pag=salir"><img src="images/icon/db8.png" alt="" /> Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="db-cent" style="padding: 55px;">
                <?php if(!isset($_GET['pagina'])){?>
                <div class="db-title">
                    <br> <br>
                    <center>
                        <h3><img src="images/icon/dbc4.png" />Administrador de plataforma</h3>
                    </center>
                    <br>
                    <br>
                </div>
                <div class="db-cent-table db-com-table">
                <table class="bordered responsive-table">
                <thead>
                    <tr>
                        <th>
                            <center>Nombre completo</center>
                        </th>
                        <th>
                            <center>Cédula</center>
                        </th>
                          <th>
                            <center>Usuario</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query = "SELECT adm_plataforma.nombre, adm_plataforma.apellido, adm_plataforma.cedula, usuario.usuario FROM adm_plataforma  INNER JOIN usuario ON adm_plataforma.id_usuario = usuario.id_usuario AND adm_plataforma.id_usuario ='".$_SESSION['usuario']."'";
                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {                          
                        echo "    <tr>
                                    <td>
                                        <center>".$line['nombre']." ".$line['apellido']. "</center>
                                    </td>
                                    <td>
                                        <center>".$line['cedula']."</center>
                                    </td>
                                    <td>
                                        <center>".$line['usuario']."</center>
                                    </td>

                                </tr>
                    ";
                    }                    
                ?>											
             </tbody>
        </table>
        </div>
        
            <div class="db-cent" style="padding: 55px;">			
            <?php    
                }else{
                    include "html/plataforma/".$_GET['pagina'].".php";    
                }
            ?>

            </div>
        </div>
    </div>

                