<br><br><br><br><br><br><br><br>
<?php
##################################################################
# 
# OBJETIVO:
# =========
#
# Comentarios de la calificaciones
#
# Desarrollo:
# 
# - JOSE ANDRÉS CECILIANO GRANADOS
#
# 
#
###################################################################
?>
<style>
blockquote{
    border-left:none
}
.quote-badge{
    background-color: rgba(0, 0, 0, 0.2);   
}

.quote-box{
    overflow: hidden;
    margin-top: -50px;
    padding-top: -100px;
    border-radius: 17px;
    background-color: #4ADFCC;
    margin-top: 25px;
    color:white;
    box-shadow: 2px 2px 2px 2px #E0E0E0;   
}
.quotation-mark{
    font-weight: bold;
    font-size:100px;
    color:white;
    font-family: "Times New Roman", Georgia, Serif;    
}
.quote-text{
    font-size: 15px;
    margin-top: -65px;
}
    
</style>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Comentarios del hotel</h3>
            <p>My Travel Home</p>
        </center>
    </div>

    <div class="db-profile-edit">
              <?php 
                if (isset($_GET['like'])){
                        $query = "INSERT INTO `likes_calificacion`(`id_calificacion`, `id_usuario`) VALUES (".$_GET['like'].",".$_SESSION['usuario'].")" ;
                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                }
                if (isset($_GET['unlike'])){
                        $query = "DELETE FROM `likes_calificacion` WHERE `id_calificacion` = ".$_GET['unlike']." and `id_usuario` = ".$_SESSION['usuario']." " ;
                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());  
                }

                $query = "select calificacion.id_calificacion, calificacion.comentario, cliente.nombre, cliente.apellido,cliente.id_usuario from calificacion INNER join cliente on cliente.id_usuario = calificacion.id_usuario" ;
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

         
                $result2 = mysql_query("select COUNT(id_likes_calificacion) AS totallikes from likes_calificacion WHERE id_calificacion = ".$line['id_calificacion']."  ") or die('Consulta fallida: ' . mysql_error());
                $line2 = mysql_fetch_array($result2, MYSQL_ASSOC);
                $likes = $line2['totallikes'];
                    
                
                
                $result3 = mysql_query("select COUNT(id_likes_calificacion) AS totallikes from likes_calificacion WHERE id_usuario = ".$line['id_usuario']."  and id_calificacion = ".$line['id_calificacion']."  ") or die('Consulta fallida: ' . mysql_error());
                $line3 = mysql_fetch_array($result3, MYSQL_ASSOC);
                $me = $line3['totallikes'];
                
                if ($me == 0){
                    $meg = "<a href='?pag=comentarios&like=".$line['id_calificacion']."#p".$line['id_calificacion']."' class='btn btn-success'>Me gusta ($likes)</a>";
                }else{
                    $meg = "<a href='?pag=comentarios&unlike=".$line['id_calificacion']."#p".$line['id_calificacion']."' class='btn btn-danger'>No gusta ($likes)</a>";
                }
                
                        
                        
                    echo "        
                    <div id='#p".$line['id_calificacion']."'>
                    <blockquote class='quote-box' >
                      <p class='quotation-mark'>
                        “
                      </p>
                      <p class='quote-text'>
                       ".$line['comentario']."
                      </p>
                      <hr>
                      <div class='blog-post-actions'>
                        <p class='blog-post-bottom pull-left'>
                          ".$line['nombre']." ".$line['apellido']."
                        </p>
                        <p class='blog-post-bottom pull-right'>
                            $meg
                        </p>
                      </div>
                    </blockquote></div>";

                }                   
            ?>
      
</div>
        
        
        