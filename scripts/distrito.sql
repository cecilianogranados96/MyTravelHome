
CREATE TABLE distrito (
  id_distrito int(11) NOT NULL COMMENT 'Identificador del distrito',
  id_canton int(11) NOT NULL COMMENT 'Identificador del canton',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del distrito'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de los distritos' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: distrito` BEFORE UPDATE ON `distrito` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','distrito','Actualizar distrito',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: distrito` BEFORE INSERT ON `distrito` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','distrito','Nuevo distrito',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_distrito` BEFORE DELETE ON `distrito` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','distrito','Borrado de un distrito',CURRENT_USER)
$$
DELIMITER ;
