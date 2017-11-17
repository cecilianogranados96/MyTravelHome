
CREATE TABLE provincia (
  id_provincia int(11) NOT NULL COMMENT 'Identificador de la provincia',
  id_pais int(11) NOT NULL COMMENT 'ID del pais',
  nombre varchar(100) NOT NULL COMMENT 'Nombre de la provincia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de las provincias' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: provincia` BEFORE UPDATE ON `provincia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','provincia','Actualizar provincia',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: provincia` BEFORE INSERT ON `provincia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','provincia','Nuevo provincia',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_provincia` BEFORE DELETE ON `provincia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','provincia','Borrado de un provincia',CURRENT_USER)
$$
DELIMITER ;
