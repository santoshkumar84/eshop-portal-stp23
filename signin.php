<?php
session_start();
if(isset($_SESSION['uname']))
{
    header("location:index.php");
}
    $msg="";
    if(isset($_POST['btnlogin']))
    {
        $uname = $_POST['txtusername'];
        $pwd = $_POST['txtpassword'];
        include './dbinfo.php';
        $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
        $result = mysqli_query($con, "select * from usermaster where user_email='$uname' and User_pwd='$pwd'");
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            $_SESSION['uname']=$row[1];
            $_SESSION['role']=$row[7];
            header("location:index.php");
        }
        else{
            $msg="<font color='red'><b>Invalid username and password !!!!!<b></font>";
        }
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
        <main style="margin: auto">
             <div class="signup-form" style="width: 450px">
                 <form method="post">
                <table width="80%" cellspacing="5px">
                    <caption>
                            User Login !!
                            <hr size="4" color="maroon" style="padding:0px; margin: 10px">
                        </caption>
                    <tr>
                        <td><label>Username</label></td>
                        <td><input class="form-input" type="text" placeholder="Enter Username" name="txtusername" value=""/></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input class="form-input" type="text" placeholder="Enter Password" name="txtpassword" value=""/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="rem" value="on"/> Remember Me !</td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align="right"><input class="btn" type="submit" name="btnlogin" value="Sign In"/></td>
                    </tr>
                </table>
                     <?php echo $msg; ?>
                     </form>
                 <div align="left" style="padding:10px"><a style="color: maroon; font-weight: bold" href="">Forget Password Click Here !!!!!</a></div>
            </div>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
