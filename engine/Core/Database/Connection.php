<?php

namespace Engine\Core\Database;

use \PDO;
use Engine\Core\Config\Config;

class Connection {
    private $link;

    /**
     * Connection constructor
     */
    public function __construct(){
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect(){
        // $config = require_once 'config.php';
        $config = Config::file('database');

        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];

        try {
            $this->link = new PDO($dsn, $config['username'], $config['password']);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
        // var_dump($this->link);
        return $this;
    }

    /**
     * @param [type] $sql
     * @param array $values
     * @return void
     */
    public function execute($sql, $values = [])
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute($values);
    }

    /**
     * @param [type] $sql
     * @param array $values
     * @return void
     */
    public function query($sql, $values = [])
    {
        $sth = $this->link->prepare($sql);
        $sth->execute($values);
        $result = $sth->fetchALL(PDO::FETCH_ASSOC);
        if ($result === false) {
            return [];
        }

        return $result;
    }

    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }
}
?>