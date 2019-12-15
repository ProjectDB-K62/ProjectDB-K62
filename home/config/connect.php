<?php
    $connect = mysqli_connect('localhost', 'root','', 'webproduct');
    if($connect){
        mysqli_query($connect, 'SET NAMES "utf8"');
    }else{
        die('Ket noi that bai.');
    }
?>