<br><br><br><br><br><br><br><br><br>
<?php
##################################################################
# 
# OBJETIVO:
# =========
#
# Calificación del hotel
#
# Desarrollo:
# 
# - JOSE ANDRÉS CECILIANO GRANADOS
#
#
###################################################################
?>
<?php 
 
if (isset($_GET['act'])){
       $query = "INSERT INTO `calificacion`( `id_hotel`, `id_usuario`, `puntaje`,`comentario`) VALUES (
        '".$_GET['id_hotel']."',
        '".$_SESSION['usuario']."',
        '".$_GET['cal']."',
        '".$_POST['comentario']."')";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        echo '<script>alert("¡Calificado con éxito!"); window.location.href = "?pag='.$_GET['pagina'].'";</script>';
}
?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Calificar hotel</h3>
            <p>My Travel Home</p>
        </center>
    </div>
    <div class="db-profile-edit">
        <center>
        <form class="s12" method="POST" action="?pag=<?php echo $_GET['pag']; ?>&id_hotel=<?php echo $_GET['id_hotel']; ?>&pagina=<?php echo $_GET['pagina']; ?>&cal=<?php echo $_GET['cal']; ?>&act=1" enctype="multipart/form-data">
            <div>
                <label>Comentario</label>
                <div class="input-field s12">
                   <p class="clasificacion">
                          <input type="text" class="validate" name="comentario">
                  </p>
                </div>
            </div>
        
            <div>
                <div class="input-field s4">
                    <center>
                        <input type="submit" value="Calificar" class="waves-effect waves-light log-in-btn"></center>
                </div>
            </div>
        </form>
    </div>
