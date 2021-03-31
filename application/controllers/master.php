<?php

class Master extends Controller {
    function __construct() {

        $this->model = $this->loadModel('masterModel');
        $this->view = $this->loadView('masterView', 'master');
        // Set user to current user TO DO
        $this->model->setSearch("100022");
        $this->model->searchUser();
        $this->model->checkLocations();
        $this->view->renderPanel($this->model->getData());
    }

    public function update() {
        if (isset($_POST["b_cambiar_contra"])) {
            $this->model->setUser($_POST["t_user"]);
            $this->model->setPassword($_POST["c_contra"]);
            $this->model->changePswAdmin();
        }
        else if (isset($_POST["b_cambiar_ubi"])) {
            $this->model->setUser($_POST["t_user"]);
            $this->model->setLocations($_POST["planta"]);
            $this->model->changeLocations();
            $this->model->checkLocations();
            $this->view->renderPanel($this->model->getData());
        
        }
    }
    public function findUser() {
        if (isset($_POST["b_search"])) {
            $this->model->setSearch($_POST["b_search"]);
            $this->model->searchUser();
            $this->model->checkLocations();
            //echo var_dump($this->model->getData());
            $this->view->renderPanel($this->model->getData());
        }
    }
}