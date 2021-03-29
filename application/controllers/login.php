<?php

class Login extends Controller {
    function __construct() {
        $this->model = $this->loadModel('loginModel');
        $this->view = $this->loadView('loginView', 'login');
        $this->view->renderHtml();
    }

    public function auth() {
        // If the user is submitted then validate the credentials
        if (isset($_POST["submit_user"])) {
            
            //Call to model and then render the Html again
            $this->model->setUser($_POST["c_usuario"]);
            $this->model->setPassword($_POST["c_contra"]);
            //echo var_dump($_POST["c_contra"]);

            $this->model->validateUser();
            $this->view->addData($this->model->getData());
            
            // To echo the next line comment line addData line
            //echo var_dump($this->model->getData());
        
        }
    }


}