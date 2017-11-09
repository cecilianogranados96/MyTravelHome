
<?php 
if (isset($_GET['buscar'])){    
        $where = "";
        foreach ($_POST['servicios'] as $option_value)
        {            
       
            $where .= "servicios_por_hotel.id_servicio = ".$option_value." or ";
            
        }
    $where = substr($where, 0,-3);
    //echo $where;
    
}
?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <br><br><br>
            <h3><img src="images/icon/dbc4.png" alt="" />Hoteles por servicios</h3>
            <p>Muestra los hoteles que dan los servicios escogidos</p>
        </center>
    </div>
    <script src="http://fabianlindfors.se/multijs/multi.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://fabianlindfors.se/multijs/multi.min.css">
    <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&buscar=1">
        <select multiple="multiple" name="servicios[]" id="servicios">
            <?php
                $select = "";
                $query = 'SELECT id_servicio_hotel, nombre FROM servicios_hotel';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());  
                $servicios = "";
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                   echo "<option value='".$line['id_servicio_hotel']."' $select >".$line['nombre']." </option>";
                   $servicios = "<option value='".$line['id_servicio_hotel']."' $select >".$line['nombre']." </option>";
                }
                echo servicios;
            ?>
        </select>
        <div>
            <div class="input-field s4">
                <center>
                    <input type="submit" value="Buscar" class="waves-effect waves-light log-in-btn">
                </center>
            </div>
        </div>
    </form>
    <div>
        <br><br>
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Nombre </center>
                </th>
                <th>
                    <center>Distrito</center>
                </th>
                <th>
                    <center>Categoría </center>
                </th>
                 <th>
                    <center>Tipo</center>
                </th>
                <th>
                    <center>Puntaje</center>
                </th>
               
                <th>
                    <center>Estado</center>
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                $estrellas = "";
                $query = 'SELECT hotel.nombre,hotel.id_hotel, distrito.nombre as distrito, tipo_hotel.nombre as tipo_hotel, hotel.estado, categoria_hotel.nombre as categoria_hotel from hotel INNER join distrito on distrito.id_distrito = hotel.distrito inner join tipo_hotel on tipo_hotel.id_tipo_hotel = hotel.tipo_hotel inner join categoria_hotel on categoria_hotel.id_categoria_hotel = hotel.categoria INNER join servicios_por_hotel on servicios_por_hotel.id_hotel = hotel.id_hotel where '.$where.'';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    
                    if ($line['estado'] == 1){
                        $estado = "Activo";
                    }else{
                        $estado = "Desactivado";
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
                
                    echo "    <tr>
                                <td>
                                    <center>".$line['nombre']."</center>
                                </td>
                                <td>
                                    <center>".$line['distrito']."</center>
                                </td>
                                <td>
                                    <center>".$line['categoria_hotel']."</center>
                                </td>
                                <td>
                                    <center>".$line['tipo_hotel']."</center>
                                </td>
                                <td>
                                    <center> $estrellas (".$calificacion.") </center>
                                </td>
                                <td>
                                    <center>".$estado."</center>
                                </td>
                            </tr>
                ";
                    $estado = "";
                    $estrellas = "";
                }                   
            ?>
 
        </tbody>
    </table>
    </div>
</div>

