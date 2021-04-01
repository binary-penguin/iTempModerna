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
                    $this->prepareSession();

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

    private function prepareSession() {
        // GET SESSION NAME
        $sql = "SELECT nombre_completo FROM empleado WHERE empleado=:e_number"; 
        $query = $this->db->prepare($sql);
        $query->execute(array(':e_number' => $this->user));
        $row = $query->fetchAll();

        $_SESSION['NAME'] = $row[0]["nombre_completo"];
        $_SESSION['NAME'] = strtolower($_SESSION['NAME']);
        $_SESSION['NAME'] = ucwords($_SESSION['NAME']);

        // GET SESSION LOCATIONS (NAME)
        $sql = "SELECT cve_ubicacion FROM ubicacion WHERE usuario = :e_number";
        $query = $this->db->prepare($sql);
        //change data to the correct database table names
        $query->execute(array(":e_number" => $this->user));

        $this->locations_name = [];
        $this->location_cve = [];

        while($row = $query->fetch()){
            $this->locations_cve[] = $row['cve_ubicacion'];

            $sql2 = "SELECT descripcion FROM lector WHERE clave = :cve_ubicacion";
            $query2 = $this->db->prepare($sql2);
            //change data to the correct database table names
            $query2->execute(array(":cve_ubicacion" => $row['cve_ubicacion']));

            while($row2 = $query2->fetch()){
                $this->locations_name[] = $row2['descripcion'];
            }
            
            
        }

        $_SESSION['LOCATIONS-CVE'] = $this->locations_cve;
        $_SESSION['LOCATIONS-NAME'] = $this->locations_name;

        // GET PROFILE PICTURE

        $sql = "SELECT imagen FROM usuario WHERE n_empleado = :e_number";
        $query = $this->db->prepare($sql);
        $query->execute(array(":e_number" => $this->user));

        while($row = $query->fetch()) {
            $pp = $row['imagen'];
        }

        $_SESSION['PP'] = $pp;

        // GET MAIL

        $sql = "SELECT correo FROM usuario WHERE n_empleado = :e_number";
        $query = $this->db->prepare($sql);
        $query->execute(array(":e_number" => $this->user));

        while($row = $query->fetch()) {
            $mail = $row['correo'];
        }

        $_SESSION['MAIL'] = $mail;

        
        // GET SESSION USER NUMBER
        $_SESSION['USER'] = $this->user;

        

        // SEND MAIL NOTIFICATION
        $this->sendMail("jafp070901@hotmail.com",
                        "Inicio de sesion exitoso!");

        

    }

    public function sendMail($to, $subject) {

        // Message
        $message = '
        <table>
        <p>Here are the birthdays upcoming in Auguestación!</p>
            <tr>
            <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
            </tr>
            <tr>
            <td>Johny</td><td>10th</td><td>August</td><td>1970</td>
            </tr>
            <tr>
            <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
            </tr>
        </table>
        </body>
        ';

        $message2 = '
        <img src="https://drive.google.com/uc?export=view&id=1qx-TetEQFmLRsl-qvWo20Tk9C8M0jdjh"></img>
        <br>
        <h1 style="color:#F09F08;">Wuju!</h1>
        <h2 style="display:inline-block;">Nos alegra verte de vuelta, </h2>
        <h2 style="display:inline-block; color:#F09F08;">' . $_SESSION['NAME'] . '</h2>
        <br><br>
        <hr>
        <h4>*Si no reconoces este inicio de sesion te recomendamos cambiar tu contrasena. </h4>';

        $message = utf8_encode($message);
        $message2 = utf8_encode($message2);

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';

        // Additional headers
        $headers[] = 'To: = <' . $to . '>';
        $headers[] = 'From: iTemp Moderna <noreply@moderna.com>';

        // Mail it
        //ñmail($to, $subject, $message, implode("\r\n", $headers));
        mail($to, $subject, $message2, implode("\r\n", $headers));

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