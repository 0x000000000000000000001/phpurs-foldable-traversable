<?php

$arrayFrom1UpTo = function($n) {
    $result = [];
    for ($i = 1; $i <= $n; $i++) {
        $result[] = $i;
    }
    return $result;
};

$arrayReplicate = function($n, $x = null) use (&$arrayReplicate) {
    if (func_num_args() < 2) {
        $__args = func_get_args();
        return function(...$more) use ($__args, &$arrayReplicate) {
            return $arrayReplicate(...array_merge($__args, $more));
        };
    }
    $result = [];
    for ($i = 1; $i <= $n; $i++) {
        $result[] = $x;
    }
    return $result;
};

$mkNEArray = function($nothing, $just = null, $arr = null) use (&$mkNEArray) {
    if (func_num_args() < 3) {
        $__args = func_get_args();
        return function(...$more) use ($__args, &$mkNEArray) {
            return $mkNEArray(...array_merge($__args, $more));
        };
    }
    return count($arr) > 0 ? $just($arr) : $nothing;
};

$foldMap1NEArray = function($append, $f = null, $arr = null) use (&$foldMap1NEArray) {
    if (func_num_args() < 3) {
        $__args = func_get_args();
        return function(...$more) use ($__args, &$foldMap1NEArray) {
            return $foldMap1NEArray(...array_merge($__args, $more));
        };
    }
    $acc = $f($arr[0]);
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $acc = $append($acc)($f($arr[$i]));
    }
    return $acc;
};

$exports['arrayFrom1UpTo'] = $arrayFrom1UpTo;
$exports['arrayReplicate'] = $arrayReplicate;
$exports['mkNEArray'] = $mkNEArray;
$exports['foldMap1NEArray'] = $foldMap1NEArray;
return $exports;
