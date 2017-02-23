<?php

$arr = array(1, 2, 3);

$n = count($arr);
$sub_n = pow(2, $n);
$sub_array = array();

for ($i = 0; $i < $sub_n; $i++) {
    $m = sprintf('%0+' . $n . 'b', $i);
    $t_arr = array();
    for ($j = 0; $j < $n; $j++)
        if ($m{$j} == 1 && $j != $n) $t_arr[] = $arr[$j];
    $sub_array[count($t_arr)][] = $t_arr;
}

krsort($sub_array);

$result = [];
foreach ($sub_array as $val) {
    foreach ($val as $v) {
        $result[] = $v;
    }
}

return array_filter($result);
