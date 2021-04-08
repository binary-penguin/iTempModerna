<?php
// Start session
//session_start();

class generalModel extends Model {

    public function updateEntries() {
        $hora = "2021-02-19";
        foreach($_SESSION['LOCATIONS-CVE'] as $location) {
            //$sql = "SELECT DISTINCT hora FROM marca WHERE clave = :clave";
            $sql = "SELECT datos, hora, consecutivo, clave FROM marca WHERE consecutivo IN (SELECT MAX(consecutivo) FROM marca GROUP BY datos) AND clave=:clave";
            $query = $this->db->prepare($sql);
            $query->execute(array(":clave" => $location));
            while($row = $query->fetch()){
                if($hora == strtok($row["hora"]," ")){
                    $this->entries[] = strtok($row["hora"]," ");
                }
            }
        }
        $_SESSION['CURRENTDATE-ENTRIES']=count($this->entries);
    }

    public function updateAverages() {
        $hora = "2021-02-19";
        $temp = [];
        $temp2 = [];
        $_SESSION['CURRENTDATE-LOW'] = 0;
        $_SESSION['CURRENTDATE-NORMAL'] = 0;
        $_SESSION['CURRENTDATE-HIGH'] = 0;
        
        foreach($_SESSION['LOCATIONS-CVE'] as $location) {
            //$sql = "SELECT DISTINCT hora FROM marca WHERE clave = :clave";
            $sql = "SELECT datos, hora, consecutivo, clave, complemento FROM marca WHERE consecutivo IN (SELECT MAX(consecutivo) FROM marca GROUP BY datos) AND clave=:clave";
            $query = $this->db->prepare($sql);
            $query->execute(array(":clave" => $location));
            $temp = $query->fetchAll();
            foreach ($temp as $t) {
                if($hora == strtok($t["hora"]," ")){
                    $temp2[] = preg_split( "/[ =]/", $t["complemento"] );
                }
            }
            
            //FOR OPTIMIZING
            //if($hora == strtok(w$row["hora"]," ")){
              //  $temp[] = preg_split( "/[ =]/", $row["complemento"] );   
            //}
                /*if (!$row) {
                    for ($i=0; $i < count($temp); $i++){ 
                    $this->tempsSum[] = $temp[$i][7];
                    }  
                }*/
            //}
        }

        for ($i=0; $i < count($temp2); $i++){ 
            $this->tempsSum += (double)$temp2[$i][7];

            if (((double)$temp2[$i][7] >= 36) && ((double)$temp2[$i][7] <= 37)) {
                $_SESSION['CURRENTDATE-NORMAL']++;
            }
            else if ((double)$temp2[$i][7] < 36){
                $_SESSION['CURRENTDATE-LOW']++;
            }
            else {
                $_SESSION['CURRENTDATE-HIGH']++;
            }
        }
        $this->tempsSum /= $_SESSION['CURRENTDATE-ENTRIES'];
        $this->tempsSum = number_format($this->tempsSum, 2);
        

        $_SESSION['AVERAGE-TEMPS']=$this->tempsSum;
    }
}