<?php
session_start();
if(!isset($_SESSION['uname']))
{
    header("location:signin.php");
}
$msg= "";
if(isset($_POST['btnorder']))
{
    $userid = $_SESSION['uid'];
    $pid = $_COOKIE['cart'];
    $date = date("Y-m-d");
    $amt = $_SESSION['total'];
    $address = $_POST['txtname'].",".$_POST['txtaddress'];
    $mode = $_POST['paymentmode'];
    $status = "Undelivered";
    include 'dbinfo.php';
    $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
    $qry = "insert into orders(user_id,pid,order_date,amount,address,payment,status) values($userid,'$pid','$date',$amt,'$address','$mode','$status')";
    mysqli_query($con, $qry);
    if(mysqli_affected_rows($con)>0){
        $msg="<h2 style='color:green'>Order placed successfully!!!!!</h2>";
        setcookie("cart","");
    }
    else
        $msg="<h2 style='color:red'>Order Not placed. Try Again !!!!!</h2>";
    mysqli_close($con);
}
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
    </head>
    <body>
        <?php include './header.php'; ?>
        <main>
            <center>
                <form method="post">
                    <table style="margin-top: 100px">
                        <caption><h2>Shipping Address</h2></caption>
                        <tr>
                            <td><label>Name</label></td>
                            <td><input type="text" name="txtname" value="" class="form-input"/></td>
                        </tr>
                        <tr>
                            <td><label>Address</label></td>
                            <td><textarea style="height:100px" name="txtaddress" class="form-input"></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Payment Mode</label></td>
                            <td>
                                <select class="form-input" name="paymentmode">
                                    <option>Select Payment Mode</option>
                                    <option>Cash on Delivery</option>
                                    <option>Credit Card</option>
                                    <option>Debit Card</option>
                                    <option>Internet Banking</option>
                                    <option>UPI</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="btnorder" value="Order Now" class="btn"/></td>
                        </tr>
                    </table>
                    <?php echo $msg; ?>
                </form>
            </center>
            
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
