<?php


class EmployeeModel extends Model {

    public $current_index;
    public $current_cve;
    public $current_name;
    public $current_entries;
    public $current_average;
    public $current_low;
    public $current_normal;
    public $current_high;
    public $border;
    public $array_low;
    public $array_normal;
    public $array_high;
    public $array_employees;
    public $tempsSum;
    public $last_registry;
    public $match;
    public $search;
    private $message;
    public $access;


    public function prepareEmployee() {
        $this->tempsSum = 0;
        $this->current_average = 0.0;
        $this->array_employees = [];
        $this->current_entries = 0;
        $this->current_cve = "";
        $this->border = "";
        $this->array_high = [];
        $this->array_normal = [];
        $this->array_low = [];
        $this->last_registry = [];
        $this->match = 0;
        
        $this->access = 0;
        $this->search = "";
        $this->message = "";


    }

    public function prepareDefault() {
        $this->access = 1;
        $this->match = 1;

            $sql = "SELECT datos FROM marca WHERE clave=:clave
                    ORDER BY datos DESC LIMIT 1";
    
            //echo "CLAVE " . $this->current_cve . " <br>";
    
            $query = $this->db->prepare($sql);
            $query->execute(array(":clave" => $_SESSION['LOCATIONS-CVE'][0]));
    
            while($row = $query->fetch()){
                $this->setCurrentCve($row["datos"]);
            }
    }

    public function updateLastRegistry() {

        $sql = "SELECT  em.empleado, em.nombre_completo, mac.hora, mac.lector, mac.complemento,
        mac.datos, l.descripcion
        FROM marca AS mac
            INNER JOIN empleado as em
            ON em.empleado = mac.datos
            INNER JOIN lector as l
            ON l.clave = mac.clave
        WHERE (em.empleado = :empleado)
        ORDER BY mac.hora DESC LIMIT 1";

        echo "CLAVE " . $this->current_cve . " <br>";

        $query = $this->db->prepare($sql);
        $query->execute(array(":empleado" => $this->current_cve));

        while($row = $query->fetch()){
        
            $lectura = preg_split( "/[ =]/", $row["complemento"])[7];
            
            $this->current_name = ucwords(strtolower($row["nombre_completo"]));

            // Change Time config
            list($fecha, $hora) = explode(".", $row["hora"]);
            // AM/PM is defined before the locale cause there is no implementation for AM/PM in Spanish
            setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
            //echo "FECHA " . $fecha . "<br>";
            $fecha = strftime("%A %d de %B del %Y a las %r hrs");
            //echo "FECHA FORMATEADA " . $fecha . "<br>";
            //echo "LECTURA " . $lectura . "<br>";
            $this->last_registry = ["date" => $fecha, "registry" => $lectura];
        }

    }

    public function updateAverage() {    
        
        $temp = [];
        $temp2 = [];
        //$this->current_entries = count($entries);
        $aux = [];

        $this->current_low = 0;
        $this->current_normal = 0;
        $this->current_high = 0;

        $sql = "SELECT datos, hora, consecutivo, clave, complemento FROM marca WHERE consecutivo IN (SELECT MAX(consecutivo) FROM marca GROUP BY datos) AND clave=:clave";
        $query = $this->db->prepare($sql);
        $query->execute(array(":clave" => $this->current_cve));
        $temp = $query->fetchAll();
        foreach ($temp as $t) {
            if($_SESSION['DATE'] == strtok($t["hora"]," ")){
                $temp2[] = preg_split( "/[ =]/", $t["complemento"] );
            }
        }
  
        for ($i=0; $i < count($temp2); $i++){ 
            $this->tempsSum += (double)$temp2[$i][7];

            // Change date for temperature

            $aux[] = array($this->array_employees[$i][0], (double)$temp2[$i][7]);

            // GET TODAY LOW, NORMAL AND HIGH TEMPS, and also fill the arrays for pie charts labels

            if (((double)$temp2[$i][7] >= 36) && ((double)$temp2[$i][7] <= 37)) {
                $this->array_normal[] = $aux[$i];
                $this->current_normal++;
            }
            else if ((double)$temp2[$i][7] < 36){
                $this->array_low[] = $aux[$i];
                $this->current_low++;
            }
            else {
                $this->array_high[] = $aux[$i];
                $this->current_high++;
            }
        }
        //echo var_dump($aux) . "<br>";
        //echo var_dump($this->array_normal) . "<br>";
        //echo var_dump($this->array_low) . "<br>";
        //echo var_dump($this->array_high) . "<br>";

        $this->tempsSum /= $this->current_entries;
        $this->tempsSum = number_format($this->tempsSum, 2);

        $this->current_average=$this->tempsSum;
    }

    public function setCurrentIndex($cve) {
        $this->current_index = $cve;

    }

    public function setMatch($m) {
        $this->match = $m;

    }

    public function setCurrentCve($cve) {
        $this->current_cve = $cve;

    }

    public function setCurrentName($name) {
        $this->current_name = $name;

    }

    public function setSearch($search) {
        $this->search = $search;

    }

    public function validateLocation() {
        if (($this->current_index < count($_SESSION['LOCATIONS-CVE'])) && ($this->current_index >= 0)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function updateBorder() {
        $high_bool = ($this->current_high * 100.0) / (float)$this->current_entries;
        $normal_bool = ($this->current_normal * 100.0) / (float)$this->current_entries;
        $low_bool = ($this->current_low * 100.0) / (float)$this->current_entries;

        if ($high_bool !== 100.0 && $low_bool !== 100.0 && $normal_bool !== 100.0) {
            $this->border = "#FFFFFF";
        }
        else {
            $this->border = "transparent";
        }
    }

    public function searchEmployee() {
        $this->setCurrentCve("");
        $this->setCurrentName("");


        $sql = "SELECT empleado.empleado, empleado.nombre_completo, marca.clave, marca.datos
                FROM empleado
                INNER JOIN marca ON empleado.empleado=marca.datos
                WHERE empleado=:search OR nombre_completo=:search"; 
        $query = $this->db->prepare($sql);
        $query->execute(array(':search' => $this->search));

        if($row = $query->fetch()){
            $this->setCurrentCve($row["empleado"]);
            $this->setCurrentName($row["nombre_completo"]);

            $sql2 = "SELECT cve_ubicacion FROM ubicacion WHERE usuario=:usuario"; 
            $query2 = $this->db->prepare($sql2);
            $query2->execute(array(':usuario' => $_SESSION['USER']));

            while ($row2 = $query2->fetch()){
                
                if (strcmp($row2["cve_ubicacion"], $row["clave"]) === 0) {
                    // The user has access to this employee data
                    $this->access = 1;
                    $this->current_cve = $row["empleado"];
                    break;
                }
                else {
                    // Default case if user has no access
                    $this->prepareDefault();
                    $this->access = 0;
                    $this->message = "Usted no cuenta con el permiso para acceder a la información del empleado: " . ucwords(strtolower($row["nombre_completo"]));
                }
            }

            $this->match = 1;
            
        }
        else{
            $this->prepareDefault();
            $this->match = 0;
            $this->message = "Empleado sin registros de marcas. Revise su búsqueda e intente de nuevo.";
            //echo $this->message;
        }
    }

    public function getData() {
        return [
            "current_index" => $this->current_index,
            "current_cve" => $this->current_cve,
            "current_name" => $this->current_name,
            "current_entries" => $this->current_entries,
            "current_average" => $this->current_average,
            "current_low" => $this->current_low,
            "current_normal" => $this->current_normal,
            "current_high" => $this->current_high,
            "border" => $this->border,
            "array_employees" =>$this->array_employees,
            "array_low" => $this->array_low,
            "array_normal" => $this->array_normal,
            "array_high" => $this->array_high,
            "last_registry" => $this->last_registry,
            "match" => $this->match,
            "access" => $this->access,
            "message" => $this->message

        ];
    }

}