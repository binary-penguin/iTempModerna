<?php
// Start session
//session_start();

class General extends Controller {
    function __construct() {
        $this->model = $this->loadModel('generalModel');
        //$data = $this->model->getData();
        $this->view = $this->loadView('generalView', 'general');
        $this->view->renderPanel(array('hola' => 5));
        
    }


}