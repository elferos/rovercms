<?php

namespace Lib;

class ArrayOps{
    public static function map($items, $func){
        $results = [];
        foreach ($items as $item) {
            $results[] = $func($item);
        }
        return $results;
    }

    public static function filter($items, $func){
        $results = [];
        foreach ($items as $item) {
            if($func($item) == 2){
                $results[] = $item;
            }
        }
        return $results;
    }
}

?>