<?php

//cau 1 a
function findMax5($arr)
{
    $result = [];
    $array = sortArray($arr);
    for ($i = 0; $i < 5; $i++) {
        $result[] = $array[$i];
    }
    return $result;
}
function sortArray($arr)
{
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$i] < $arr[$j]) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
    return $arr;
}
//Cau 1 b
function findFrequent($arr)
{
    $result = [];
    $result2 = [];
    $max = 0;
    foreach ($arr as $key => $value) {
        if (isset($result[$value])) {
            $result[$value]++;
        } else {
            $result[$value] = 1;
        }
    } 
    foreach ($result as $key => $value) {
        if ($value > $max) {
            $max = $value;
        }
    }
    foreach ($result as $key => $value) {
        if ($value == $max) {
            if ($key == '') {
                $result2[] = 'null';
            } else if ($key == 0) {
                $result2[] = 'false';
            } else if ($key == 1) {
                $result2[] = 'true';
            } else {
                $result2[] = $key;
            }
        }
    }
    return $result2;
}
