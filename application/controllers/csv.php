<?php
// Start session
session_start();

class Csv extends Controller
{
    function __construct() {
        $this->model = $this->loadModel('csvModel');
        $this->view = $this->loadView('csvView', 'csv');
        $this->view->renderHtml();
    }


}
