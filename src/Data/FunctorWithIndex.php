<?php

$mapWithIndexArray = function($f, $xs) use (&$mapWithIndexArray) {
    
    $len = \count($xs);
    $result = array_fill(0, $len, null);
    for ($i = 0; $i < $len; $i++) {
        $f1 = $f($i);
        $result[$i] = $f1($xs[$i]);
    }
    return $result;
};

$exports['mapWithIndexArray'] = $mapWithIndexArray;

return $exports;
