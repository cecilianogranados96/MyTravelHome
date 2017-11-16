<?php 
##################################################################
# 
# OBJETIVO:
# =========
#
# Página de inicio de la aplicación
#
# Desarrollo:
# 
# - JOSE ANDRÉS CECILIANO GRANADOS
#
#
###################################################################
 if ( $datos['tipo'] != 0 ){
            echo '<script> window.location.href = "index.php?pag=salir";</script>';
} 
?> 
<div>
    <div class="slider fullscreen">
        <ul class="slides">
            <li> <img src="images/slider/1.jpg" alt="">
                <div class="caption center-align slid-cap">

                    <h2>¿Hotel? ¡My Travel Home!</h2>
                    <p>¿Cansado de buscar una habitación de hotel? My Travel Home es tu solución. Tenemos millones de habitaciones alrededor del mundo, solo navega y encuentra la habitación a tu medida.</p> <a href="?pag=habitaciones" class="waves-effect waves-light">Habitaciones</a> </div>
            </li>
            <li> <img src="images/slider/2.jpg" alt="">
                <div class="caption center-align slid-cap">
                    <h5 class="light grey-text text-lighten-3">My Travel Home.</h5>
                    <h2>¡Descuentos!</h2>
                    <p>Los mejores descuentos solamente en My Travel Home.</p> <a href="?pag=descuentos" class="waves-effect waves-light">Descuentos</a></div>
            </li>

        </ul>
    </div>
</div>
		<!--End Check Availability SECTION-->
		<!--END HOTEL ROOMS-->
		<!--CHECK AVAILABILITY FORM-->
<div class="check-available">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inn-com-form">
                    <form class="col s12">
                        <div class="row">
                            <div class="col s12 avail-title">
                                <h4>Buscar Hotel</h4> </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l2">
                                <select onchange="window.location.href = '?pais=' + this.value; ">
                                    <option value="" disabled selected>PAÍS</option>
                                    <?php
                                        $result = mysql_query('SELECT id_pais,nombre FROM pais') or die('Consulta fallida: ' . mysql_error());
                                        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                            if ($line['id_pais'] == $_GET['pais']){
                                                    echo "<option value='".$line['id_pais']."' selected>".strtoupper($line['nombre'])."</option>";    
                                                }else{
                                                    echo "<option value='".$line['id_pais']."'>".strtoupper($line['nombre'])."</option>";
                                                }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="input-field col s12 m4 l2">
                                <?php if (isset($_GET['pais'])){ ?>
                                    <select onchange="window.location.href = '?pais=<?php echo $_GET['pais']; ?>&provincia=' + this.value; " >
                                    <option value="" disabled selected>PROVINCIA</option>
                                    <?php
                                        }   
                                        if (!isset($_GET['pais'])){
                                            echo "<select><option disabled selected>PROVINCIA</option>";
                                            
                                        }else {
                                            $result = mysql_query('SELECT `id_provincia`, `nombre` FROM `provincia` WHERE `id_pais` = '.$_GET['pais'].'') or die('Consulta fallida: ' . mysql_error());
                                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                                if ($line['id_provincia'] == $_GET['provincia']){
                                                    echo "<option value='".$line['id_provincia']."' selected>".strtoupper($line['nombre'])."</option>";    
                                                }else{
                                                    echo "<option value='".$line['id_provincia']."'>".strtoupper($line['nombre'])."</option>";
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="input-field col s12 m4 l2">
                                     <?php if (isset($_GET['provincia'])){ ?>
                                    <select onchange="window.location.href = '?pais=<?php echo $_GET['pais']; ?>&provincia=<?php echo $_GET['provincia']; ?>&canton=' + this.value; " >
                                    <option value="" disabled selected>CANTÓN</option>
                                    <?php
                                        }   
                                        if (!isset($_GET['provincia'])){
                                            echo "<select><option disabled selected>CANTÓN</option>"; 
                                        }else {
                                            $result = mysql_query('SELECT `id_canton`, `nombre` FROM `canton` WHERE `id_provincia` = '.$_GET['provincia'].'') or die('Consulta fallida: ' . mysql_error());
                                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                               
                                                if ($line['id_canton'] == $_GET['canton']){
                                                    echo "<option value='".$line['id_canton']."' selected>".strtoupper($line['nombre'])."</option>";    
                                                }else{
                                                    echo "<option value='".$line['id_canton']."'>".strtoupper($line['nombre'])."</option>";
                                                }
                                                
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="input-field col s12 m4 l2">
                                     <?php if (isset($_GET['canton'])){ ?>
                                    <select onchange="window.location.href = '?pais=<?php echo $_GET['pais']; ?>&provincia=<?php echo $_GET['provincia']; ?>&canton=<?php echo $_GET['canton']; ?>&distrito=' + this.value; " >
                                    <option value="" disabled selected>DISTRITO</option>
                                    <?php
                                        }   
                                        if (!isset($_GET['canton'])){
                                            echo "<select><option disabled selected>DISTRITO</option>"; 
                                        }else {
                                            $result = mysql_query('SELECT `id_distrito`, `nombre` FROM `distrito` WHERE `id_canton` = '.$_GET['canton'].'') or die('Consulta fallida: ' . mysql_error());
                                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                               
                                                if ($line['id_distrito'] == $_GET['distrito']){
                                                    echo "<option value='".$line['id_distrito']."' selected>".strtoupper($line['nombre'])."</option>";    
                                                }else{
                                                    echo "<option value='".$line['id_distrito']."'>".strtoupper($line['nombre'])."</option>";
                                                }
                                                
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="input-field col s12 m4 l2">
                                <input type="text" id="from" name="from" value="<?php if (isset($_GET['from'])){ echo $_GET['from']; }?>" <?php if (isset($_GET['provincia'])){ ?>
                                    onchange="window.location.href = '?pais=<?php echo $_GET['pais']; ?>&provincia=<?php echo $_GET['provincia']; ?>&canton=<?php echo $_GET['canton']; ?>&distrito=<?php echo $_GET['distrito']; ?>&from=' + this.value; " <?php } ?> > 
                                <label for="from">Fecha de arribo</label>
                            </div>
                            <div class="input-field col s12 m4 l2">
                                <input type="text" id="to" name="to" value="<?php if (isset($_GET['to'])){ echo $_GET['to']; }?>"  <?php if (isset($_GET['from'])){ ?>
                                    onchange="window.location.href = '?pais=<?php echo $_GET['pais']; ?>&provincia=<?php echo $_GET['provincia']; ?>&canton=<?php echo $_GET['canton']; ?>&distrito=<?php echo $_GET['distrito']; ?>&from=<?php echo $_GET['from']; ?>&to=' + this.value; " <?php } ?>>
                                <label for="to">Fecha de salida</label>
                            </div>
                            
                            
                        </div>
                        <br><br>
                        <center>
                                <?php 
                            
                                if (isset($_GET['to'])){
                                    
                                    $url1 = "?pag=habitaciones&pais=".$_GET['pais']."&provincia=".$_GET['provincia']."&canton=".$_GET['canton']."&distrito=".$_GET['distrito']."&from=".$_GET['from']."&to=".$_GET['to']."";
                                    
                                    $url2 = "?pag=hoteles&pais=".$_GET['pais']."&provincia=".$_GET['provincia']."&canton=".$_GET['canton']."&distrito=".$_GET['distrito']."&from=".$_GET['from']."&to=".$_GET['to']."";
                                    
                                }else{
                                    $url1 = "#";
                                    $url2 = "#";
                                }
                                ?>
                                <a href="<?php echo $url1; ?>" class="form-btn">Buscar Habitaciones</a>         
                           


                             
                                <a href="<?php echo $url2; ?>" class="form-btn">Buscar Hoteles</a>
                           
                        </center>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
		<!--END CHECK AVAILABILITY FORM-->
		<div class="offer">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">Habitaciones 5 estrellas</span> <span class="ol-3"></span> <span class="ol-5"> My Travel Home</span>
							<ul>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis1.png" alt="">
									</a><span>WiFi</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/h2.png" alt=""> </a><span>Desayuno</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis3.png" alt=""> </a><span>Piscina</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis4.png" alt="" text-align:center> </a><span>Televisión</span>                                    
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis5.png" alt=""> </a><span>Gimnasio</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="offer-r">
							<div class="or-1"> <span class="or-11">MTH</span> <span class="or-12"></span> </div>
							<div class="or-2"> <span class="or-21">Descuentos</span> <span class="or-22">50%</span> <span class="or-23"> o más</span> <span class="or-24">MyTravelHome</span> <span class="or-25"></span> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hom-com">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">						
                        
							<div class="hp-section">
								<div class="hp-sub-tit">
									<h4><span>Facilidades de nuestros</span> hoteles</h4>
									<p>Algunas facilidades de nuestros hoteles son.</p>
								</div>
								<div class="hp-amini">
									<ul>
										<li><img src="images/icon/a1.png" alt=""> Tocador</li>
										<li><img src="images/icon/a2.png" alt=""> Restaurante</li>
										<li><img src="images/icon/a3.png" alt=""> Refrigeración</li>
										<li><img src="images/icon/a4.png" alt=""> Internet</li>
										<li><img src="images/icon/a5.png" alt=""> Servicio al cuarto</li>
										<li><img src="images/icon/a6.png" alt=""> Parqueo</li>
										<li><img src="images/icon/a7.png" alt=""> Calentador</li>
										<li><img src="images/icon/a8.png" alt=""> Seguridad</li>
										<li><img src="images/icon/a9.png" alt=""> Desayunos</li>
										<li><img src="images/icon/a10.png" alt=""> Médico</li>
										
									</ul>
								</div>
							</div>

						</div>
					</div>
				
				</div>
			</div>
		</div>
