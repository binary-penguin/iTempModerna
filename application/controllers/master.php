<?php
// Start session
//session_start();

class Master extends Controller {
    function __construct() {

        $this->model = $this->loadModel('masterModel');
        $this->view = $this->loadView('masterView', 'master');
        // Set user to current user TO DO
        $this->model->setSearch($_SESSION["USER"]);
        $this->model->searchUser();
        $this->model->checkLocations();
        if($_SESSION["TYPE"]==='master') {
            $this->view->renderPanel($this->model->getData());
        }
        else{
            header("Location:".URL."error404");
        }
    }

    public function update() {
        if (isset($_POST["b_cambiar_contra"])) {
            $this->model->setUser($_POST["t_user"]);
            $this->model->setPassword($_POST["c_contra"]);
            $this->model->changePswAdmin();
        }
        else if (isset($_POST["b_cambiar_ubi"])) {
            if (isset($_POST["planta"])) {
                $this->model->setUser($_POST["t_user"]);
                $this->model->setLocations($_POST["planta"]);
                $this->model->changeLocations();
                $this->model->checkLocations();
                $this->view->renderPanel($this->model->getData());
            }
            else{
                $this->model->setSearch($_SESSION["USER"]);
                $this->model->searchUser();
                $this->model->checkLocations();
                $this->model->setMessage("Selecciona por lo menos una planta");
                $this->model->setMatch(0);
                $this->view->renderPanel($this->model->getData());
                //header("Location:".URL."master/error");
                //$this->model = $this->loadModel('masterModel');
                //$this->view = $this->loadView('masterView', 'master');
                // Set user to current user TO DO
                // $this->model->setSearch($_SESSION["USER"]);
                // $this->model->searchUser();
                // $this->model->checkLocations();
                // $this->view->renderPanel(array("message"=>"Selecciona por lo menos una planta", 'match'=>0));
            
            }
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