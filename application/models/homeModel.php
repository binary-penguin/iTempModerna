<?php


class HomeModel extends Model {
    private $user;
    private $password;
    private $hash;
    private $auth;
    private $message;
    private $locations;
    

    function __constructor() {
        $this->user = "";
        $this->password = "";
        $this->auth = "";
        $this->message = "";
        $this->hash = '';
        $this->locations = [];
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

                    // NAME
                    $sql = "SELECT nombre_completo FROM empleado WHERE empleado=:e_number"; 
                    $query = $this->db->prepare($sql);
                    $query->execute(array(':e_number' => $this->user));
                    $row = $query->fetchAll();

                    $_SESSION['NAME'] = $row[0]["nombre_completo"];

                    // LOCATIONS
                    $sql = "SELECT cve_ubicacion FROM ubicacion WHERE usuario = :e_number";
                    $query = $this->db->prepare($sql);
                    //change data to the correct database table names
                    $query->execute(array(":e_number" => $this->user));

                    $this->locations = [];

                    while($row = $query->fetch()){
                        // GET LOCATION NAMES

                        $sql2 = "SELECT descripcion FROM lector WHERE clave = :cve_ubicacion";
                        $query2 = $this->db->prepare($sql2);
                        //change data to the correct database table names
                        $query2->execute(array(":cve_ubicacion" => $row['cve_ubicacion']));

                        while($row2 = $query2->fetch()){
                            $this->locations[] = $row2['descripcion'];
                        }
                        
                        
                    }

                    $_SESSION['LOCATIONS'] = $this->locations;
                    
                    $_SESSION['USER'] = $this->user;


                    // Send e-mail new session

                    $to = "jafp070901@hotmail.com";
                    $subject = "Inicio de sesion exitoso!";
                    $message = "Hola Jorge!\n Nos alegra verte de vuelta :)\n";
                    $headers = "From: iTemp Moderna\r\nReply-To: jafp07@gmail.com";
                    mail($to, $subject, $message, $headers);


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
            "hash" => $this->hash,
            "locations" => $this->locations
        ];

    }
}