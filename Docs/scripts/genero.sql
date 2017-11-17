
CREATE TABLE genero (
  id_genero int(11) NOT NULL COMMENT 'Identificador del genero',
  nombre varchar(50) NOT NULL COMMENT 'Nombre del genero'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Catalogo de generos' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: genero` BEFORE UPDATE ON `genero` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','genero','Actualizar genero',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: genero` BEFORE INSERT ON `genero` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','genero','Nuevo genero',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_genero` BEFORE DELETE ON `genero` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','genero','Borrado de un genero',CURRENT_USER)
$$
DELIMITER ;
