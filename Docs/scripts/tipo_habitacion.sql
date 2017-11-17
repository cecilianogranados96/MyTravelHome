
CREATE TABLE tipo_habitacion (
  id_tipo_habitacion int(11) NOT NULL COMMENT 'Identificador del tipo de habitación ',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del tipo de habitación '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de tipos de habitaciones' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Actualizar_tipo_habitacion` BEFORE UPDATE ON `tipo_habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','tipo_habitacion','Actualizar tipo_habitacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_tipo_habitacion` BEFORE DELETE ON `tipo_habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','tipo_habitacion','Borrado de un tipo_habitacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_tipo_habitacion` BEFORE INSERT ON `tipo_habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','tipo_habitacion','Nuevo tipo_habitacion',CURRENT_USER)
$$
DELIMITER ;
