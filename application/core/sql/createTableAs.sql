
-- Tablas de Reportes ya funcionales
CREATE TABLE ReporteEmpleadoGral as SELECT  em.empleado, em.nombre_completo, mac.hora, mac.lector, mac.complemento,
                        mac.datos, l.descripcion
                        FROM marca AS mac
                            INNER JOIN empleado as em
                            ON em.empleado = mac.datos
                            INNER JOIN lector as l
                            ON l.clave = mac.clave

CREATE TABLE ReporteEmpleado as SELECT  em.empleado, em.nombre_completo, mac.hora, mac.lector, mac.complemento,
                        mac.datos, l.descripcion
                        FROM marca AS mac
                            INNER JOIN empleado as em
                            ON em.empleado = mac.datos
                            INNER JOIN lector as l
                            ON l.clave = mac.clave
                        WHERE (em.empleado = 400)

CREATE TABLE ReporteClaveLector as SELECT  em.empleado, em.nombre_completo, mac.hora, mac.lector, mac.complemento,
                        mac.datos, l.descripcion
                        FROM marca AS mac
                            INNER JOIN empleado as em
                            ON em.empleado = mac.datos
                            INNER JOIN lector as l
                            ON l.clave = mac.clave
                        WHERE (l.clave = 'ckjb201760199')

CREATE TABLE ReporteDesc as SELECT  em.empleado, em.nombre_completo, mac.hora, mac.lector, mac.complemento,
                        mac.datos, l.descripcion
                        FROM marca AS mac
                            INNER JOIN empleado as em
                            ON em.empleado = mac.datos
                            INNER JOIN lector as l
                            ON l.clave = mac.clave
                        WHERE (l.descripcion = 'VIGILANCIA PIRINEOS PROFACE XTD')




--pruebas de reporte, ignorar y mantener como referencia por el momento
--query por hora
CREATE TABLE Reporte as SELECT  em.empleado, em.nombre_completo, mac.hora, mac.complemento, mac.clave,
                        mac.datos, 
                        FROM empleado as em
                        INNER JOIN marca as mac
                        ON em.empleado = mac.datos
                        WHERE mac.hora = 2021-03-08 07:00:00
        
    
--query por empleado                    
CREATE TABLE Reporte as SELECT  em.empleado, em.nombre_completo, mac.hora, mac.complemento, mac.clave,
                        mac.datos
                        FROM empleado as em
                        INNER JOIN marca as mac
                        ON em.empleado = mac.datos
                        WHERE em.nombre_completo = 'MARTINEZ GARCIA GLORIA'
)