
CREATE TABLE categoria_hotel (
  id_categoria_hotel int(11) NOT NULL COMMENT 'Identificador de la categoria del hotel',
  nombre varchar(100) NOT NULL COMMENT 'Nombre de la categoria'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de categorias del hotel' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: categoria_hotel` BEFORE UPDATE ON `categoria_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','categoria_hotel','Actualizar categoria_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: categoria_hotel` BEFORE INSERT ON `categoria_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','categoria_hotel','Nuevo categoria_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_categoria_hotel` BEFORE DELETE ON `categoria_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','categoria_hotel','Borrado de un categoria_hotel',CURRENT_USER)
$$
DELIMITER ;
