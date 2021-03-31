<?php
// Start session
session_start();

class error404 extends Controller {
    function __construct() {
        $this->model = $this->loadModel('error404Model');
        $this->view = $this->loadView('error404View', 'error404');
        $this->view->renderHtml();
    }
}