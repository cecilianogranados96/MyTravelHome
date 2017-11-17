
CREATE TABLE adm_hotel (
  id_adm_hotel int(11) NOT NULL COMMENT 'Identificador del administrador del hotel',
  id_usuario int(11) NOT NULL COMMENT 'Identificador del usuario',
  id_hotel int(11) NOT NULL COMMENT 'Identificador del hotel',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del administrador/empleado del hotel',
  apellido varchar(100) NOT NULL COMMENT 'Apellido del administrador/empleado del hotel',
  nacionalidad int(11) NOT NULL COMMENT 'Id de la Nacionalidad del administrador/empleado del hotel',
  genero int(11) NOT NULL COMMENT 'Id del Genero del administrador/empleado del hotel',
  cedula varchar(100) NOT NULL COMMENT 'Cédula del administrador/empleado del hotel',
  admin int(11) NOT NULL DEFAULT '0' COMMENT 'Indica si es un empleado o un administrador del hotel'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Administradores de los hoteles' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Actualizar_adm_hotel` BEFORE UPDATE ON `adm_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','adm_hotel','Actualizar adm_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_adm_hotel` BEFORE DELETE ON `adm_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','adm_hotel','Borrado de un adm_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_adm_hotel` BEFORE INSERT ON `adm_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','adm_hotel','Nuevo adm_hotel',CURRENT_USER)
$$
DELIMITER ;
