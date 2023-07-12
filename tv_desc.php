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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include './header.php'; ?>
        <main>
<?php
    $id = $_GET['pid'];
    include './dbinfo.php';
    $link = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
    $qry1 = "select * from productmaster where pid=$id";
    $qry2 = "select * from tv_specification where pid=$id";
    $result1 = mysqli_query($link, $qry1);
    $result2 = mysqli_query($link, $qry2);
    $row1 = mysqli_fetch_array($result1);
    $row2 = mysqli_fetch_array($result2);
    echo "<div class='row' style='width:100%'>";
    echo "<div class='col-sm-2'><img src='$row1[4]'/></div>";
    echo "<div class='col-sm-1'></div>";
    echo "<div class='col-sm-5'>";
    echo "<div class='row'><div col-sm-12'><h3>$row1[1]</h3></div></div>";
    echo "<div class='row'><div col-sm-12'>Price : $row1[2]</div></div>";
    echo "<div class='row'><div col-sm-12'>Color : $row2[2], Processor : $row2[2], RAM : $row2[9], Storage : $row2[8]</div></div>";
    echo "<div class='row'><div col-sm-12'>Launch Year : $row2[11]</div></div>";
    echo "<div class='row'><div col-sm-12'><a class='btn btn-success' style='width:120px' href='mycart.php?pid=$row1[0]&type=$row1[3]'>Add To Cart</a></div></div>";
    echo "</div>";
    echo "</div>";
    echo "<h2>Specification</h2>";
    echo "<table class='table table-striped table-bordered'>";
    echo "<tr><th>In The Box</th><td>$row2[1]</td></tr>";
    echo "<tr><th>Display Size</th><td>$row2[3]</td></tr>";
    echo "<tr><th>Color</th><td>$row2[2]</td></tr>";
    echo "<tr><th>Screen Type</th><td>$row2[4]</td></tr>";
    echo "<tr><th>HD Technology & Resolution</th><td>$row2[5]</td></tr>";
    echo "<tr><th>Smart TV</th><td>";
    if($row2[6]==0)
        echo "No";
    else
        echo "Yes";
    echo "</td></tr>";
    echo "<tr><th>Motion Senser</th><td>";
    if($row2[7]==0)
        echo "No";
    else
        echo "Yes";
    echo "</td></tr>";
    echo "<tr><th>HDMI Port</th><td>$row2[8]</td></tr>";
    echo "<tr><th>USB Port</th><td>$row2[9]</td></tr>";
    echo "<tr><th>Wifi</th><td>";
    if($row2[10]==0)
        echo "No";
    else
        echo "Yes";
    echo "</td></tr>";
    
    echo "<tr><th>Launch Year</th><td>$row2[11]</td></tr>";
    echo "<tr><th>Wall Mount included</th><td>";
    if($row2[12]==0)
        echo "No";
    else
        echo "Yes";
    echo "</td></tr>";
    
    echo "</table>";
?>              
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
