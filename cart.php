<?php
session_start();

?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    </head>
    <body>
        <?php include './header.php'; ?>
        <main style="margin-left: 400px;">
             <?php 
             if(isset($_COOKIE['cart'])){
                 $products = $_COOKIE['cart'];
                include 'dbinfo.php';
                $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                $result = mysqli_query($con, "select * from productmaster where pid in ($products)");
                    if(mysqli_num_rows($result)>0){
                        echo "<table style='width:50%;' class='table table-striped'>";
                        echo "<tr>";
                        echo "<th>Product</th>";
                        echo "<th>Name</th>";
                        echo "<th>Price</th>";
                        echo "<th style='text-align:right'></th>";
                        echo "</tr>";
                        $amount=0;
                       while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td><img src='$row[4]' width='50px' height='50px'/></td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            $amount+=$row[2];
                            echo "<td style='text-align:right'><a href='deletecart.php?pid=$row[0]'><img src='del.jpg'/></a></td>";
                            echo "</tr>";
                        }
                        $_SESSION['total']=$amount;
                        echo "<tr>";
                            echo "<td colspan='4' align='right'>Total Amount : <b>$amount</b></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td colspan='3'></td>";
                            echo "<td align='right'><a class='btn' href='shipping.php'>Place Order</a></td>";
                        echo "</tr>";
                        echo "</table>";
                    }
                     mysqli_close($con);
             }
             else
                echo "<h2>Cart is Empty!!!!</h2>";
                   
             ?>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
