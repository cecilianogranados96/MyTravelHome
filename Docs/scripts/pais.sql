
CREATE TABLE pais (
  id_pais int(11) NOT NULL COMMENT 'Identificador del pais',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del pais'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de los países ' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: pais` BEFORE UPDATE ON `pais` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','pais','Actualizar pais',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: pais` BEFORE INSERT ON `pais` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','pais','Nuevo pais',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_pais` BEFORE DELETE ON `pais` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','pais','Borrado de un pais',CURRENT_USER)
$$
DELIMITER ;
