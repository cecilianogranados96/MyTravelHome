<!--TOP SECTION-->
		<br><br><br><br><div class="inn-body-section pad-bot-55">
			<div class="container">
				<div class="row">
					<div class="page-head">
						<h2>Mis reservaciones</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<p>Listado de reservaciones</p>
					</div>
					<!--ROOM SECTION-->
					
                        
                           <?php
                                $facilidades = "";
                                $precio = "";
                                $query = 'SELECT habitacion.nombre as nombre_habitacion, hotel.nombre as nombre_hotel,hotel.id_hotel, habitacion.id_habitacion, habitacion.precio, habitacion.estado, categoria_hotel.nombre as categoria_hotel, reservacion.fecha_entrada,reservacion.fecha_salida from habitacion INNER JOIN hotel on habitacion.id_hotel = hotel.id_hotel inner join categoria_hotel on categoria_hotel.id_categoria_hotel = hotel.categoria INNER JOIN reservacion on reservacion.id_habitacion = habitacion.id_habitacion and reservacion.id_usuario = '.$_SESSION['usuario'].'';
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
                                    echo '
                                    <div class="room">
                        
						'.$foto.'
						<div class="r2 r-com">
							<h4>'.$line['nombre_habitacion'].'</h4>
							<div class="r2-ratt"> 
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                                <span>Excellent  4.5 / 5</span> </div>
							<ul>
							</ul>
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
                        
                            <p>Fecha de entrada:</p>
						
                            <span class="room-price-1"> '.$line['fecha_entrada'].'</span>
                            
                            <p>Fecha de salida:</p>
							
                            <span class="room-price-1"> '.$line['fecha_salida'].'</span>
                            
                    
							
					</div>
                ';
                                 
                                    
                                   $facilidades = "";
                                  
                                }
                            ?>
                        
                        
                        
                        
                  
				</div>
			</div>
		</div>

	</section>
