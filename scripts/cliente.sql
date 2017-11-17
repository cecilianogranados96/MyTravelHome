
CREATE TABLE cliente (
  id_cliente int(11) NOT NULL COMMENT 'Identificador del cliente',
  id_usuario int(11) NOT NULL COMMENT 'Identificador del usuario',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del cliente',
  apellido varchar(100) NOT NULL COMMENT 'Apellido del cliente',
  genero int(11) NOT NULL COMMENT 'ID genero del cliente',
  cedula int(100) NOT NULL COMMENT 'Cédula de cliente',
  fecha_nacimiento date NOT NULL COMMENT 'Fecha de nacimiento del cliente',
  cuenta_bancaria varchar(100) NOT NULL COMMENT 'Numero de cuenta bancaria del cliente',
  nacionalidad int(11) NOT NULL COMMENT 'ID nacionalidad del cliente',
  fotografia varchar(100) NOT NULL COMMENT 'URL de la fotografia del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Datos de los clientes' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: cliente` BEFORE UPDATE ON `cliente` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','cliente','Actualizar cliente',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: cliente` BEFORE INSERT ON `cliente` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','cliente','Nuevo cliente',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_cliente` BEFORE DELETE ON `cliente` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','cliente','Borrado de un cliente',CURRENT_USER)
$$
DELIMITER ;
