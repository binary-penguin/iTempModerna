<?php

class Report extends Controller {
    public $check;
    public $select;

    function __construct() {

        $this->model = $this->loadModel('reportModel');
        $this->view = $this->loadView('reportView', 'report');
      
        if(isset($_SESSION["USER"])) {
            $this->view->renderPanel(array("hr"=> 3));
        }
        else{
            header("Location:".URL."error404");
        }
    }
    public function generate(){
        $this->cbx = $_GET['check'];
        $this->filter = [
            "dia" => intval($_GET['f1']),
            "mes" => intval($_GET['f2']),
            "ano" => intval($_GET['f3']),
            "tem" => $_GET['f4'],
            "loc" => $_GET['f5']
        ];
        
        if(isset($_GET['check'])){
            $this->model->setCheck($_GET['check']);
        }

        $this->model->setSelect(array(
            "dia" => intval($_GET['f1']),
            "mes" => intval($_GET['f2']),
            "ano" => intval($_GET['f3']),
            "tem" => $_GET['f4'],
            "loc" => $_GET['f5'])
        );

        $this->model->queryProcessor();
        $this->view->renderPanel($this->model->getData());
        
    }
}
