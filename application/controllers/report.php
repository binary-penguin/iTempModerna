<?php

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
            echo "<tr>".
                    "<td>".$it->empleado."</td>".
                    "<td>".$it->nombre."</td>".
                    "<td>".$it->temperatura."</td>".
                    "<td>".$it->fecha."</td>".
                    "<td>".$it->tiempo."</td>".
                    "<td>".$it->ubicacion."</td>".
                 "</tr>";
            $it = $it->next;
        }
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