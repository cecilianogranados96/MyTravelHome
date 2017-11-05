<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" alt="" />Categorias</h3>
            <p>Se insertan las categorias de un hotel</p>
        </center>
    </div>

    <!--*************************EDITAR*************************-->
    <?php if (isset($_GET['edit'])){ ?>
    <center>
        <div class="db-profile-edit">
            <form class="col s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>">
                <div>
                    <label class="col s4">Nombre</label>
                    <div class="input-field col s8">
                        <input type="text" name="nombre" class="validate"> </div>
                </div>
                <div>
                    <div class="input-field col s8">
                        <input type="submit" value="Editar" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn">
                    </div>
                </div>
                <center>
                    <a href="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&borr=1" class="btn btn-danger">Eliminar</a>
                </center>
            </form>
        </div>
    </center>
    <?php } ?>
    <!--*************************FIN EDITAR*************************-->

    <?php if (!isset($_GET['edit'])){ ?>
    <center>
        <div class="db-profile-edit">
            <form class="col s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>">
                <div>
                    <label class="col s4">Nombre</label>
                    <div class="input-field col s8">
                        <input type="text" name="nombre" class="validate"> </div>
                </div>
                <div>
                    <div class="input-field col s8">
                        <input type="submit" value="Nueva categoria" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn">
                    </div>
                </div>
            </form>

        </div>
    </center>

    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Numero</center>
                </th>
                <th>
                    <center>Nombre</center>
                </th>
                <th>
                    <center>Editar</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <center>01</center>
                </td>
                <td>
                    <center>Alvin</center>
                </td>
                <td>
                    <center><a href="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&edit=1" class="btn btn-success">Editar</a></center>
                </td>
            </tr>
        </tbody>
    </table>
    <?php } ?>
</div>