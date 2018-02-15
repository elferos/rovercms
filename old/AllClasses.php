<?php

namespace Lib;

class Connection {
    public static function make(){
        return new PDO("mysql:host=localhost;dbname=test_db", 'root','');
    }    
}

class QueryBuilder{
    private $db;

    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }

    public function select($table){
        $pholder = $this->db->prepare("SELECT * FROM $table");
        $pholder->execute();
        $result = $pholder->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }
}

class ArrayOps{
    public static function map($items, $func){
        $results = [];
        foreach ($items as $item) {
            $results[] = $func($item);
        }
        return $results;
    }
}
?>
