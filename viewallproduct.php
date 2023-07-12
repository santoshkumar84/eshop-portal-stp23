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
        <style>
            
        </style>
    </head>
    <body>
        <?php include './header.php'; ?>
        <main style="display:flex">
            <div class="left-panel">
                <?php include './adminmenu.php'; ?>
            </div>
            <div class="right-panel">
                <?php
                    include './dbinfo.php';
                    $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                    $result = mysqli_query($con, "select * from productmaster");
                    if(mysqli_num_rows($result)>0){
                        echo "<table width='100%' border='1' style='text-align:center'>";
                        echo "<tr>";
                        echo "<th>Product Id</th>";
                        echo "<th>Product Name</th>";
                        echo "<th>Product Price</th>";
                        echo "<th>Product Type</th>";
                        echo "<th>Product Image</th>";
                        echo "<th></th>";
                        echo "<th></th>";
                        echo "</tr>";
                       while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td><img src='$row[4]' width='30px' height='30px'/></td>";
                            $path="";
                            if($row[3]=="Mobile")
                                   $path="addmobiledesc.php?pid=$row[0]";
                            else
                                   $path="addtvdesc.php?pid=$row[0]";
                            echo "<td><a class='abutton1' href='$path'>Add Desc</a></td>";
                            echo "<td><a class='abutton2' href=''>Delete</a></td>";
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
