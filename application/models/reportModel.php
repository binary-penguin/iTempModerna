<?php

class reportModel extends Model{
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
    private $filter = [];
    private $granter = [];
    private $cbx;
    private $verifier;
    private $list = [];
    private $check = [];
    

    public function temperatureProcessor($complemento){
        list($d,$d1,$d2,$d3,$d4) = explode(" ",$complemento);
        list($d,$d1) = explode("=",$d3);
        $this->temperature = floatval($d1);
        unset($d,$d1,$d2,$d3,$d4);
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
                if($this->filter[$ckd]==="baja"){
                    if($this->temperature < 36.0){
                        $this->granter[$ckd] = $this->verifier['pass'];
                        //echo "nominal"."<br>";
                    }
                    else{
                        $this->granter[$ckd] = $this->verifier['block'];
                    }
                }
                else if($this->filter[$ckd]==="normal"){
                    if(($this->temperature>=36.0 && $this->temperature<=37)){
                        //echo "advisory"."<br>";
                        $this->granter[$ckd] = $this->verifier['pass'];
                    }
                    else{
                        $this->granter[$ckd] = $this->verifier['block'];
                    }
                }
                else {
                    if($this->temperature>37.0){
                        //echo "caution"."<br>";
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

        $this->query = $this->db->query('SELECT  emp.empleado,emp.nombre_completo,mac.hora,mac.complemento
                        ,lec.clave,lec.descripcion
                        FROM marca AS mac
                        INNER JOIN empleado AS emp
                        ON emp.empleado = mac.datos
                        INNER JOIN lector AS lec
                        ON lec.clave = mac.clave
                        ORDER BY mac.hora');

        $this->verifier = [
            "pass"=>TRUE,
            "block"=>FALSE
        ];


        $structure = new LinkedList;
       
        while($row = $this->query->fetch()){
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

            if($this->filterProcessor()){
                $structure->queue($this->empleado,$this->nombre,$this->temperature,$this->fecha,$this->tiempo,$this->location);
                $structure->display();
            }
            /*else{
                echo "verga de dementor"."<br>";
            }*/
        }
        // Get List from Linked List
        $this->list = $structure->getList();
               
    }

    public function getData(){
        return [
            "list" => $this->list

        ];
    }

    public function setCbx($cbx) {
        $this->cbx = $cbx;
    }

    public function setFilter($filter) {
        $this->filter = $filter;
    }

    public function setCheck($check) {
        $this->check = $check;
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
        $this->temperatura = $temperatura; 
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
    private $list = [];
 
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

    public function display(){ 
        $it = $this->h; 
        while($it!=NULL){
            $this->list[] = $it;
            /*  echo "<tr>". 
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

    public function getList() {
        return $this->list;
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