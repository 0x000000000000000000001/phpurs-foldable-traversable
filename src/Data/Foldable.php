<?php

$foldrArray = function($f, $init, $xs) use (&$foldrArray) {
    
    $acc = $init;
    for ($i = \count($xs) - 1; $i >= 0; $i--) {
        $f1 = $f($xs[$i]);
        $acc = $f1($acc);
    }
    return $acc;
};
$exports['foldrArray'] = $foldrArray;

$foldlArray = function($f, $init, $xs) use (&$foldlArray) {
    
    $acc = $init;
    for ($i = 0, $len = \count($xs); $i < $len; $i++) {
        $f1 = $f($acc);
        $acc = $f1($xs[$i]);
    }
    return $acc;
};
$exports['foldlArray'] = $foldlArray;

return $exports;
