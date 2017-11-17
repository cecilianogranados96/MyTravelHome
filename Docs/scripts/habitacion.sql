
CREATE TABLE habitacion (
  id_habitacion int(11) NOT NULL COMMENT 'Identificador de la habitación',
  nombre varchar(100) NOT NULL COMMENT 'Nombre de la habitación ',
  id_hotel int(11) NOT NULL COMMENT 'Identificador del hotel',
  tipo_habitacion int(11) NOT NULL COMMENT 'ID del tipo de la habitación ',
  precio varchar(100) NOT NULL COMMENT 'Precio de la habitación ',
  numero_habitacion int(11) NOT NULL COMMENT 'Numero de la habitación ',
  estado int(1) NOT NULL DEFAULT '1' COMMENT 'Estado en el que se encuentra 1-0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de habitaciones por hotel' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: habitacion` BEFORE UPDATE ON `habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','habitacion','Actualizar habitacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: habitacion` BEFORE INSERT ON `habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','habitacion','Nuevo habitacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_habitacion` BEFORE DELETE ON `habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','habitacion','Borrado de un habitacion',CURRENT_USER)
$$
DELIMITER ;
