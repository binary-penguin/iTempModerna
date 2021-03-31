<?php

class accountModel extends Model {
    public $e_number;

    function __constructor() {
        $this->e_number = "";
    }

    public function setUser($e_number) {
        $this->e_number = $e_number;
    }

    public function getData(){
        return [
            "user" => $this->e_number,
        ];
    }
}