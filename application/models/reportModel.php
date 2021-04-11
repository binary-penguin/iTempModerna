<?php
require 'controller.php';


class ReportModel extends Model{

    private $pdo;
    private $query;
    private $nombre;
    private $empleado;
    private $temperature;
    private $fecha;
    private $tiempo;
    private $location;
    private $clave;
    private $ano;
    private $mes;
    private $dia;
    private $complemento;
    private $missing;
    private $filter;
    private $granter = [];
    private $cbx;
    private $verifier;
    private $rc;
    
    public function __construct(){
        $this->verifier =[
            "pass"=>TRUE,
            "block"=>FALSE
        ];
        $this->rc = new ReportController;
        
        $this->qry = $this->db->query('SELECT emp.empleado,emp.nombre_completo,mac.hora,mac.complemento
                        ,lec.clave,lec.descripcion
                        FROM marca AS mac
                        INNER JOIN empleado AS emp
                        ON emp.empleado = mac.datos
                        INNER JOIN lector AS lec
                        ON lec.clave = mac.clave WHERE mac.clave="ckjf202060537"');
    
    }

        
    public function temperatureProcessor($complemento){
        list($d,$d1,$d2,$d3,$d4) = explode(" ",$complemento);
        list($d,$d1) = explode("=",$d3);
        $this->temperature = floatval($d1);
        unset($d,$d1,$d2,$d3,$d4);
    }

    public function valueVerifier(){
        $this->rc->checkSet();
        if(isset($this->rc->check)){
            $assign = [
                "dia" => 'f1',
                "mes" => 'f2',
                "ano" => 'f3',
                "tem" => 'f4',
                "loc" => 'f5'
            ];
            $i=1;
            $matcher = [];
            foreach($this->rc->check as $checked){
                for($i;$i<=count($this->rc->check);){
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
            if($cnt==count($this->rc->check)){
                //echo "match true"."<br>";
                return true; //Returns true if the Select menu (values[s]) matches the Checkboxes checked
            }
            else{
                //echo "match false"."<br>";
                return false; //Returns false if the Select menu (value[s]) unmatches the Checkboxes checked
            }
        }
    }
    
    public function getValues(){
        $this->cbx = $this->rc->check;
        $this->rp->selectSet();
        $this->filter = [
            "dia" => $this->rp->select['dia'],
            "mes" => $this->rp->select['mes'],
            "ano" => $this->rp->select['ano'],
            "tem" => $this->rp->select['tem'],
            "loc" => $this->rp->select['loc']
        ];
    }
    
    public function filterProcessor(){
        $this->granter = [];
        foreach($this->cbx as $ckd){
            if($ckd==="dia"){
                if($this->dia===$this->filter[$ckd]){
                    $this->granter[$ckd] = $this->verifier['pass'];
                }
                else{
                    $this->granter[$ckd] = $this->verifier['block'];
                }
            }
            if($ckd==="mes"){
                if($this->mes===$this->filter[$ckd]){
                    $this->granter[$ckd] = $this->verifier['pass'];
                }
                else{
                    $this->granter[$ckd] = $this->verifier['block'];
                }
            }
            if($ckd==="ano"){
                if($this->ano===$this->filter[$ckd]){
                    $this->granter[$ckd] = $this->verifier['pass'];
                }
                else{
                    $this->granter[$ckd] = $this->verifier['block'];
                }
            }
            if($ckd==="tem" && $this->missing==FALSE){
                if($this->filter[$ckd]==="nominal"){
                    if($this->temperature>=36.0 && $this->temperature<=37.75){
                        $this->granter[$ckd] = $this->verifier['pass'];
                        //echo "nominal"."<br>";
                    }
                    else{
                        $this->granter[$ckd] = $this->verifier['block'];
                    }
                }
                if($this->filter[$ckd]==="advisory"){
                    if(($this->temperature>36.0 && $this->temperature<36.5) || ($this->temperature>37.75 && $this->temperature<38.0)){
                        //echo "advisory"."<br>";
                        $this->granter[$ckd] = $this->verifier['pass'];
                    }
                    else{
                        $this->granter[$ckd] = $this->verifier['block'];
                    }
                }
                if($this->filter[$ckd]==="caution"){
                    if(($this->temperature>=35.0 && $this->temperature<=36.0) || ($this->temperature>=38.0 && $this->temperature<=38.9)){
                        //echo "caution"."<br>";
                        $this->granter[$ckd] = $this->verifier['pass'];
                    }
                    else{
                        $this->granter[$ckd] = $this->verifier['block'];
                    }
                }
                if($this->filter[$ckd]==="warning"){
                    if($this->temperature<35.0 || $this->temperature>38.9){
                        //echo "warning"."<br>";
                        $this->granter[$ckd] = $this->verifier['pass'];
                    }
                    else{
                        $this->granter[$ckd] = $this->verifier['block'];
                    }
                }
            }
            else if($this->missing==TRUE){
                $this->granter[$ckd] = $this->verifier['block'];
                //echo "Mising temperature"."<br>";
            }
            if($ckd==="loc"){
                if($this->clave===$this->filter[$ckd]){
                    $this->granter[$ckd] = $this->verifier['pass'];
                }
                else{
                    $this->granter[$ckd] = $this->verifier['block'];
                }
            }
        }
        if($this->filterVerifier()){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function filterVerifier(){
        $cnt = 0;
        foreach($this->granter as $pass){
            if($pass==TRUE){
                $cnt++;
            }
        }
        if($cnt==count($this->cbx)){
            //echo "all filters found"."<br>";
            //echo "counter ".$cnt."<br>";
            //echo "checked checkboxes ".count($this->cbx)."<br>";
            return true; //Output the employee information matches
        }
        else{
            //echo "nothing found with the filters given"."<br>";
            return false; //No matches with the filters given
        }
    }
                                                                                                                
    public function queryProcessor(){
        $structure = new LinkedList;
        if($this->valueVerifier()){
            $this->getValues();
        }
        while($row = $this->qry->fetch(PDO::FETCH_ASSOC)){
            if(strpos($row['complemento'], 'temperature') !== false){
                $this->temperatureProcessor($row['complemento']);
                $this->missing=FALSE;
            }
            else{
                $this->missing=TRUE;
            }
            list($d5,$d6) = explode(" ",$row['hora']);
            list($d7,$d8,$d9) = explode("-",$d5);
            $this->empleado = $row['empleado'];
            $this->nombre = $row['nombre_completo'];
            $this->clave = $row['clave'];
            $this->location = $row['descripcion'];
            $this->fecha = $d5;
            $this->tiempo = $d6;
            $this->ano = intval($d7);
            $this->mes = intval($d8);
            $this->dia = intval($d9);
            unset($d,$d1,$d3,$d4,$d5,$d6,$d7,$d8);
            if($this->valueVerifier()){
                if($this->filterProcessor()){
                    $structure->queue($this->empleado,$this->nombre,$this->temperature,$this->fecha,$this->tiempo,$this->location);
                }
                /*else{
                    echo "verga de dementor"."<br>";
                }*/
            }
            else{
                $structure->queue($this->empleado,$this->nombre,$this->temperature,$this->fecha,$this->tiempo,$this->location);
            }
        } 
        $structure->display();      
    }
}

$emp = new ReportModel;
$emp->queryProcessor();


