
CREATE TABLE tipo_hotel (
  id_tipo_hotel int(11) NOT NULL COMMENT 'Identificador del tipo de hotel',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del tipo de hotel',
  descripcion text NOT NULL COMMENT 'Descripción del tipo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo del tipo de hotel' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Actualizar_tipo_hotel` BEFORE UPDATE ON `tipo_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','tipo_hotel','Actualizar tipo_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_tipo_hotel` BEFORE DELETE ON `tipo_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','tipo_hotel','Borrado de un tipo_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_tipo_hotel` BEFORE INSERT ON `tipo_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','tipo_hotel','Nuevo tipo_hotel',CURRENT_USER)
$$
DELIMITER ;
