<?php

namespace Lib;

use \PDO;

class Connection {
    public static function make(){
        return new PDO("mysql:host=localhost;dbname=test_db", 'root','');
    }    
}
?>
