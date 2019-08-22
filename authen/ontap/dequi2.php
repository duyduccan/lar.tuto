<?php
/**
 * Created by PhpStorm.
 * User: duc
 * Date: 06/08/2019
 * Time: 2:05 CH
 */
/*
 * Đệ qui trong php là việc bản thân 1 hàm gọi lại chính nó cho đến khi
 * đạt được mục đích nào đó
 * mà kết quả của bước này là đầu vào của bước tiếp theo
 * vị dụ kết quả của bước 1 là đầu vào của bước 2
 * kết quả của bước 2 là đầu vào của bước 3
 * kết quả của bước 3 là đầu vào của bước 4
 * chúng ta sẽ có 1 điều kiện dừng khi mà đạt được kết quả
 * */
/*
 *In ra 1 tam giác các ngôi sao mà mỗi dòng từ 1* và kết thúc 100*
 * *
 * **
 * ***
 * n****
 * 100*****
 *  */
function  printStar($n){
    for($i = $n; $i > 0; $i--){
        echo "<br> " .str_repeat('*',$i);
    }
}
//printStar(100);

function printStarDequy($n,$i){
    echo "<br> " .str_repeat('*',$i);
    if($i > 0){
        $i--;
        printStarDequy($n,$i);
    }
}
printStarDequy(100,100);