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
                <div class="signup-form">
                <form method="post" enctype="multipart/form-data">
                    <table style="width: 100%; margin: 10px">
                        <caption>
                            Add Television Description
                            <hr size="4" color="maroon" style="padding:0px; margin-top: 5px">
                        </caption>
                        <tr>
                            <td><label>Product ID</label></td>
                            <td><input class="form-input" type="text" value="<?php
                            if(isset($_GET['pid'])){
                                echo $_GET['pid']; 
                            }
                            ?>" name='txt_pid'/></td>
                        </tr>
                        <tr>
                            <td><label>In The Box</label></td>
                            <td><input class="form-input" type="text" name='txt_box'/></td>
                        </tr>
                        <tr>
                            <td><label>Color</label></td>
                            <td><input class="form-input" type="text" name='txt_color'/></td>
                        </tr>
                        <tr>
                            <td><label>Display Size</label></td>
                            <td><input class="form-input" type="text" name='txt_dsize'/></td>
                        </tr>
                        <tr>
                            <td><label>Screen Size</label></td>
                            <td><input class="form-input" type="text" name='txt_ssize'/></td>
                        </tr>
                        <tr>
                            <td><label>HD Technology & Resolution</label></td>
                            <td><input class="form-input" type="text" name='txt_hdtech'/></td>
                        </tr>
                        <tr>
                            <td><label>Smart Tv</label></td>
                            <td style="padding-left: 10px;height: 34px;">
                                <input type="radio" name='smarttv' value="Yes"/> Yes 
                                <input type="radio" name='smarttv' value="No"/> No
                            </td>
                        </tr>
                        <tr>
                            <td><label>Motion Sensor</label></td>
                            <td style="padding-left: 10px;height: 34px;">
                                <input type="radio" name='msensor' value="Yes"/> Yes 
                                <input type="radio" name='msensor' value="No"/> No
                            </td>
                        </tr>
                        <tr>
                            <td><label>HDMI</label></td>
                            <td><input class="form-input" type="number" name='txt_hdmi'/></td>
                        </tr>
                        <tr>
                            <td><label>USB</label></td>
                            <td><input class="form-input" type="number" name='txt_usb'/></td>
                        </tr>
                        <tr>
                            <td><label>Built In Wi-Fi</label></td>
                            <td style="padding-left: 10px;height: 34px;">
                                <input type="radio" name='wifi' value="Yes"/> Yes 
                                <input type="radio" name='wifi' value="No"/> No
                            </td>
                        </tr>
                        <tr>
                            <td><label>Launch Year</label></td>
                            <td><input class="form-input" type="number" name='txt_year'/></td>
                        </tr>
                        <tr>
                            <td><label>Wall Mount Included</label></td>
                            <td style="padding-left: 10px;height: 34px;" >
                                <input style="" type="radio" name='wallamt' value="Yes"/> Yes 
                                <input type="radio" name='wallamt' value="No"/> No
                            </td>
                        </tr>
                        
                        
                        <tr>
                        <td colspan="2"><input class="btn" type="submit" name='add_desc' value="Add Description"/></td>
                        </tr>
                </table>
                     </form>
                    </div>
            </div>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
