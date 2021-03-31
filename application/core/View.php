<?php
session_start();

class View {
    private $html;
    
    function __construct($html) {
        $this->html = $html;
    }

    public function setHtml($html) {
        $this->html = $html;
    }

    public function getHtml() {
        return $this->html;
    }

    public function renderHtml() {
        ob_end_clean(); // Cleans Last View
        ob_start();     // Turns on collector
        require 'application/html/' . $this->html . '.php';
    }

    public function addData($data) {
        ob_end_clean(); // Cleans Last View
        ob_start();
        extract($data);
        require 'application/html/' . $this->html . '.php';
    }

    public function renderPanel($data) {

        if (isset($_SESSION['USER'])) {
            //session_start();
            ob_end_clean(); // Cleans Last View
            ob_start();

            extract($data);
            require 'application/html/panel/head.php';
            require 'application/html/panel/sidebar.php';
            require 'application/html/panel/' . $this->html . '.php';
        }

        else {
            header("Location:" . URL . "error404");
        }
        
    }

}