<?php
session_start();
if(isset($_SESSION['role']))
{
    if($_SESSION['role']!='Admin')
        header("location:index.php");
}
else{
    header("location:signin.php");
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
        <main style="display:flex">
            <div class="left-panel">
                <?php include './adminmenu.php'; ?>
            </div>
            <div class="right-panel">
                <?php
                    $con = mysqli_connect("localhost","root","","eshopdb");
                    $result = mysqli_query($con, "select * from usermaster");
                    if(mysqli_num_rows($result)>0){
                        echo "<table width='100%' border='1' style='text-align:center'>";
                        echo "<tr>";
                        echo "<th>User Id</th>";
                        echo "<th>Name</th>";
                        echo "<th>Email Id</th>";
                        echo "<th>Password</th>";
                        echo "<th>Gender</th>";
                        echo "<th>Mobile No.</th>";
                        echo "<th>Date of Birth</th>";
                        echo "<th>Role</th>";
                        echo "<th></th>";
                        echo "</tr>";
                       while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td>$row[5]</td>";
                            echo "<td>$row[6]</td>";
                            echo "<td>$row[7]</td>";
                            echo "<td><a class='abutton2' href='deleteuser.php?uid=$row[0]'>Delete</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    else
                        echo "<h2>No Product Found !!!!</h2>";
                    mysqli_close($con);
                ?>
            </div>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
