<br><br><br><br><br><br><br><br>
<?php
##################################################################
# 
# OBJETIVO:
# =========
#
# Registro de una nueva agencia
#
# Desarrollo:
# 
# - JOSE ANDRÉS CECILIANO GRANADOS
#
# Mejoras:
# 
# - SILVIA CALDERÓN NAVARRO
#
###################################################################
?>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Registro de agencias</h3>
            <p>My Travel Home</p>
        </center>
    </div>
    <div class="db-profile-edit">
        <center>
            <form class="s12" method="post" action="?pag=verificar&ragencia=1" enctype="multipart/form-data" style="width: 311px;">
                <div>
                    <label>Usuario</label>
                    <div class="input-field s12">
                        <input type="text" data-ng-model="name1" class="validate" name="user" required>
                    </div>
                </div>
                <div>
                    <label>Contraseña</label>
                    <div class="input-field s12">
                        <input type="password" class="validate" name="pass" required>
                    </div>
                </div>
                <div>
                    <label>Nombre de la agencia</label>
                    <div class="input-field s12">
                        <input type="text" class="validate" name="nombre_agencia" required>
                    </div>
                </div>
                <div>
                    <br>
                    <center>
                        <label>Fotografía</label>
                    </center>
                    <div class="input-field s12">
                        <input type="file" class="validate" name="foto" required>
                    </div>
                </div>
                <div>
                    <div class="input-field s4">
                        <center>
                            <input type="submit" value="Registro" class="waves-effect waves-light log-in-btn"> 
                        </center>
                    </div>
                </div>
            </form>
