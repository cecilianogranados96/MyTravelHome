<?php 
##################################################################
# 
# OBJETIVO:
# =========
#
# Página reportes por aporte
#
# Desarrollo:
# 
# - JOSE ANDRÉS CECILIANO GRANADOS
#
#
###################################################################

$where = "";
if (isset($_GET['buscar'])){    
        $where = "where apellido LIKE '%".$_POST['nombre']."%' or nombre LIKE '%".$_POST['nombre']."%' ";    
}
if(isset($_GET['orden'])){ 
    $where = "ORDER by id_cliente DESC";
}
if(!isset($_GET['orden'])){ 
    $url = "?pag=plataforma/inicio&pagina=aportes&orden=1"; 
    $caret = "<i class='fa fa-caret-up' aria-hidden='true'></i>";
} else { 
    $url = "?pag=plataforma/inicio&pagina=aportes"; 
    $caret = "<i class='fa fa-caret-down' aria-hidden='true'></i>";
}
?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <br><br><br>
            <h3><img src="images/icon/dbc4.png" alt="" />Aportes</h3>
            <p>Aportes por usuario</p>
        </center>
    </div>
    <script src="http://fabianlindfors.se/multijs/multi.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://fabianlindfors.se/multijs/multi.min.css">
    <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&buscar=1">
        <input type="text" class="validate" name="nombre" placeholder="Busca por nombre o apellido">
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
                    <center>
                        <a href='<?php echo $url; ?>'>Nombre <?php echo $caret; ?></a>
                    </center>
                </th>
                <th>
                    <center> 
                        <a href='<?php echo $url; ?>'>Apellido <?php echo $caret; ?></a> 
                    </center>
                </th>
                <th>
                    <center>
                        <a href='<?php echo $url; ?>'>Reservaciones <?php echo $caret; ?></a> 
                    </center>
                </th>
                 <th>
                    <center> 
                        <a href='<?php echo $url; ?>'>Comentarios <?php echo $caret; ?></a>
                     </center>
                </th>
                <th>
                    <center> 
                        <a href='<?php echo $url; ?>'>Likes <?php echo $caret; ?></a>
                    </center>
                </th>    
            </tr>
        </thead>
        <tbody>
            
            <?php 
                $estrellas = "";
                $query = "select * from cliente $where " ;
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                  
                    $cal = mysql_query('SELECT COUNT(id_reservacion) as total_reservacion from reservacion where id_usuario = '.$line['id_usuario'].'');
                    $call = mysql_fetch_array($cal, MYSQL_ASSOC); 
                    $reservacion = $call['total_reservacion'];
                    
                    $cal2 = mysql_query('SELECT COUNT(id_likes_calificacion) as total from likes_calificacion where id_usuario = '.$line['id_usuario'].'');
                    $call2 = mysql_fetch_array($cal2, MYSQL_ASSOC); 
                    $likes = $call2['total'];
                    
                    $cal3 = mysql_query('SELECT COUNT(id_likes_calificacion) as total from likes_calificacion where id_usuario = '.$line['id_usuario'].'');
                    $call3 = mysql_fetch_array($cal3, MYSQL_ASSOC); 
                    $comentarios = $call3['total'];

                    
                    echo "    <tr>
                                <td>
                                    <center>".$line['nombre'].$line['id_usuario']."</center>
                                </td>
                                <td>
                                    <center>".$line['apellido']."</center>
                                </td>
                                <td>
                                    <center>$reservacion</center>
                                </td>
                                <td>
                                    <center>$comentarios</center>
                                </td>
                                <td>
                                    <center> $likes </center>
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

