<!--TOP SECTION-->
	<br><br><br><br>	<style>
.ec-stars-wrapper {
	/* Espacio entre los inline-block (los hijos, los `a`) 
	   http://ksesocss.blogspot.com/2012/03/display-inline-block-y-sus-empeno-en.html */
	font-size: 0;
	/* Podríamos quitarlo, 
		pero de esta manera (siempre que no le demos padding), 
		sólo aplicará la regla .ec-stars-wrapper:hover a cuando
		también se esté haciendo hover a alguna estrella */
	display: inline-block;
}
.ec-stars-wrapper a {
	text-decoration: none;
	display: inline-block;
	/* Volver a dar tamaño al texto */
	font-size: 32px;
	font-size: 2rem;
	
	color: #888;
}

.ec-stars-wrapper:hover a {
	color: rgb(39, 130, 228);
}
/*
 * El selector de hijo, es necesario para aumentar la especifidad
 */
.ec-stars-wrapper > a:hover ~ a {
	color: #888;
}
</style>
<div class="inn-body-section pad-bot-55">
			<div class="container">
				<div class="row">
					<div class="page-head">
						<h2>Habitaciones </h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<p>Listado de habitaciones disponibles</p>
					</div>
					<!--ROOM SECTION-->
					
                        
                           <?php
                                if(isset($_GET['hotel'])){
                                    $hotel = "and hotel.id_hotel = ".$_GET['hotel'];
                                }else{
                                    $hotel = "";
                                }
                                $facilidades = "";
                                $estrellas = "";
                                $precio = "";
                                $query = 'SELECT habitacion.nombre as nombre_habitacion, hotel.nombre as nombre_hotel,hotel.id_hotel, habitacion.id_habitacion, habitacion.precio, habitacion.estado, categoria_hotel.nombre as categoria_hotel from habitacion INNER JOIN hotel on habitacion.id_hotel = hotel.id_hotel inner join categoria_hotel on categoria_hotel.id_categoria_hotel = hotel.categoria where habitacion.estado = 1 '.$hotel.' ';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    
                                    
                                    $result5 = mysql_query('SELECT descuento.porcentaje, agencia.nombre as nombre_agencia, agencia.foto from descuento INNER JOIN agencia on agencia.id_agencia = descuento.id_agencia WHERE descuento.id_habitacion =   '.$line['id_habitacion'].'');
                                   $line5 = mysql_fetch_array($result5, MYSQL_ASSOC);

                                   if(mysql_num_rows($result5) != 0 ){
                                        $pre = $line['precio'] - round($line5['porcentaje'] / $line['precio'] * 100, 2) ;
                                        $precio = '<p><span class="room-price-1">$'.$pre.'</span> <span class="room-price">$'.$line['precio'].'</span>';
                                        $agencia = $line5['nombre_agencia'];
                                        $foto = '<div class="ribbon ribbon-top-left"><span>Destacada</span></div><div class="r1 r-com"><img src="images/agencias/'.$line5['foto'].'"/></div>';
                                   }else{
                                        $precio = '<p><span class="room-price-1">$'.$line['precio'].'</span>';
                                        $agencia = 'Directo - Hotel';
                                       $foto = '<div class="r1 r-com"><img src="images/agencias/default.png"/></div>';
                                   }
                                    
                                    
                                    
                                    $result3 = mysql_query('SELECT servicios_hotel.nombre from servicios_hotel INNER JOIN servicios_por_hotel on servicios_por_hotel.id_servicio = servicios_hotel.id_servicio_hotel where servicios_por_hotel.id_hotel = '.$line['id_hotel'].'');
                                    while ($line3 = mysql_fetch_array($result3, MYSQL_ASSOC)) {
                                        $facilidades .=  "<li>".$line3['nombre']."</li>";
                                    }
                                    
                                    $cal = mysql_query('SELECT avg(`puntaje`) as cal from calificacion WHERE id_hotel = '.$line['id_hotel'].'');
                                    $call = mysql_fetch_array($cal, MYSQL_ASSOC); 
                                    
                                    if (round($call['cal'],0) == 0){
                                        $calificacion =  5;
                                    }else{
                                        $calificacion =  round($call['cal'],0);
                                    }
                                    
                                    for ($x=0;$x<$calificacion;$x++){
                                            $estrellas .= '<i class="fa fa-star"></i>';
                                    }
                                    
                                    echo '
                                    <div class="room">
                        
						'.$foto.'
						<div class="r2 r-com">
							<h4>'.$line['nombre_habitacion'].'</h4>
							<div class="r2-ratt"> 
                            <br>
                                <center>
                                '.$estrellas.'
                                <br>
                                
                                </center>
                                <span>Excellent  '.$calificacion.' / 5</span> 
                                
                                <br><hr><br>
                                ';
                        if(isset($_SESSION['usuario'])){
                                echo 'Calificar:<br>
                                <center>
                                   <div class="ec-stars-wrapper">
                                        <a href="?pag=calificar&id_hotel='.$line['id_hotel'].'&cal=1&pagina='.$_GET['pag'].'" data-value="1">&#9733;</a>
                                        <a href="?pag=calificar&id_hotel='.$line['id_hotel'].'&cal=2&pagina='.$_GET['pag'].'" data-value="1">&#9733;</a>
                                        <a href="?pag=calificar&id_hotel='.$line['id_hotel'].'&cal=3&pagina='.$_GET['pag'].'" data-value="1">&#9733;</a>
                                        <a href="?pag=calificar&id_hotel='.$line['id_hotel'].'&cal=4&pagina='.$_GET['pag'].'" data-value="1">&#9733;</a>
                                        <a href="?pag=calificar&id_hotel='.$line['id_hotel'].'&cal=5&pagina='.$_GET['pag'].'" data-value="1">&#9733;</a>
                                        
                                    </div>
                                </center>';

                        }
echo '
                            </div>
							
						</div>
						
						<div class="r3 r-com">
							<ul>
								'.$facilidades.'
							</ul>
						</div>
						
						<div class="r4 r-com">
							<p>Precio por noche</p>
							'.$precio.'
							</p>
							<p>'.$agencia.'</p>
						</div>
						<!--ROOM BOOKING BUTTON-->
						<div class="r5 r-com">
							<div class="r2-available">Disponible</div>
							<p>Precio por noche</p> <a href="?pag=reservar&id='.$line['id_habitacion'].'" class="inn-room-book">Reservar</a> </div>
					</div>
                ';
                                 
                                    
                                    $facilidades = "";
                                    $estrellas = "";
                                    $calificacion = 5;
                                }
                            ?>
                        
                        
                        
                        
                  
				</div>
			</div>
		</div>

	</section>
