<?php

class Csv extends Controller
{
    function __construct() {
        $this->model = $this->loadModel('csvModel');
        $this->view = $this->loadView('csvView', 'csv');
        $this->view->renderHtml();
    }


}
