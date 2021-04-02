<?php


class LocationModel extends Model {

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

    function __constructor() {
        $this->current_index = 0;
        $this->current_cve = $_SESSION['LOCATIONS-CVE'][0];
        $this->current_name = $_SESSION['LOCATIONS-NAME'][0];
        $this->current_entries = 0;
        $this->current_average = 0;
        $this->current_low = 0;
        $this->current_normal = 0;
        $this->current_high = 0;
        $this->border = "";
        $this->array_employees = [];
        $this->array_high = [];
        $this->array_normal = [];
        $this->array_low = [];
        $this->tempsSum - 0;
    }

    public function prepareLocation() {

        $this->current_cve = $_SESSION['LOCATIONS-CVE'][$this->current_index];
        $this->current_name = $_SESSION['LOCATIONS-NAME'][$this->current_index];


    }

    public function updateEntries() {
        $entries = [];
        $new_entries = [];

        $sql = "SELECT datos, hora, consecutivo, clave FROM marca WHERE consecutivo IN (SELECT MAX(consecutivo) FROM marca GROUP BY datos) AND clave=:clave";
        $query = $this->db->prepare($sql);
        $query->execute(array(":clave" => $this->current_cve));
        while($row = $query->fetch()){
            if($_SESSION['DATE'] == strtok($row["hora"]," ")){
                $entries[] = array(strtok($row["hora"]," "), $row['datos']);
            }
        }

        // Change datos por nombre_completo

        foreach ($entries as $entry) {
            $sql2 = "SELECT nombre_completo FROM empleado WHERE empleado=:datos";
            $query2 = $this->db->prepare($sql2);
            $query2->execute(array(":datos" => $entry[1]));

            while($row2 = $query2->fetch()){
                
                //echo $row2['nombre_completo'] . "<br>";
                $replacement = array(0 => $row2['nombre_completo'], 1 =>$entry[0]);
                $entry = array_replace($entry, $replacement);
                $new_entries[] = $entry;
            }
        }      


        // Create employees array
        $this->array_employees = $new_entries;

        $this->current_entries = count($entries);
    }

    public function updateAverage() {    
        
        $temp = [];
        $temp2 = [];
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
            "array_high" => $this->array_high

        ];
    }

}