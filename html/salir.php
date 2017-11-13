<?php 


##################################################################
# 
# OBJETIVO:
# =========
#
# Salir del sistema
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
    session_destroy(); 
    header ("Location: ?pag=inicio");
?>