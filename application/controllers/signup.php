<?php
// Start session
//session_start();

class Signup extends Controller {

    function __construct() {

        $this->model = $this->loadModel('signupModel');
        $this->view = $this->loadView('signupView', 'signup');
        if($_SESSION["TYPE"]==='master') {
            $this->view->renderPanel($this->model->getData());
        }
        else{
            header("Location:".URL."error404");
        }
    }

    public function addUser() {
        // If the user is submitted then validate the credentials
        if (isset($_POST["b_add"])) {

            //Call to model and then render the Html again
            //
            if (isset($_POST["planta"])) {
                $this->model->setUser($_POST["e_number"]);
                $this->model->setPassword($_POST["psw"]);
                $this->model->setMail($_POST["mail"]);
                $this->model->setType($_POST["c_tipo"]);
                $this->model->setLocations($_POST["planta"]);
                $this->model->validate();
                $this->model->register();
                $this->view->renderPanel($this->model->getData());
            }
            else{
                $this->view->renderPanel(array("message"=>"Selecciona por lo menos una planta", 'match'=>0));
            }
            //echo $_POST["planta"];
            // To echo the next line comment line addData line
            //echo var_dump($this->data);
        }
    }

}
