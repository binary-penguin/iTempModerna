<?php
// Start session
//session_start();

class General extends Controller {
    function __construct() {
        $this->model = $this->loadModel('generalModel');
        //$data = $this->model->getData();
        $this->view = $this->loadView('generalView', 'general');
        //echo var_dump ($_SESSION['CURRENTDATE-ENTRIES']);
        $this->view->renderPanel(array('hola' => 5));
        
    }


}