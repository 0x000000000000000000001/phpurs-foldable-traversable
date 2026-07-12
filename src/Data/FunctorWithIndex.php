<?php

$mapWithIndexArray = function($f, $xs = null) use (&$mapWithIndexArray) {
    if (\func_num_args() < 2) {
        $__args = \func_get_args();
        return function(...$more) use ($__args, &$mapWithIndexArray) {
            return $mapWithIndexArray(...\array_merge($__args, $more));
        };
    }
    
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
