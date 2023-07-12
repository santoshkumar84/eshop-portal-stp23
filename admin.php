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
                
            </div>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
