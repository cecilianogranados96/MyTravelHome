
CREATE TABLE servicios_hotel (
  id_servicio_hotel int(11) NOT NULL COMMENT 'Identificador del servicio',
  nombre varchar(100) NOT NULL COMMENT 'Nombre del servicio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de los servicios de los hoteles' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Actualizar_servicios_hotel` BEFORE UPDATE ON `servicios_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','servicios_hotel','Actualizar servicios_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_servicios_hotel` BEFORE DELETE ON `servicios_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','servicios_hotel','Borrado de un servicios_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_servicios_hotel` BEFORE INSERT ON `servicios_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','servicios_hotel','Nuevo servicios_hotel',CURRENT_USER)
$$
DELIMITER ;
