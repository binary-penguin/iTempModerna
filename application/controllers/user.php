<?php 

class User extends Controller {
    function __construct() {

        $this->model = $this->loadModel('userModel');
        $this->view = $this->loadView('userView', 'user');
        $this->view->renderHtml();

    }

    public function update() {
        if (isset($_POST["b_cambiar_contra"])) {
            $this->model->setUser("10");
            $this->model->setPassword($_POST["c_contra"]);
            $this->model->changePswUser();
        }
    }
}