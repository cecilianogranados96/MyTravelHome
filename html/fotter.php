<?php 
##################################################################
# 
# OBJETIVO:
# =========
#
# Footter de la aplicación
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
<div id="general" class="modal fade" role="dialog">
    <div class="log-in-pop">
        <div class="log-in-pop-left">
            <h4>Ingresar</h4>
             <form class="s12" method="post"  action="?pag=verificar&verificar=1">
                <div>
                    <div class="input-field s12">
                        <input type="text" data-ng-model="name" class="validate" name="user">
                        <label>Usuario</label>
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input type="password" class="validate" name="pass">
                        <label>Contraseña</label>
                    </div>
                </div>
                <div>
                    <div class="input-field s4"><center>
                        <input type="submit" value="Ingresar" class="waves-effect waves-light log-in-btn"> 
                        </center></div>
                </div>
            </form>
        </div>
    </div>
</div>

</section>
<!--ALL SCRIPT FILES-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/angular.min.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/materialize.min.js" type="text/javascript"></script>
<script src="js/jquery.mixitup.min.js" type="text/javascript"></script>
<script src="js/custom.js"></script>
</body>

</html>
