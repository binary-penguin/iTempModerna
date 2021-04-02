<?php


class Location extends Controller {

    function __construct() {
        $this->model = $this->loadModel('locationModel');
        $this->view = $this->loadView('locationView', 'location');
        // Shows first location by default
        $this->model->setCurrentIndex(0);
        $this->model->prepareLocation();
        $this->model->updateEntries();
        $this->model->updateAverage();
        $this->model->updateBorder();
        $this->view->renderPanel($this->model->getData());
    }

    public function load($cve) {
        
        $this->model->setCurrentIndex((int)$cve);
        
        $valid = $this->model->validateLocation();
        

        if ($valid) {
            $this->model->prepareLocation();
            $this->model->updateEntries();
            $this->model->updateAverage();
            $this->model->updateBorder();
            //echo $this->model->current_entries;
            $this->view->renderPanel($this->model->getData());
        }
        else {
            header("Location:" . URL . "error404");
        }
        

    }

}