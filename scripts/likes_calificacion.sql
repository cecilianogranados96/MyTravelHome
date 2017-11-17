
CREATE TABLE likes_calificacion (
  id_likes_calificacion int(11) NOT NULL COMMENT 'Identificador del like por comentario',
  id_calificacion int(11) NOT NULL COMMENT 'ID de la calificación / comentario',
  id_usuario int(11) NOT NULL COMMENT 'ID del usuario que efectua el like'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Likes de los comentarios de las calificaciones' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: likes_calificacion` BEFORE UPDATE ON `likes_calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','likes_calificacion','Actualizar likes_calificacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: likes_calificacion` BEFORE INSERT ON `likes_calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','likes_calificacion','Nuevo likes_calificacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_likes_calificacion` BEFORE DELETE ON `likes_calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','likes_calificacion','Borrado de un likes_calificacion',CURRENT_USER)
$$
DELIMITER ;
