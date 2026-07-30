<?php

$traverseArrayImpl = function($apply, $map, $pure, $f, $array) use (&$traverseArrayImpl) {

    $array1 = function ($a) { return [$a]; };
    $array2 = function ($a) { return function ($b) use ($a) { return [$a, $b]; }; };
    $array3 = function ($a) { return function ($b) use ($a) { return function ($c) use ($a, $b) { return [$a, $b, $c]; }; }; };
    $concat2 = function ($xs) { return function ($ys) use ($xs) { return \array_merge($xs, $ys); }; };
    
    $go = function ($bot, $top) use (&$go, $array, $apply, $map, $pure, $f, $array1, $array2, $array3, $concat2) {
        switch ($top - $bot) {
            case 0:
                return $pure([]);
            case 1:
                $f1 = $f($array[$bot]);
                return $map($array1, $f1);
            case 2:
                $f1 = $f($array[$bot]);
                $f2 = $f($array[$bot + 1]);
                $map2 = $map($array2, $f1);
                return $apply($map2, $f2);
            case 3:
                $f1 = $f($array[$bot]);
                $f2 = $f($array[$bot + 1]);
                $f3 = $f($array[$bot + 2]);
                $map2 = $map($array3, $f1);
                $app1 = $apply($map2, $f2);
                return $apply($app1, $f3);
            default:
                $pivot = $bot + floor(($top - $bot) / 4) * 2;
                $go1 = $go($bot, $pivot);
                $go2 = $go($pivot, $top);
                $map2 = $map($concat2, $go1);
                return $apply($map2, $go2);
        }
    };
    return $go(0, \count($array));
};
$exports['traverseArrayImpl'] = $traverseArrayImpl;

return $exports;
