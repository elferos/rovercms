<?php

namespace Lib;

use \PDO;

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
?>