<?php
// Start session
//session_start();

class MasterModel extends Model {
    public $e_number;
    public $hash;
    public $psw;
    private $locations;
    private $search;
    private $match;
    private $db_name;
    private $message;
    //private $new_psw;

    function __constructor() {
        $this->e_number = "";
        $this->hash = "";
        $this->psw = "";
        $this->locations = [];
        $this->new_psw = "";
        $this->search = "";
        $this->match = 0;
        $this->db_name = "";
        $this->message = "";
    }

    private function encryption() {
        $hash = hash('sha256',$this->psw);
        $this->psw = $hash;
    }

    private function hashing() {
        $this->encryption();
        $salt = uniqid("pm4",random_int(PHP_INT_MIN, PHP_INT_MAX));
        return crypt($this->psw,'$5$rounds=5000$'.$salt.'$');
    }

    //changePswAdmin changes employees password from admin view
    public function changePswAdmin() {
        $this->hash = $this->hashing();
        $sql = "UPDATE usuario SET contrasena = :contrasena WHERE n_empleado = :n_empleado";
        $query = $this->db->prepare($sql);
        $query->execute(array(':contrasena' => $this->hash, ':n_empleado' => $this->e_number ));
    }
    
    public function changeLocations() {
        
        //1. clear all locations
        $sql = "DELETE FROM ubicacion WHERE usuario = :n_empleado";
        $query = $this->db->prepare($sql);
        $query->execute(array(':n_empleado'=> $this->e_number));

        //2. ctrl c foreach
        foreach ($this->locations as $location) {
            $sql2 = "INSERT INTO ubicacion (usuario, cve_ubicacion) VALUES(:usuario,:cve_ubicacion)"; 
            $query2 = $this->db->prepare($sql2);
            $query2->execute(array(':usuario' => $this->e_number, ':cve_ubicacion' => $location));
            
        } 
        
        // GET SESSION LOCATIONS (NAME)
        $sql = "SELECT cve_ubicacion FROM ubicacion WHERE usuario = :e_number";
        $query = $this->db->prepare($sql);
        //change data to the correct database table names
        $query->execute(array(":e_number" => $this->e_number));

        $locations_name = [];
        $locations_cve = [];

        while($row = $query->fetch()){
            $locations_cve[] = $row['cve_ubicacion'];

            $sql2 = "SELECT descripcion FROM lector WHERE clave = :cve_ubicacion";
            $query2 = $this->db->prepare($sql2);
            //change data to the correct database table names
            $query2->execute(array(":cve_ubicacion" => $row['cve_ubicacion']));

            while($row2 = $query2->fetch()){
                $locations_name[] = $row2['descripcion'];
            }
        }
        $_SESSION['LOCATIONS-CVE'] = $locations_cve;
        $_SESSION['LOCATIONS-NAME'] = $locations_name;


        // CHANGE EMPLOYEES IN EACH LOCATION
        $employees_n = [];
        foreach($_SESSION['LOCATIONS-CVE'] as $location) {
            $sql = "SELECT COUNT(DISTINCT datos) FROM marca WHERE clave = :clave";
            $query = $this->db->prepare($sql);
            $query->execute(array(":clave" => $location));
            while($row = $query->fetch()){
                $employees_n[] = $row["COUNT(DISTINCT datos)"];
            }
        }
        $_SESSION['EMPLOYEES-N']=$employees_n;


    }

    public function checkLocations() {
        $this->setLocations(null);
        $sql = "SELECT cve_ubicacion FROM ubicacion WHERE usuario = :e_number";
        $query = $this->db->prepare($sql);
        //change data to the correct database table names
        $query->execute(array(":e_number" => $this->e_number));

        while($row = $query->fetch()){
            $this->locations[] = $row;
        }

    }

    public function searchUser() {
        $this->setDbName("");
        $this->setUser("");


        $sql = "SELECT n_empleado FROM usuario WHERE n_empleado=:search OR correo=:search"; 
        $query = $this->db->prepare($sql);
        $query->execute(array(':search' => $this->search));
        $row = $query->fetchAll();

        if($row){
            $this->match = 1;
            $this->setUser($row[0]["n_empleado"]);

            $sql = "SELECT nombre_completo FROM empleado WHERE empleado=:e_number"; 
            $query = $this->db->prepare($sql);
            $query->execute(array(':e_number' => $this->e_number));
            $row = $query->fetchAll();

            if(isset($row)){
                $this->db_name = $row[0]["nombre_completo"];
            }
        }
        else{
            $this->match = 0;
            $this->message = "Usuario no registrado en iTemp. Revise su búsqueda e intente de nuevo.";
        }
    }

    public function setUser($e_number) {
        $this->e_number = $e_number;
    }

    public function setDbName($db_name) {
        $this->db_name = $db_name;
    }

    public function setPassword($psw) {
        $this->psw = $psw;
    }

    public function setLocations($locations){
        $this->locations = $locations;
    }

    public function setSearch($search){
        $this->search = $search;
    }

    public function getUser() {
        return $this->e_number;
    }

    public function getLocations(){
        return $this->locations;
    }

    public function getSearch(){
        return $this->search;
    }

    public function getData(){
        return [
            "locations" => $this->locations,
            "match" => $this->match,
            "user" => $this->e_number,
            "db_name" => $this->db_name,
            "message" => $this->message
        ];
    }
}