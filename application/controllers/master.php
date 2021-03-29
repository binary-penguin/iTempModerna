<?php

class Master extends Controller {
    function __construct() {

        $this->model = $this->loadModel('masterModel');
        $this->view = $this->loadView('masterView', 'master');
        $this->view->renderHtml();
    }

    public function update() {
        if (isset($_POST["b_cambiar_contra"])) {
            $this->model->setUser("10");
            $this->model->setPassword($_POST["c_contra"]);
            $this->model->changePswAdmin();
        }

    }
}