<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Personal activo</h3>
            <p>Se insertan las categorias de un hotel</p>
        </center>
    </div>

    <!--*************************EDITAR*************************-->
    <?php if (isset($_GET['edit'])){ ?>
    <center>
        <div class="db-profile-edit">
            <form class="col s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>">
                <div>
                    <label class="col s4">Descuento</label>
                    <div class="input-field col s8">
                        <input type="text" name="nombre" class="validate"> </div>
                </div>
                <div>
                    <div class="input-field col s8">
                        <input type="submit" value="Mejorar" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn">
                    </div>
                </div>
                <center>
                    <a href="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&borr=1" class="btn btn-danger">Eliminar descuento</a>
                </center>
            </form>
        </div>
    </center>
    <?php } ?>
    <!--*************************FIN EDITAR*************************-->

    <?php if (!isset($_GET['edit'])){ ?>


    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Nombre </center>
                </th>
                <th>
                    <center>Apellido</center>
                </th>
                <th>
                    <center>Cedula</center>
                </th>
                <th>
                    <center>Editar</center>
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                $query = 'SELECT * FROM adm_hotel where id_adm_hotel = '.$datos['id_adm_hotel'].'';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    echo "    <tr>
                                <td>
                                    <center>".$line['nombre']."</center>
                                </td>
                                <td>
                                    <center>".$line['apellido']."</center>
                                </td>
                                <td>
                                    <center>".$line['cedula']."</center>
                                </td>
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&edit=1' class='btn btn-success'>Editar</a></center>
                                </td>
                            </tr>
                ";
                }                   
            ?>
 
        </tbody>
    </table>
    <?php } ?>
</div>