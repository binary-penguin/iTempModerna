<?php


class Employee extends Controller {

    function __construct() {
        $this->model = $this->loadModel('employeeModel');
        $this->view = $this->loadView('employeeView', 'employee');
        // Shows first employee by default
        $this->model->prepareEmployee();
        $this->model->prepareDefault();
        $this->model->updateLastRegistry();
        //$this->model->updateAverage();
        //$this->model->updateBorder();
        $this->view->renderPanel($this->model->getData());
    }

    public function load($cve) {
        
        $this->model->setCurrentIndex((int)$cve);
        
        $valid = $this->model->validateLocation();
        

        if ($valid) {
            $this->model->prepareLocation();
            $this->model->updateLastRegistry();
            //$this->model->updateAverage();
            //$this->model->updateBorder();
            //echo $this->model->current_entries;
            $this->view->renderPanel($this->model->getData());
        }
        else {
            header("Location:" . URL . "error404");
        }
        

    }

    public function findEmployee() {
        if (isset($_POST["b_search"])) {
            $this->model->prepareEmployee();
            $this->model->setSearch($_POST["b_search"]);
            $this->model->searchEmployee();
            $this->model->updateLastRegistry();
            $this->view->renderPanel($this->model->getData());
        }
    }

}