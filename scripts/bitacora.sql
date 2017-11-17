
CREATE TABLE bitacora (
  id_bitacora int(11) NOT NULL COMMENT 'Identificador de la biblioteca',
  fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha del cambio en la base ',
  tipo_cambio varchar(100) NOT NULL COMMENT 'Descripción del tipo de cambio en la base',
  objeto varchar(100) NOT NULL COMMENT 'Objeto modificado',
  descripcion text NOT NULL COMMENT 'Descripción de los objetos',
  Usuario varchar(100) NOT NULL COMMENT 'Usuario que aplica el cambio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Bitácora de cambios' ROW_FORMAT=COMPACT;
