<br><br><br><br>
<?php
##################################################################
# 
# OBJETIVO:
# =========
#
# Registro de un nuevo cliente
#
# Desarrollo:
# 
# - JOSE ANDRÉS CECILIANO GRANADOS
#
#
###################################################################
?>
    <div class="db-profile"> 

        <h4>Registro de clientes</h4>

    </div>
	
    <div class="db-profile-edit"><center>
        <form class="col s12" method="post"  action="?pag=verificar&rcliente=1" enctype="multipart/form-data" style="width: 350px;">
                <div>
                <label class="col s4">Usuario</label>
                <div class="input-field col s8">
                    <input type="text" class="validate" name="user"> </div>
            </div>
                <div>
                <label class="col s4">Contraseña</label>
                <div class="input-field col s8">
                    <input type="password"  class="validate" name="pass"> </div>
            </div>
            <div>
                <label class="col s4">Nombre</label>
                <div class="input-field col s8">
                    <input type="text"  class="validate" name="nombre"> </div>
            </div>

            <div>
                <label class="col s4">Apellido</label>
                <div class="input-field col s8">
                    <input type="text"  class="validate" name="apellido"> </div>
            </div>
            <div>
                <label class="col s4">Género</label>
                <div class="input-field col s8">
                    <select name="genero">
                        <option value="1">Femenino</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="col s4">Cédula</label>
                <div class="input-field col s8">
                    <input type="number" lass="validate" name="cedula"> </div>
            </div>
            <div>
                <label class="col s4">Fecha de nacimiento</label>
                <div class="input-field col s8">
                    <input type="date"  class="validate" name="fecha"> </div>
            </div>
              <div>
                <label class="col s4">Cuenta bancaria</label>
                <div class="input-field col s8">
                    <input type="number" class="validate" name="cuenta"> </div>
            </div>

            <div>
                <label class="col s4">Nacionalidad</label>
                <div class="input-field col s8">

                    <select name="nacionalidad">
                        <option value="1">Costarricence</option>
                    </select>
                </div>
            </div>



            <div>
                <div class="file-field input-field">
                    <div class="btn" id="pro-file-upload"> <span>Fotografía</span>
                        <input type="file" name="foto"> </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" > </div>
                </div>
            </div>


            <div>
                <div class="input-field col s8">
                    <input type="submit" value="Registrarse" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
            </div>
        </form>
        </center>
    </div>
