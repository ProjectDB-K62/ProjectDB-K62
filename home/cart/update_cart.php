<?php
    $_SESSION['cart']=$_POST['cart[]'];
    header("location:index.php?page_layout=cart");
?>