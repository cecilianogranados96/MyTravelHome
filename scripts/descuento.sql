
CREATE TABLE descuento (
  id_descuento int(11) NOT NULL COMMENT 'Identificador del descuento',
  id_agencia int(11) NOT NULL COMMENT 'Identificador de la agencia',
  id_habitacion int(11) NOT NULL COMMENT 'Identificador de la habitacion',
  porcentaje int(11) NOT NULL COMMENT 'Porcentaje de descuento'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Descuentos de las agencias a habitaciones' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: descuento` BEFORE UPDATE ON `descuento` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','descuento','Actualizar descuento',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: descuento` BEFORE INSERT ON `descuento` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','descuento','Nuevo descuento',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_descuento` BEFORE DELETE ON `descuento` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','descuento','Borrado de un descuento',CURRENT_USER)
$$
DELIMITER ;
