    <header>
        <div class="header-row1">
            <div class="column1">
                <ul>
                    <li><a  href="">About Us</a></li>
                    <li><a  href="">Privacy</a></li>
                    <li><a  href="">FAQ</a></li>
                    <li style="color:yellow; font-weight: bold"><?php
                        if(isset($_SESSION['uname'])){
                            echo "(Welcome $_SESSION[uname])";
                        }
                    ?></li>
                </ul>
            </div>
            <div class="column2"></div>
        </div>
        <div class="header-row2">
            <div class="column3">
                <h2 style="color: yellow; font-family: Georgia, 'Times New Roman', Times, serif">e-Shop</h2>
            </div>
            <div class="column4">
                <ul>
                    <li style="background-color: orange; padding: 10px;"><a href="index.php">Home</a></li>
                    <li><a href="television.php">Television</a></li>
                    <li><a href="mobile.php">Mobile</a></li>
                    
                    <?php
                        if(!isset($_SESSION['uname'])){
                            echo "<li><a href='signin.php'>Sign In</a></li>";
                        }
                    ?>
                    <li><a href='signup.php'>Sign Up</a></li>
                    <li><a href="cart.php">Cart <?php
                    if(isset($_COOKIE['cart'])){
                        $data = $_COOKIE['cart'];
                        $arr = explode(",",$data);
echo "<label style='width:30px;padding:5px; background-color:yellow; text-align:center; border-radius:10px'>".count($arr)."</label>";
                    }
                    ?></a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <?php
                        if(isset($_SESSION['role']))
                        {
                            if($_SESSION['role']=='Admin'){
                                echo "<li><a href='admin.php'>Admin</a></li>";
                            }
                        }
                    ?>
                    
                     <?php
                        if(isset($_SESSION['uname'])){
                            echo "<li><a href='logout.php'>Logout</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </header>