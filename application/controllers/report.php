<?php

class Report extends Controller {
    
    public function __construct() {
        $this->view = $this->loadView("reportView", "report");
        $this->model = $this->loadModel("reportModel");

        $this->verifier =[ 
            "pass"=>TRUE, 
            "block"=>FALSE 
        ]; 

        $this->view->renderPanel(array("hell" => 3));
        
    }

    public function generate() {

        if (isset($_GET["submit_report"]) && isset($_GET["check"])) {
            
            if ($this->valueVerifier()) {
                $this->model->setCheck($_GET["check"]);
                $this->model->setCbx($_GET['check']);
                $this->model->setFilter(
                    array(
                    "dia" => intval($_GET['f1']),
                    "mes" => intval($_GET['f2']),
                    "ano" => intval($_GET['f3']),
                    "tem" => $_GET['f4'],
                    "loc" => $_GET['f5']
                    )
                );
                
                $this->model->queryProcessor();
                $this->view->renderPanel($this->model->getData());
            }
            
        }  
    }


    private function valueVerifier(){ 
        if(isset($_GET['check'])){ 
            $assign = [ 
                "dia" => 'f1', 
                "mes" => 'f2', 
                "ano" => 'f3', 
                "tem" => 'f4', 
                "loc" => 'f5' 
            ]; 
            $i=1; 
            $matcher = []; 
            foreach($_GET['check'] as $checked){ 
                for($i;$i<=count($_GET['check']);){ 
                    if($_GET[$assign[$checked]]!="none"){ 
                        //echo $checked." is checked and selected"."<br>"; 
                        $matcher[$_GET[$assign[$checked]]] = $this->verifier['pass']; 
                    } 
                    else{ 
                        //echo $checked." is checked but not selected"."<br>"; 
                        $matcher[$_GET[$assign[$checked]]] = $this->verifier['block']; 
                    } 
                    $i++; 
                    break; 
                } 
            } 
            $cnt = 0; 
            foreach($matcher as $pass){ 
                if($pass==TRUE){ 
                    $cnt++; 
                } 
            } 
            if($cnt==count($_GET['check'])){ 
                //echo "match true"."<br>"; 
                return true; //Returns true if the Select menu (values[s]) matches the Checkboxes checked 
            } 
            else{ 
                //echo "match false"."<br>"; 
                return false; //Returns false if the Select menu (value[s]) unmatches the Checkboxes checked 
            } 
        } 
    } 
}