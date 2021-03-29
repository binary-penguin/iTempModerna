<?php

class Model {
    protected $db;

    function __construct() {
        $this->connectDb();
    }

    private function connectDb() {
        // FETCH_ASSOC  ->      row['id'];
        // FETCH_OBJ    ->      row->id;
        try {
            $pdo_config = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
            $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT, DB_USER, DB_PASS, $pdo_config);
            //echo "Db success!!";
        } 
        catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
}