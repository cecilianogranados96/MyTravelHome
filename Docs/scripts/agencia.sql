
CREATE TABLE agencia (
  id_agencia int(11) NOT NULL COMMENT 'Identificador de la agencia',
  id_usuario int(11) NOT NULL COMMENT 'Identificador del usuario',
  nombre varchar(100) NOT NULL COMMENT 'Nombre de la agencia',
  foto varchar(100) NOT NULL COMMENT 'Url de la foto de la agencia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Datos de las agencias' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Actualizar_agencias` BEFORE UPDATE ON `agencia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','agencia','Actualizar agencia',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_agencia` BEFORE DELETE ON `agencia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','agencia','Borrado de un agencia',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_agencia` BEFORE INSERT ON `agencia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','agencia','Nuevo agencia',CURRENT_USER)
$$
DELIMITER ;
