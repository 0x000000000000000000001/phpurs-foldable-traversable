<?php

$Data_Foldable_foldrArray = function($f, $init = null, $xs = null) {
    if (func_num_args() < 3) {
        $__args = func_get_args();
        return function(...$more) use ($__args) {
            global $Data_Foldable_foldrArray;
            return $Data_Foldable_foldrArray(...array_merge($__args, $more));
        };
    }
    $acc = $init; for($i=count($xs)-1; $i>=0; $i--) { $acc = $f($xs[$i])($acc); } return $acc;
};
$Data_Foldable_foldlArray = function($f, $init = null, $xs = null) {
    if (func_num_args() < 3) {
        $__args = func_get_args();
        return function(...$more) use ($__args) {
            global $Data_Foldable_foldlArray;
            return $Data_Foldable_foldlArray(...array_merge($__args, $more));
        };
    }
    $acc = $init; foreach($xs as $x) { $acc = $f($acc)($x); } return $acc;
};