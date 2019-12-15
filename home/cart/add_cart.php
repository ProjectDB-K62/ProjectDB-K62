<?php
    $cur_id = $_GET['product_id'];
    if(isset($_SESSION['cart'][$cur_id])){
        $_SESSION['cart'][$cur_id]++;
    }else{
        $_SESSION['cart'][$cur_id] = 1;
    }
    header('location:index.php?page_layout=cart')
?>