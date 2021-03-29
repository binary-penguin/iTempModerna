<?php

class SignupModel extends Model {
    private $e_number;
    private $mail;
    private $hash;
    private $psw;
    private $permission;
    private $type;
    private $locations;
    private $message;
    private $db_mail;
    private $db_user;
    private $db_userName;
    private $match;

    function __constructor() {
        $this->e_number = "";
        $this->mail = "";
        $this->hash = "";
        $this->psw = "";
        $this->locations = [];
        $this->type = "";
        $this->message = "";
        $this->db_mail = "";
        $this->db_user = "" ;
        $this->db_userName = "";
        $this->match = null;
    }

    public function validate() {
        $this->e_number = strip_tags($this->e_number);
        $this->mail = strip_tags($this->mail);
        $this->psw = strip_tags($this->psw);

        $sql = "SELECT * FROM usuario";
        $query = $this->db->prepare($sql);
        //change data to the correct database table names
        $query = $this->db->query('SELECT * FROM usuario');
        $query->execute();
        $this->match_verifier();
        while($row = $query->fetch()){
            if($this->e_number==$row['n_empleado']){
                $this->db_mail = $row['correo'];
                $this->message = "El numero de emplado ya esta asociado a una cuenta".'<br>';
                $this->permission = 0;
                break;
            }
            else if($this->mail==$row['correo']){
                $this->db_user = $row['n_empleado'];
                $this->message = "La direccion mail ya esta asociada a una cuenta".'<br>';
                $this->permission = 1;
                break;
            }
        }
    }
    private function encryption(){
        $hash = hash('sha256',$this->psw);
        $this->psw = $hash;
    }

    private function hashing(){
        $this->encryption();
        $salt = uniqid("pm4",random_int(PHP_INT_MIN, PHP_INT_MAX));
        return crypt($this->psw,'$5$rounds=5000$'.$salt.'$');
    }

    private function match_verifier(){
        $sql = "SELECT empleado FROM empleado WHERE empleado = :n_empleado";
        $query = $this->db->prepare($sql);
        $query->execute(array(':n_empleado'=> $this->e_number));
        if($query->fetchAll()){
            $this->match = 1;
        }
        else{
            $this->match = 0;
        }
    }

    public function register(){
        $this->type = strip_tags($this->type);
       
        if (($this->permission) !== 0 && ($this->permission) !== 1){
            $this->permission = 3;
            $this->hash = $this->hashing();
                $sql = "INSERT INTO usuario (n_empleado, correo, contrasena, tipo) VALUES(:n_empleado, :correo, :contrasena, :tipo)"; 
                //echo $sql . "<br>" . $this->user . $this->password;
    
                $query = $this->db->prepare($sql);
        
                $query->execute(array(':n_empleado' => $this->e_number, ':correo' => $this->mail, ':contrasena' => $this->hash, ':tipo' => $this->type));
                
                foreach ($this->locations as $location) {
                    $sql2 = "INSERT INTO ubicacion (usuario, cve_ubicacion) VALUES(:usuario,:cve_ubicacion)"; 
                    $query2 = $this->db->prepare($sql2);
                    $query2->execute(array(':usuario' => $this->e_number, ':cve_ubicacion' => $location));
                    
                }    
                $this->message = "registration completed!";
        }
    }

    public function getData(){
        return [
            "permission" => $this->permission,
            "message" => $this->message,
            "mail" => $this->mail,
            "db_mail" => $this->db_mail,
            "db_user" => $this->db_user,
            "db_username" => $this->userName,
            "match" => $this->match
        ];
    }
    
    public function setUser($e_number) {
        $this->e_number = $e_number;
    }
    public function setMail($mail) {
        $this->mail = $mail;
    }
    public function setPassword($psw) {
        $this->psw = $psw;
    }
    public function setLocations($locations){
        $this->locations = $locations;
    }
    public function setType($type){
        $this->type = $type;
    }

    public function getUser() {
        return $this->e_number;
    }
    public function getMail() {
        return $this->mail;
    }
    public function getPassword() {
        return $this->psw;
    }
    public function getLocations(){
        return $this->locations;
    }
    public function getType(){
        return $this->type;
    }

}