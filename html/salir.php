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
# - JOSE ANDRES CECILIANO GRANADOS
#
# Mejoras:
# 
# - SILVIA CALDERON NAVARRO
#
###################################################################
    session_destroy(); 
    header ("Location: ?pag=inicio");
?>