<?php

class LoginModel extends Model {
    private $user;
    private $password;
    private $hash;
    private $auth;
    private $message;
    

    function __constructor() {
        $this->user = "";
        $this->password = "";
        $this->auth = "";
        $this->message = "";
        $this->hash = '';
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPassword($password) {
        $this->password = $password;

    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;

    }

    private function encryption(){
        $hash = hash('sha256',$this->password);
        $this->password = $hash;
    }

    public function validateUser() {
        
        $this->user = strip_tags($this->user);
        $this->password = strip_tags($this->password);
        $this->encryption();
        $sql = "SELECT contrasena FROM usuario WHERE n_empleado=:user OR correo=:user"; 
        $query = $this->db->prepare($sql);
        $query->execute(array(':user' => $this->user));
        $row = $query->fetchAll();


        if(!empty($row)) {
            if(CRYPT_SHA256==1){

                foreach ($row as $r) {
                    $db_hash = $r['contrasena'];
                    $this->hash = $db_hash;
                }

                $hashed_psw = crypt($this->password, $db_hash);

                if(hash_equals($db_hash, $hashed_psw)==1){
                    // Succesfull login!
                    session_start();
                    $_SESSION['USER'] = $this->user;
                    header("Location:" . URL . "general");
                    $this->auth = 1;
                }
                else{
                    // The password does not match
                    $this->message = "Su usuario o contraseña son incorrectos.";
                    $this->auth = 0;
                }
            }
            else{
                // SHA-256 not supported
                $this->message = "Su navegador es incompatible. Pruebe con otro dispositivo.";
                $this->auth = 0;
            }
        }
        else {
            // The user does not exist
            $this->auth = 0;
            $this->message = "Su usuario o contraseña son incorrectos.";
        }
    }

    public function getData() {
        return [
            "auth" => $this->auth,
            "message" => $this->message,   
            "hash" => $this->hash
        ];

    }
}