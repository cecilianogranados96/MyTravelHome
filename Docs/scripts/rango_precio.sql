
CREATE TABLE rango_precio (
  id_rango int(11) NOT NULL COMMENT 'Identificador del rango de precio',
  precio_inicial varchar(100) NOT NULL COMMENT 'Precio inicial en símbolos $',
  precio_final varchar(100) NOT NULL COMMENT 'Precio final en símbolos $'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de los rangos de precio ' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Actualizar_rango_precio` BEFORE UPDATE ON `rango_precio` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','rango_precio','Actualizar rango_precio',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_rango_precio` BEFORE DELETE ON `rango_precio` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','rango_precio','Borrado de un rango_precio',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_rango_precio` BEFORE INSERT ON `rango_precio` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','rango_precio','Nuevo rango_precio',CURRENT_USER)
$$
DELIMITER ;
