<?php

class ReportModel extends Model{

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
    private $missing;
    private $filter;
    private $granter = [];
    private $cbx;
    private $verifier;
    private $check;
    private $select = [];
    private $head = [];
    
    public function temperatureProcessor($complemento){
        list($d,$d1,$d2,$d3,$d4) = explode(" ",$complemento);
        list($d,$d1) = explode("=",$d3);
        $this->temperature = floatval($d1);
        unset($d,$d1,$d2,$d3,$d4);
    }

    public function valueVerifier(){
        if(isset($this->check)){
            $assign = [
                "dia" => 'f1',
                "mes" => 'f2',
                "ano" => 'f3',
                "tem" => 'f4',
                "loc" => 'f5'
            ];
            $i=1;
            $matcher = [];
            foreach($this->check as $checked){
                for($i;$i<=count($this->check);){
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
            if($cnt==count($this->check)){
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
        $this->cbx = $this->check;
        $this->filter = [
            "dia" => $this->select['dia'],
            "mes" => $this->select['mes'],
            "ano" => $this->select['ano'],
            "tem" => $this->select['tem'],
            "loc" => $this->select['loc']
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

        $this->verifier =[
            "pass"=>TRUE,
            "block"=>FALSE
        ];
        
        $this->qry = $this->db->query('SELECT emp.empleado,emp.nombre_completo,mac.hora,mac.complemento
                        ,lec.clave,lec.descripcion
                        FROM marca AS mac
                        INNER JOIN empleado AS emp
                        ON emp.empleado = mac.datos
                        INNER JOIN lector AS lec
                        ON lec.clave = mac.clave WHERE mac.clave="ckjf202060537"');


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
        echo "Haciendo head";
        $this->head = $structure->getHead(); 
    }

    public function setCheck($check) {
        $this->check = $check;
    }

    public function setSelect($select) {
        $this->select = $select;
    }

    public function getData() {
        return [
            "head" => $this->head
        ];
    }

}





class Node {
	public $empleado;
    public $nombre;
    public $temperatura;
    public $fecha;
    public $tiempo;
    public $ubicacion;
	public $next;

	public function __construct($empleado,$nombre,$temperatura,$fecha,$tiempo,$ubicacion) {
		$this->data = $empleado;
        $this->nombre = $nombre;
        $this->temperatura = $nombre;
        $this->fecha = $tiempo;
        $this->ubicacion = $ubicacion;
        $this->next = NULL;
	}
    public function getData(){
        return $this->data;
    }
}

class LinkedList{
    private $h = NULL;
    private $t = NULL;

    public function queue($empleado,$nombre,$temperatura,$fecha,$tiempo,$ubicacion){
        $n = new Node($empleado,$nombre,$temperatura,$fecha,$tiempo,$ubicacion);

        if($this->h == NULL){
            $this->h = $n;
            $this->h->empleado = $empleado;
            $this->h->nombre = $nombre;
            $this->h->temperatura =$temperatura;
            $this->h->fecha = $fecha;
            $this->h->tiempo = $tiempo;
            $this->h->ubicacion = $ubicacion;
            $this->t = $n;
        }
        else{
            $this->t->next = $n;
            $this->t = $this->t->next;
            $this->t->empleado = $empleado;
            $this->t->nombre = $nombre;
            $this->t->temperatura =$temperatura;
            $this->t->fecha = $fecha;
            $this->t->tiempo = $tiempo;
            $this->t->ubicacion = $ubicacion;
        }
    }
    public function delete(){
        //drop data
    }
    public function display(){
        $it = $this->h;
        while($it!=NULL){
            /*
            echo "<tr>".
                    "<td>".$it->empleado."</td>".
                    "<td>".$it->nombre."</td>".
                    "<td>".$it->temperatura."</td>".
                    "<td>".$it->fecha."</td>".
                    "<td>".$it->tiempo."</td>".
                    "<td>".$it->ubicacion."</td>".
                 "</tr>";
            */
            $it = $it->next;
        }
    }

    public function getHead() {
        return $this->h;
    }
}
/*
echo "<tr>".
"<td>".$it->empleado."</td>"."<br>".
"<td>".$it->nombre."</td>"."<br>".
"<td>".$it->temperatura."</td>"."<br>".
"<td>".$it->fecha."</td>"."<br>".
"<td>".$it->tiempo."</td>"."<br>".
"<td>".$it->ubicacion."</td>"."<br>"."<br>"."<hr>".
"</tr>";
*/