<?php
// Start session
//session_start();

class Team extends Controller
{
    function __construct() {
        $this->model = $this->loadModel('teamModel');
        $this->view = $this->loadView('teamView', 'team');
        $this->view->renderHtml();
    }


}
