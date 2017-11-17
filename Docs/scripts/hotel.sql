
CREATE TABLE hotel (
  id_hotel int(11) NOT NULL COMMENT 'Identificador del hotel',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del hotel',
  tipo_hotel int(11) NOT NULL COMMENT 'ID del tipo de hotel',
  caracteristica text NOT NULL COMMENT 'Características del hotel',
  distrito int(11) NOT NULL COMMENT 'ID del distrito donde se encuentra',
  localizacion varchar(100) NOT NULL COMMENT 'Localización mediante coordenadas',
  estado int(1) NOT NULL DEFAULT '1' COMMENT 'Estado del hotel 1-0',
  rango_precio int(11) NOT NULL COMMENT 'ID del rango de precio',
  categoria int(11) NOT NULL COMMENT 'ID de la categoria del hotel'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Hoteles registrados' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: hotel` BEFORE UPDATE ON `hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','hotel','Actualizar hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: hotel` BEFORE INSERT ON `hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','hotel','Nuevo hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_hotel` BEFORE DELETE ON `hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','hotel','Borrado de un hotel',CURRENT_USER)
$$
DELIMITER ;
