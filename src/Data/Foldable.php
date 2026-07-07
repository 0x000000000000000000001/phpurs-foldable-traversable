<?php

$foldrArray = function($f, $init = null, $xs = null) use (&$foldrArray) {
    if (func_num_args() < 3) {
        $__args = func_get_args();
        return function(...$more) use ($__args, &$foldrArray) {
            return $foldrArray(...array_merge($__args, $more));
        };
    }
    
    $acc = $init;
    for ($i = count($xs) - 1; $i >= 0; $i--) {
        $f1 = $f($xs[$i]);
        $acc = $f1($acc);
    }
    return $acc;
};
$exports['foldrArray'] = $foldrArray;

$foldlArray = function($f, $init = null, $xs = null) use (&$foldlArray) {
    if (func_num_args() < 3) {
        $__args = func_get_args();
        return function(...$more) use ($__args, &$foldlArray) {
            return $foldlArray(...array_merge($__args, $more));
        };
    }
    
    $acc = $init;
    for ($i = 0, $len = count($xs); $i < $len; $i++) {
        $f1 = $f($acc);
        $acc = $f1($xs[$i]);
    }
    return $acc;
};
$exports['foldlArray'] = $foldlArray;

return $exports;
