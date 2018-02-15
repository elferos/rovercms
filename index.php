<?php
class Connection {
    public static function make(){
        return new PDO("mysql:host=localhost;dbname=test_db", 'root','');
    }    
}

class QueryBuilder {
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

$db = new QueryBuilder(Connection::make());

$users = $db->select("test");
var_dump($users);

?>