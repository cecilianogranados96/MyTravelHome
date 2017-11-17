
CREATE TABLE usuario (
  id_usuario int(11) NOT NULL COMMENT 'Identificador de usuario',
  usuario varchar(100) NOT NULL COMMENT 'Nombre de usuario para el login',
  contrasena varchar(100) NOT NULL COMMENT 'Contraseña del login, en md5',
  tipo int(11) NOT NULL DEFAULT '0' COMMENT 'Tipo de usuario: 0 cliente, 2 agencia, 1 hotel, 3 administrador'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Datos de login para los usuarios generales' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Actualizar_usuario` BEFORE UPDATE ON `usuario` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','usuario','Actualizar usuario',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_usuario` BEFORE DELETE ON `usuario` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','usuario','Borrado de un usuario',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_usuario` BEFORE INSERT ON `usuario` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','usuario','Nuevo usuario',CURRENT_USER)
$$
DELIMITER ;
