<?php
require_once __DIR__.'/vendor/autoload.php';

use Lib\Connection;
use Lib\QueryBuilder;
use Lib\ArrayOps;

$db = Connection::make();
$db = new QueryBuilder(Connection::make());

$users = $db->select("test");

$names = ArrayOps::map($users, function($user){
    return $user['name'];
});

$names1 = ArrayOps::filter($users, function($user){
    return $user['id'];
});

var_dump($users, $names, $names1);

?>