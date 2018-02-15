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
}

?>