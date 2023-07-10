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
    $msg="";
    if(isset($_POST['btnreg'])){
        $name = $_POST['txtname'];
        $email = $_POST['txtemail'];
        $pass = $_POST['txtpwd'];
        $gen = $_POST['gender'];
        $mobile=$_POST['txtmobile'];
        $dob=$_POST['txtdob'];
        $role=$_POST['role'];
         include './dbinfo.php';
         $conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
        $qry = "insert into usermaster(user_name,user_email,user_pwd,user_gender,user_mobile,user_dob,role) values('$name','$email','$pass','$gen',$mobile,'$dob','$role')";
        mysqli_query($conn, $qry);
        if(mysqli_affected_rows($conn)>0)
            $msg = "SignUp Successful !!!!!";
        else
            $msg = "SignUp Not Successful. Try Again !!!!!!";
        mysqli_close($conn);
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
                <form method="post">
                    <table style="width: 100%; margin: 10px">
                        <caption>
                            Add New User
                            <hr size="4" color="maroon" style="padding:0px; margin-top: 5px">
                        </caption>
                        <tr>
                            <td><label>Name</label></td>
                            <td><input class="form-input" type="text" name="txtname" value="" placeholder="Enter username"/></td>
                        </tr>
                        <tr>
                            <td><label>Email Id</label></td>
                            <td><input class="form-input" id="e1" type="email" name="txtemail" value="" placeholder="Enter username"/></td>
                            
                        </tr>
                        <tr>
                            <td><label>Password</label></td>
                            <td><input class="form-input" type="password" name="txtpwd" value="" placeholder="Enter username"/></td>
                        <tr>
                        <tr>
                            <td><label>Confirm Password</label></td>
                            <td><input class="form-input" type="password" name="txtcpwd" value="" placeholder="Enter username"/></td>
                        </tr>
                        <tr>
                            <td><label style="margin-right: 30px">Gender</label> </td>
                            <td><label style="margin-right: 30px"><input type="radio" name="gender" value="Male"/> Male</label>
                            <label><input type="radio" name="gender" value="Female"/> Female</label></td>
                        <tr>
                        <tr>
                            <td><label>Mobile Number</label></td>
                            <td><input class="form-input" type="number" name="txtmobile" value="" placeholder="Enter username"/></td>
                        </tr>
                        <tr>
                            <td><label>Date of Birth</label></td>
                            <td><input class="form-input" type="date" name="txtdob" value="" placeholder="Enter username"/></td>
                        </tr>
                        <tr>
                            <td><label>User Type (Role)</label></td>
                            <td><select  class="form-input" name="role">
                                <option>Select Role</option>
                                <option>Admin</option>
                                <option>Client</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input class="btn" type="submit" name="btnreg" value="Register"/></td>
                        </tr>
                    
                </table>
                    <?php echo $msg; ?>
                    </form></div>
            </div>
        </main>
        <?php include './footer.php'; ?>
    </body>
</html>
