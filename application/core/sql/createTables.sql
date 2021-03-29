
-- Tabla Lectores

CREATE TABLE Lector(    clave                       VARCHAR(20)     NOT NULL,
                        lector                      SMALLINT        NOT NULL        AUTO_INCREMENT,
                        tipo_lector                 SMALLINT        NOT NULL,
                        descripcion                 VARCHAR(50)     NOT NULL,
                        activo                      INT(1)          NOT NULL,
                        conexion                    VARCHAR(30)     NOT NULL,
                        f_ultima_marca              DATETIME(3)     NOT NULL,
                        relevador                   VARCHAR(15)     NOT NULL,
                        datos_complementarios       VARCHAR(30)     NOT NULL,
                        segundos                    SMALLINT        NOT NULL,
                        segundos_monitoreo          SMALLINT        NOT NULL,
                        minutos_desfase             SMALLINT        NOT NULL,
                        enrolador                   INT(1)          NOT NULL,
                        no_sincroniza               INT(1)          NOT NULL,
                        f_sincronizacion            DATETIME(3),
                        lector_global               SMALLINT,
                        mac                         VARCHAR(15),
                        UNIQUE (lector),
                        PRIMARY KEY(clave));

-- Tabla Empleados_Local

CREATE TABLE Empleado(  empleado        VARCHAR(10)     NOT NULL,
                        nombre_completo VARCHAR(40)     NOT NULL,
                        id              INT(10)         NOT NULL        AUTO_INCREMENT,
                        activo          INT(1)          NOT NULL,
                        localidad       VARCHAR(10)     NOT NULL,
                        f_creacion      DATETIME(3)     NOT NULL,
                        f_modificacion  DATETIME(3)     NOT NULL,
                        zona_acceso     VARCHAR(5)      NOT NULL,
                        no_sincroniza   INT(1)          NOT NULL,
                        UNIQUE (id),
                        PRIMARY KEY (empleado));


-- Tabla Marcas_Transferidas

CREATE TABLE Marca(     transferencia   INT(15)         NOT NULL,
                        consecutivo     INT(50)         NOT NULL        AUTO_INCREMENT,
                        hora            DATETIME(3)     NOT NULL,
                        lector          SMALLINT        NOT NULL, 
                        f_creacion      DATETIME(3)     NOT NULL,
                        datos           VARCHAR(10)     NOT NULL,
                        clave           VARCHAR(20)     NOT NULL,
                        ubicacion       VARCHAR(10),
                        codigo_marca    SMALLINT        NOT NULL,
                        complemento     VARCHAR(70)     NOT NULL,
                        UNIQUE (consecutivo),
                        FOREIGN KEY (clave) REFERENCES lector(clave),
                        FOREIGN KEY (datos) REFERENCES empleado(empleado));

-- Tabla Usuario					 
					 
CREATE TABLE Usuario(   n_empleado      VARCHAR(10)     NOT NULL,
                        contrasena      VARCHAR(75)     CHARACTER SET utf8 NOT NULL,
                        tipo            VARCHAR(7)      NOT NULL,
                        consecutivo     INT(50)         NOT NULL        AUTO_INCREMENT,
                        correo          VARCHAR(30)     NOT NULL,
                        UNIQUE(correo),
                        UNIQUE (consecutivo),
                        FOREIGN KEY (n_empleado) REFERENCES empleado(empleado),
                        PRIMARY KEY (n_empleado));



-- Tabla Ubicacion

CREATE TABLE Ubicacion( consecutivo     INT(5)          NOT NULL        AUTO_INCREMENT,
                        cve_ubicacion   VARCHAR(20)     NOT NULL,
                        usuario         VARCHAR(10)     NOT NULL,
                        FOREIGN KEY (usuario) REFERENCES usuario(n_empleado),
                        FOREIGN KEY (cve_ubicacion) REFERENCES lector(clave),
                        UNIQUE(consecutivo),
                        PRIMARY KEY(cve_ubicacion, usuario));








