<?php

class Signup extends Controller {

    function __construct() {

        $this->model = $this->loadModel('signupModel');
        $this->view = $this->loadView('signupView', 'signup');
        $this->view->renderPanel($this->model->getData());
    }

    public function send() {
        // If the user is submitted then validate the credentials
        if (isset($_POST["b_submit"])) {

            //Call to model and then render the Html again
            $this->model->setUser($_POST["e_number"]);
            $this->model->setPassword($_POST["psw"]);
            $this->model->setMail($_POST["mail"]);
            $this->model->setType($_POST["c_tipo"]);
            $this->model->setLocations($_POST["planta"]);

            $this->model->validate();
            $this->model->register();
            $this->view->addData($this->model->getData());

            // To echo the next line comment line addData line
            //echo var_dump($this->data);
        }
    }

}
