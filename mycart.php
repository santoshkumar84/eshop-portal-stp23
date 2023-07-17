<?php
    $productid = $_GET['pid'];
    $ptype= $_GET['type'];
    if(isset($_COOKIE['cart']))
    {
        $data = $_COOKIE['cart'];
        if(!strstr($data,$productid)){
        $data = $data.",".$productid;
        setcookie("cart",$data);
        }
    }
    else{
        setcookie("cart",$productid);
    }
    if($ptype=="Mobile")
        header("location:mobile_desc.php?pid=$productid");
    else
        header("location:tv_desc.php?pid=$productid");
?>
