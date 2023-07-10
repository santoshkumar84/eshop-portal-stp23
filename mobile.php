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
            <?php
                include './dbinfo.php';
                $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                $qry = "select * from productmaster where ptype='mobile'";
                $result = mysqli_query($con, $qry);
                if(mysqli_num_rows($result)>0)
                {
                    $count = 0;
                    while($r = mysqli_fetch_assoc($result)){
                        if($count==0)
                            echo "<div class='row'>";
                        $count++;
                        echo "<div class='column' align='center'>";
                            echo "<div class='product'>";
                                echo "<div class='row1'>";
                                    echo "<div class='datacolumn'><img src='$r[pimage]' /></div>";
                                echo "</div>";
                                echo"<div class='row1'>";
                                    echo "<div class='datacolumn'>$r[pname]</div>";
                                echo "</div>";
                                echo "<div class='row1'>";
                                    echo "<div class='datacolumn'>Rs. $r[pprice]</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        
                        if($count==4){
                            echo "</div>";
                            $count=0;
                        }
                    }
                }
                else{
                    echo "<h2>No Product Found!!!</h2>";
                }
                mysqli_close($con);
            ?>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
