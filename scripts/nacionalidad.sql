
CREATE TABLE nacionalidad (
  id_nacionalidad int(11) NOT NULL COMMENT 'Identificador de la nacionalidad',
  nombre varchar(50) NOT NULL COMMENT 'Nombre de la nacionalidad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Catalogo de las nacionalidades' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: nacionalidad` BEFORE UPDATE ON `nacionalidad` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','nacionalidad','Actualizar nacionalidad',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: nacionalidad` BEFORE INSERT ON `nacionalidad` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','nacionalidad','Nuevo nacionalidad',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_nacionalidad` BEFORE DELETE ON `nacionalidad` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','nacionalidad','Borrado de un nacionalidad',CURRENT_USER)
$$
DELIMITER ;
