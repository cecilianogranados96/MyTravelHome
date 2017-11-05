<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" alt="" />Mejorar una oferta</h3>
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
                    <center>Hotel</center>
                </th>
                <th>
                    <center>Habitacion</center>
                </th>
                <th>
                    <center>Precio</center>
                </th>
                <th>
                    <center>Mejorar</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <center>01</center>
                </td>
                <td>
                    <center>01</center>
                </td>
                <td>
                    <center>Alvin</center>
                </td>
                <td>
                    <center><a href="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&edit=1" class="btn btn-success">Descuento</a></center>
                </td>
            </tr>
        </tbody>
    </table>
    <?php } ?>
</div>