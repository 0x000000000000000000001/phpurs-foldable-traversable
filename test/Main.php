<?php

$arrayFrom1UpTo = function($n) {
    $result = [];
    for ($i = 1; $i <= $n; $i++) {
        $result[] = $i;
    }
    return $result;
};

$arrayReplicate = function($n, $x) use (&$arrayReplicate) {
    $result = [];
    for ($i = 1; $i <= $n; $i++) {
        $result[] = $x;
    }
    return $result;
};

$mkNEArray = function($nothing, $just, $arr) use (&$mkNEArray) {
    return count($arr) > 0 ? $just($arr) : $nothing;
};

$foldMap1NEArray = function($append, $f, $arr) use (&$foldMap1NEArray) {
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
