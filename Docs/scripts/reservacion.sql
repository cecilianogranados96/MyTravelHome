
CREATE TABLE reservacion (
  id_reservacion int(11) NOT NULL COMMENT 'Identificador de la reservación ',
  id_usuario int(11) NOT NULL COMMENT 'Identificador del usuario',
  id_habitacion int(11) NOT NULL COMMENT 'Identificador de la habitación ',
  fecha_entrada date NOT NULL COMMENT 'Fecha de entrada de la reservación  ',
  fecha_salida date NOT NULL COMMENT 'Fecha de salida de la reservación '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Reservaciones a habitaciones por los clientes' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Actualizar_reservacion` BEFORE UPDATE ON `reservacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','reservacion','Actualizar reservacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_reservacion` BEFORE DELETE ON `reservacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','reservacion','Borrado de un reservacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_reservacion` BEFORE INSERT ON `reservacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','reservacion','Nuevo reservacion',CURRENT_USER)
$$
DELIMITER ;
