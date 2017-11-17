
CREATE TABLE calificacion (
  id_calificacion int(11) NOT NULL COMMENT 'Identificador de la calificación ',
  id_hotel int(11) NOT NULL COMMENT 'Identificador del hotel',
  id_usuario int(11) NOT NULL COMMENT 'Identificador del usuario',
  puntaje int(11) NOT NULL COMMENT 'Puntaje dado a la calificación 1-5',
  comentario text NOT NULL COMMENT 'Comentario de la calificación '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Calificaciones de los hoteles' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: calificacion` BEFORE UPDATE ON `calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','calificacion','Actualizar calificacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: calificacion` BEFORE INSERT ON `calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','calificacion','Nuevo calificacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_calificacion` BEFORE DELETE ON `calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','calificacion','Borrado de un calificacion',CURRENT_USER)
$$
DELIMITER ;
