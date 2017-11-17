
CREATE TABLE servicios_por_hotel (
  id_servicios_por_hotel int(11) NOT NULL COMMENT 'Identificador del servicio por hotel',
  id_hotel int(11) DEFAULT '0' COMMENT 'Identificador del hotel',
  id_servicio int(11) DEFAULT '0' COMMENT 'Identificador del servicio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Servicios ofrecidos por un hotel' ROW_FORMAT=COMPACT;
DELIMITER $$
CREATE TRIGGER `Actualizar_servicios_por_hotel` BEFORE UPDATE ON `servicios_por_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','servicios_por_hotel','Actualizar servicios_por_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_servicios_por_hotel` BEFORE DELETE ON `servicios_por_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','servicios_por_hotel','Borrado de un servicios_por_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_servicios_por_hotel` BEFORE INSERT ON `servicios_por_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','servicios_por_hotel','Nuevo servicios_por_hotel',CURRENT_USER)
$$
DELIMITER ;
