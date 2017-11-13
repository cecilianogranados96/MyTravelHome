<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Reportes</h3>
            <p>Reporte de estado de las habitaciones</p>
        </center>
    </div>

    
    <?php 
                    $estrellas = "";
                    $cal = mysql_query('SELECT avg(`puntaje`) as cal from calificacion WHERE id_hotel = '.$datos['id_hotel'].'');
                    $call = mysql_fetch_array($cal, MYSQL_ASSOC); 
                                    
                    if (round($call['cal'],0) == 0){
                        $calificacion =  5;
                    }else{
                        $calificacion =  round($call['cal'],0);
                    }
                    for ($x=0;$x<$calificacion;$x++){
                            $estrellas .= '<i class="fa fa-star"></i>';
                    }

                    $cal2 = mysql_query('SELECT COUNT(id_habitacion) as habitaciones from habitacion WHERE id_hotel =  '.$datos['id_hotel'].'');
                    $call2 = mysql_fetch_array($cal2, MYSQL_ASSOC);         
                    $habitaciones = $call2['habitaciones'];            
    
                    $cal3 = mysql_query('SELECT COUNT(id_habitacion) as reservaciones from habitacion WHERE id_hotel = '.$datos['id_hotel'].'');
                    $call3 = mysql_fetch_array($cal3, MYSQL_ASSOC);         
                    $reservaciones = $call3['reservaciones'];     
    
    
    
    ?>
    
    
    
				<div class="db-cent-2">
					<div class="db-2-main-1">
						<div class="db-2-main-2"> <img src="images/icon/dbc5.png" alt=""> <span>Reservaciones</span>
							<p>Cantidad de habitaciones reservadas</p>
							<h2><?php echo $reservaciones; ?></h2> </div>
					</div>
					<div class="db-2-main-1">
						<div class="db-2-main-2"> <img src="images/icon/dbc6.png" alt=""> <span>Habitaciones</span>
							<p>Total de habitaciones</p>
							<h2><?php echo $habitaciones; ?></h2> </div>
					</div>
					<div class="db-2-main-1">
						<div class="db-2-main-2"> <img src="images/icon/dbc3.png" alt=""> <span>Puntuaciones</span>
							<p>Total de estrellas según las puntuaciones</p>
							<h2><?php echo $calificacion; ?></h2><h3><?php echo $estrellas; ?> </div>
					</div>
				</div>
