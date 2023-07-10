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
    $msg = "";
    if(isset($_POST['add_product'])){
        $id = $_POST['txt_pid'];
        $name = $_POST['txt_pname'];
        $type = $_POST['ptype'];
        $price = $_POST['txt_pprice'];
        $path="";
        if($_FILES['pimage']['error']==0 ){
            if($_FILES['pimage']['type']=="image/jpg" || $_FILES['pimage']['type']=="image/png" || $_FILES['pimage']['type']=="image/jpeg"){
                $sou = $_FILES['pimage']['tmp_name'];
                $des = $_SERVER['DOCUMENT_ROOT']."/eshop1/product/".$_FILES['pimage']['name'];
                if(move_uploaded_file($sou, $des)){
                    $path="product/".$_FILES['pimage']['name'];
                    include './dbinfo.php';
                    $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
                    $query = "insert into productmaster values($id,'$name',$price,'$type','$path')";
                    mysqli_query($con, $query);
                    if(mysqli_affected_rows($con)>0)
                        $msg= "Product Add Successfuly!!!!!";
                    else
                        $msg= "Product Not Added. Try Again.....";
                    mysqli_close($con);
                }
            else{
                $msg="Error in adding the product!!!!";
            }
            }
        }
        else{
            $msg= "File is Corrupted !!!!!";
        }
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
                            Add New Product
                            <hr size="4" color="maroon" style="padding:0px; margin-top: 5px">
                        </caption>
                        <tr>
                            <td><label>Product ID</label></td>
                            <td><input class="form-input" type="text" name='txt_pid'/></td>
                        </tr>
                        <tr>
                            <td><label>Product Name</label></td>
                            <td><input class="form-input" type="text" name='txt_pname'/></td>
                        </tr>
                        <tr>
                            <td><label>Product Type</label></td>
                                    <td><select class="form-input" name="ptype">
                                            <option></option>
                                            <option>Mobile</option>
                                            <option>TV</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label>Product Price</label></td>
                            <td><input class="form-input" type="text" name='txt_pprice'/></td>
                        </tr>
                        <tr>
                            <td><label>Product Image</label></td>
                            <td><input class="form-input" type="file" name='pimage'/></td>
                        </tr>
                        <tr>
                        <td colspan="2"><input class="btn" type="submit" name='add_product' value="Add Product"/></td>
                        </tr>
                </table>
                    <?php echo $msg; ?>
                     </form>
                    </div>
            </div>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
