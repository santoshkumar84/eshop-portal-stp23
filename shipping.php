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
                </form>
            </center>
            
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
