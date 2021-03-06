<?php 
// Start session
//session_start();

class Account extends Controller {
    
    function __construct() {

        $this->model = $this->loadModel('accountModel');
        $this->view = $this->loadView('accountView', 'account');
        $this->model->setUser($_SESSION['USER']);
        $this->view->renderPanel($this->model->getData());

    }

    public function changePicture(){

        if (isset($_POST['b-image'])) {

            $this->model->changePicture($_POST['new-pp']);
            $this->view->renderPanel($this->model->getData());

        }

    }

}