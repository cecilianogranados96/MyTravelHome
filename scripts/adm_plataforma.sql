
CREATE TABLE adm_plataforma (
  id_adm_plataforma int(11) NOT NULL COMMENT 'Identificador del administrador de la plataforma',
  id_usuario int(11) NOT NULL COMMENT 'Identificador del usuario',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del administrador de la plataforma',
  apellido varchar(100) NOT NULL COMMENT 'Apellido del administrador de la plataforma',
  nacionalidad int(11) NOT NULL COMMENT 'Id de la nacionalidad del administrador de la plataforma',
  genero int(11) NOT NULL COMMENT 'Id del genero del administrador/empleado del hotel',
  cedula int(11) NOT NULL COMMENT 'Cedula del administrador de la plataforma',
  fecha_nacimiento date NOT NULL COMMENT 'fecha de nacimiento del administrador de la plataforma'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Administradores de la plataforma' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: adm_plataforma` BEFORE UPDATE ON `adm_plataforma` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','adm_plataforma','Actualizar adm_plataforma',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Borrar: adm_hotel` BEFORE DELETE ON `adm_plataforma` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','adm_hotel','Borrado de un adm_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: adm_plataforma` BEFORE INSERT ON `adm_plataforma` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','adm_plataforma','Nuevo adm_plataforma',CURRENT_USER)
$$
DELIMITER ;
