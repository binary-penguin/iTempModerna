<?php
// Start session
//session_start();

class UserModel extends Model {
    private $e_number;
    private $hash;
    private $psw;
    private $new_psw;
    private $mail;
    private $permission;
    private $message;


    function __constructor() {
        $this->e_number = "";
        $this->hash = "";
        $this->psw = "";
        $this->new_psw = "";
        $this->mail = "";
        $this->permission = 0;
        $this->message = "";
    }

    public function validate() {
        $this->e_number = strip_tags($this->e_number);
        $this->mail = strip_tags($this->mail);
        $sql = "SELECT * FROM usuario";
        $query = $this->db->prepare($sql);
        $query = $this->db->query('SELECT * FROM usuario');
        $query->execute();
        while($row = $query->fetch()){
            if($this->mail==$row['correo']){
                $this->message = "El correo electrónico ya está asociado a una cuenta";
                $this->permission = 1;
                break;
            }
            $this->permission = 0;
        }
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

    public function changePswUser() {
        $this->hash = $this->hashing();
        $sql = "UPDATE usuario SET contrasena = :contrasena WHERE n_empleado = :n_empleado";
        $query = $this->db->prepare($sql);
        $query->execute(array(':contrasena' => $this->hash, ':n_empleado' => $this->e_number ));
    }

    public function changeMail() {
        $this->validate();
        if($this->permission === 0) {
            $sql = "UPDATE usuario SET correo = :correo WHERE n_empleado = :n_empleado";
            $query = $this->db->prepare($sql);
            $query->execute(array(':correo' => $this->mail, ':n_empleado' => $this->e_number ));
        }        
    }

    public function setPassword($psw) {
        $this->psw = $psw;
    }

    public function setUser($e_number) {
        $this->e_number = $e_number;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function getData(){
        return [
            "user" => $this->e_number,
            "permission" => $this->permission,
            "message" => $this->message
        ];
    }

}