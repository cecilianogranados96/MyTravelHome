
CREATE TABLE canton (
  id_canton int(11) NOT NULL COMMENT 'Identificador del canton',
  id_provincia int(11) NOT NULL COMMENT 'Identificador de la provincia',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del canton'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de cantones' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: canton` BEFORE UPDATE ON `canton` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','canton','Actualizar canton',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: canton` BEFORE INSERT ON `canton` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','canton','Nuevo canton',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_canton` BEFORE DELETE ON `canton` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','canton','Borrado de un canton',CURRENT_USER)
$$
DELIMITER ;
