<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 06/08/2019
 * Time: 1:14 CH
 */
/*
 * 1 - global
 * */
$x = 10;

echo '<br> biến x global ' . $x;
/*
 * 2 - local
 * */
function test_var_local(){
    $x = 5;
    echo '<br> biến x local ' . $x;
}
test_var_local();
/*
 * 3 - static
 * */
function myTest() {
    static $x = 0;
    echo '<br>test keyword static ' . $x;
    $x++;
}

myTest();
myTest();
myTest();