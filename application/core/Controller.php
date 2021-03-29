<?php

class Controller {

    protected $model;
    protected $view;


    function __constructor() {
        $this->model = "loginModel";
        $this->view = "loginView";
    }

    public function setView($view) {
        $this->view = $view;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getView() {
        return $this->view;
    }

    public function getModel() {
        return $this->model;
    }

    public function loadView($view_name, $html) {
        require 'application/views/' . $view_name . '.php';
        return new $view_name($html);
    }

    public function loadModel($model_name) {
        require_once 'application/models/'. $model_name . '.php';
        return new $model_name();
    }
}

