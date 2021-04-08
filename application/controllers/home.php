<?php
class Home extends Controller {
    function __construct() {
        $this->model = $this->loadModel('HomeModel');
        $this->view = $this->loadView('HomeView', 'home');
        $this->view->renderHtml();
    }

    public function login() {
        // If the user is submitted then validate the credentials
        if (isset($_POST["submit_user"])) {
            
            //Call to model and then render the Html again
            $this->model->setSearch($_POST["c_usuario"]);
            $this->model->setPassword($_POST["c_contra"]);
            //echo var_dump($_POST["c_contra"]);

            $this->model->validateUser();
            $this->view->addData($this->model->getData());
            
            // To echo the next line comment line addData line
            //echo var_dump($this->model->getData());
        
        }
    }

    public function logout(){
        session_destroy();
    }


}