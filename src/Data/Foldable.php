<?php

$foldrArray = function($f, $init = null, $xs = null) use (&$foldrArray) {
    if (func_num_args() < 3) {
        $__args = func_get_args();
        return function(...$more) use ($__args, &$foldrArray) {

            return $foldrArray(...array_merge($__args, $more));
        };
    }
    $acc = $init; for($i=count($xs)-1; $i>=0; $i--) { $acc = $f($xs[$i])($acc); } return $acc;
};
$foldlArray = function($f, $init = null, $xs = null) use (&$foldlArray) {
    if (func_num_args() < 3) {
        $__args = func_get_args();
        return function(...$more) use ($__args, &$foldlArray) {

            return $foldlArray(...array_merge($__args, $more));
        };
    }
    $acc = $init; foreach($xs as $x) { $acc = $f($acc)($x); } return $acc;
};

$exports['foldrArray'] = $foldrArray;
$exports['foldlArray'] = $foldlArray;
return $exports;
