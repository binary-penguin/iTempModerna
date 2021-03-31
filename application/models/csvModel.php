<?php
// Start session
session_start();


class csvModel {

    function __construct() {

        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'moderna2';
        $port = 3306;
        $connect_db = mysqli_connect($host,$user,$password,$db, $port);

        /*
        
        
        $host = '127.0.0.1';
        $user = 'azure';
        $password = '6#vWHD_$';
        $db = 'moderna2';
        $port = 54978;
        $connect_db = mysqli_connect($host,$user,$password,$db, $port);
        */


        if(!$connect_db){
            echo 'Error de conexion con BD';
        }
        else{
            echo 'Conexión exitosa a localdb' . "<br>";
        
            mysqli_query($connect_db, "SET NAMES 'utf8' ");
        
             // Check if the form is submitted, ISSET NEEDS SUBMIT BUTTON NAME="SUBMIT"
             if (isset($_POST['empleados']) ) {
                
                // Add employees
                $employees = $this->getRegistries(URL . 'public/csv/empleado.csv', array('csvModel', 'parseEmployees'));
        
                foreach($employees as $employee) {
        
                    $em = $employee['empleado'];
                    $n_com = $employee['nombre_completo'];
                    $a = $employee['activo'];
                    $l = $employee['localidad'];
                    $fc = $employee['f_creacion'];
                    $fm = $employee['f_modificacion'];
                    $za = $employee['zona_acceso'];
                    $s = $employee['no_sincroniza'];
                    
                    $query_employee = "INSERT INTO empleado (empleado, nombre_completo, activo, localidad, f_creacion, f_modificacion, zona_acceso, no_sincroniza)
                                        VALUES($em,'$n_com', $a, '$l', '$fc', '$fm', $za, $s)";
                    
                    mysqli_query($connect_db,$query_employee);
    
                
                    if(!$query_employee){
                        echo 'Error WHILE INSERTING EMPLOYEE!!' . "<br>";
                        echo $query_employee . "<br>";
                    }
           
                }
        
                echo "Employees inserted!";
            }
        
            elseif (isset($_POST['lectores']) ) {
        
                // Add readers
                $readers = $this->getRegistries(URL . 'public/csv/lector.csv', array('csvModel','parseReaders'));
        
                foreach ($readers as $reader) {
        
                    $tipo_lector = $reader['tipo_lector'];
                    $descripcion = $reader['descripcion'];
                    $clave = $reader['clave'];
                    $conexion = $reader['conexion'];
                    $activo = $reader['activo'];
                    $f_ultima_marca = $reader['f_ultima_marca'];
                    $mac = $reader['mac'];
                    $relevador = $reader['relevador'];
                    $datos_complementarios = $reader['datos_complementarios'];
                    $segundos = $reader['segundos'];
                    $segundos_monitoreo = $reader['segundos_monitoreo'];
                    $minutos_desfase = $reader['minutos_desfase'];
                    $enrolador = $reader['enrolador'];
                    $f_sincronizacion = $reader['f_sincronizacion'];
                    $lector_global = $reader['lector_global'];
                    $no_sincroniza = $reader['no_sincroniza'];
        
                    $query_reader = "INSERT INTO lector (tipo_lector, descripcion, clave, conexion, activo, f_ultima_marca, mac, relevador,
                                                        datos_complementarios, segundos, segundos_monitoreo, minutos_desfase, enrolador,
                                                        f_sincronizacion, lector_global, no_sincroniza) VALUES (" . $tipo_lector . ", '" . $descripcion . "', " .  "'" . $clave . "', " .
                                                        "'" . $conexion . "', " . $activo . ", '" . $f_ultima_marca . "', " . "" . $mac . ", " . "'" . $relevador ."', " .
                                                        "'" . $datos_complementarios  . "', " . $segundos . ", " . $segundos_monitoreo . ", " . $minutos_desfase . ", " . $enrolador . ", " .
                                                        "" . $f_sincronizacion . ", " . "" . $lector_global . ", "  . $no_sincroniza . ")";
        
        
                    $yeah = mysqli_query($connect_db, $query_reader);
                    //echo $relevador . "<br>";
                    
        
                    if (!$yeah) {
                        echo "Error WHILE INSERTING READER!!" . "<br>";
                        echo $query_reader . "<br>";
                    }
                    
                }
        
                echo "readers Inserted!!";
        
            }
            
            elseif (isset($_POST['marcas']) ) { 
        
                // Add temps
                $temps = $this->getRegistries(URL . 'public/csv/marca.csv', array('csvModel','parseTemps'));
        
                foreach ($temps as $temp) {
        
                    $transferencia = $temp['transferencia'];
                    $consecutivo = $temp['consecutivo'];
                    $hora = $temp['hora'];
                    $lector = $temp['lector'];
                    $f_creacion = $temp['f_creacion'];
                    $datos = $temp['datos'];
                    $clave = $temp['clave'];
                    $ubicacion = $temp['ubicacion'];
                    $codigo_marca = $temp['codigo_marca'];
                    $complemento = $temp['complemento'];
        
                    $query_temp = "INSERT INTO marca (transferencia, hora, lector, f_creacion, datos, clave, ubicacion, codigo_marca, complemento) VALUES
                                    (" . $transferencia . ", '" . $hora . "', " . "'" . $lector . "', '" . $f_creacion . "', " . "'" . $datos . "', '" . $clave . "', " . "'" . $ubicacion . 
                                    "', '" . $codigo_marca . "', " . "'" . $complemento . "')";
        
                    $yeah = mysqli_query($connect_db, $query_temp);
                    //echo $query_temp . "<br>";
        
                    if (!$yeah) {
                        //echo "ERROR WHILE INSERTING TEMP!! <br>";
                    }
                }
        
                echo "marcas Inserted!!";
        
            }
        
            elseif (isset($_POST['marcas2']) ) { 
        
                // Add temps
                $temps = $this->getRegistries(URL . 'public/csv/marca2.csv', array('csvModel','parseTemps'));
        
                foreach ($temps as $temp) {
        
                    $transferencia = $temp['transferencia'];
                    $consecutivo = $temp['consecutivo'];
                    $hora = $temp['hora'];
                    $lector = $temp['lector'];
                    $f_creacion = $temp['f_creacion'];
                    $datos = $temp['datos'];
                    $clave = $temp['clave'];
                    $ubicacion = $temp['ubicacion'];
                    $codigo_marca = $temp['codigo_marca'];
                    $complemento = $temp['complemento'];
        
                    $query_temp = "INSERT INTO marca (transferencia, hora, lector, f_creacion, datos, clave, ubicacion, codigo_marca, complemento) VALUES
                                    (" . $transferencia . ", '" . $hora . "', " . "'" . $lector . "', '" . $f_creacion . "', " . "'" . $datos . "', '" . $clave . "', " . "'" . $ubicacion . 
                                    "', '" . $codigo_marca . "', " . "'" . $complemento . "')";
        
                    $yeah = mysqli_query($connect_db, $query_temp);
                    //echo $query_temp . "<br>";
        
                    if (!$yeah) {
                        //echo "ERROR WHILE INSERTING TEMP!! <br>";
                    }
                }
        
                echo "marcas2 Inserted!!";
            
            }
        
            elseif (isset($_POST['marcas3']) ) { 
        
                // Add temps
                $temps = $this->getRegistries(URL . 'public/csv/marca3.csv', array('csvModel','parseTemps'));
        
                foreach ($temps as $temp) {
        
                    $transferencia = $temp['transferencia'];
                    $consecutivo = $temp['consecutivo'];
                    $hora = $temp['hora'];
                    $lector = $temp['lector'];
                    $f_creacion = $temp['f_creacion'];
                    $datos = $temp['datos'];
                    $clave = $temp['clave'];
                    $ubicacion = $temp['ubicacion'];
                    $codigo_marca = $temp['codigo_marca'];
                    $complemento = $temp['complemento'];
        
                    $query_temp = "INSERT INTO marca (transferencia, hora, lector, f_creacion, datos, clave, ubicacion, codigo_marca, complemento) VALUES
                                    (" . $transferencia . ", '" . $hora . "', " . "'" . $lector . "', '" . $f_creacion . "', " . "'" . $datos . "', '" . $clave . "', " . "'" . $ubicacion . 
                                    "', '" . $codigo_marca . "', " . "'" . $complemento . "')";
        
                    $yeah = mysqli_query($connect_db, $query_temp);
                    //echo $query_temp . "<br>";
        
                    if (!$yeah) {
                        //echo "ERROR WHILE INSERTING TEMP!! <br>";
                    }
                }
        
                echo "marcas3 Inserted!!";
            
            }
        
            elseif (isset($_POST['marcas4']) ) { 
        
                // Add temps
                $temps = $this->getRegistries(URL . 'public/csv/marca4.csv', array('csvModel','parseTemps'));
        
                foreach ($temps as $temp) {
        
                    $transferencia = $temp['transferencia'];
                    $consecutivo = $temp['consecutivo'];
                    $hora = $temp['hora'];
                    $lector = $temp['lector'];
                    $f_creacion = $temp['f_creacion'];
                    $datos = $temp['datos'];
                    $clave = $temp['clave'];
                    $ubicacion = $temp['ubicacion'];
                    $codigo_marca = $temp['codigo_marca'];
                    $complemento = $temp['complemento'];
        
                    $query_temp = "INSERT INTO marca (transferencia, hora, lector, f_creacion, datos, clave, ubicacion, codigo_marca, complemento) VALUES
                                    (" . $transferencia . ", '" . $hora . "', " . "'" . $lector . "', '" . $f_creacion . "', " . "'" . $datos . "', '" . $clave . "', " . "'" . $ubicacion . 
                                    "', '" . $codigo_marca . "', " . "'" . $complemento . "')";
        
                    $yeah = mysqli_query($connect_db, $query_temp);
                    //echo $query_temp . "<br>";
        
                    if (!$yeah) {
                        //echo "ERROR WHILE INSERTING TEMP!! <br>";
                    }
                }
        
                echo "marcas4 Inserted!!";
            
            }
        
        
        
        }

    }

    
    static function getRegistries(string $filePath, ?callable $parser): array {
        //echo "FILEPATH: *" . $filePath . "*";

        $file = fopen($filePath, 'r');
        //echo "PARSER: " . $parser . "<br>";

        $registries = [];

        // READ THE FIRST LINE AND DISCARD IT (CONTAIN HEADINGS)
        //fgetcsv($file);

        // READ LINE BY LINE .csv
        while (($registry = fgetcsv($file)) !== false)
        {
            
            $registry = $parser($registry);
            
            // APPEND ELEMENT TO ARRAY
            $registries[] = $registry;
        }

        return $registries; 

    }

// TRANSFORMS THE ARRAY INTO A KEY ARRAY
    static function parseEmployees(array $row): array {   
        // ASSIGN VARIABLE TO EACH ARRAY ELEMENT
        [$id, $nombre_completo, $activo, $empleado, $localidad, $zona_acceso, $no_sincroniza, $f_creacion, $f_modificacion] = $row;
        
        if ($zona_acceso == '') {
            $zona_acceso = 0;
        }

        return [
            'id'                => $id,
            'nombre_completo'   => $nombre_completo,
            'activo'            => $activo,
            'empleado'          => $empleado,
            'localidad'         => $localidad,
            'zona_acceso'       => $zona_acceso,
            'no_sincroniza'     => $no_sincroniza,
            'f_creacion'        => $f_creacion,
            'f_modificacion'    => $f_modificacion
        ];
    }

    static function parseTemps(array $row): array {
        [$transferencia, $consecutivo, $hora, $lector, $f_creacion, $datos, $clave, $ubicacion, $codigo_marca, $complemento] = $row;

        return [
            'transferencia' => $transferencia,
            'consecutivo'   => $consecutivo,
            'hora'          => $hora,
            'lector'        => $lector,
            'f_creacion'    => $f_creacion,
            'datos'         => $datos,
            'clave'         => $clave,
            'ubicacion'     => $ubicacion,
            'codigo_marca'  => $codigo_marca,
            'complemento'   => $complemento
        ];
    }

    static function parseReaders(array $row): array {
        [$lector, $tipo_lector, $descripcion, $clave, $conexion, $activo, $f_ultima_marca, $mac, $relevador, $datos_complementarios, 
        $segundos, $segundos_monitoreo, $minutos_desfase, $enrolador, $f_sincronizacion, $lector_global, $no_sincroniza] = $row;

        if ($relevador == '') {
            $relevador = ' ';
        }

        return [
            'lector'                    => $lector,
            'tipo_lector'               => $tipo_lector,
            'descripcion'               => $descripcion,
            'clave'                     => $clave,
            'conexion'                  => $conexion,
            'activo'                    => $activo,
            'f_ultima_marca'            => $f_ultima_marca,
            'mac'                       => $mac,
            'relevador'                 => $relevador,
            'datos_complementarios'     => $datos_complementarios,
            'segundos'                  => $segundos,
            'segundos_monitoreo'        => $segundos_monitoreo,
            'minutos_desfase'           => $minutos_desfase,
            'enrolador'                 => $enrolador,
            'f_sincronizacion'          => $f_sincronizacion,
            'lector_global'             => $lector_global,
            'no_sincroniza'             => $no_sincroniza
        ];
    }
    
}
