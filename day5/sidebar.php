<?php
include('header.php');
session_start();
if(empty($_SESSION)){
    header("Location: index.php");
}
?>
<body>
<div id="colorlib-page" class="dotted_background">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
        <div id="colorlib-logo"><a href="home.php"><img src="images/affnetz-logo.png" alt="affnetz" style="width:160px;height:50px;"></a> </div>
        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <?php
                    if(!empty($_SESSION)){
                        if($_SESSION['roles'] == 'admin'){
                            echo '<li class="colorlib-active"><a href="home.php">Home</a></li>
                            <li class="colorlib"><a href="admin.php">Admin Panel</a></li>
                            <li class="colorlib"><a href="logout.php">Logout</a></li>';  
                        }
                        else{
                            echo '<li class="colorlib-active"><a href="home.php">Home</a></li>
                            <li class="colorlib"><a href="family_info.php?id='. $_SESSION['id'].'">Family Detail</a></li>
                            <li class="colorlib"><a href="family.php">Add Family Detail</a></li>
                            <li class="colorlib"><a href="logout.php">Logout</a></li>'; 
                        }
                    } else {
                        echo '<li class="colorlib-active"><a href="index.php">Log-in</a></li>
                        <li><a href="register.php">Registration</a></li>';
                    }
                ?>
                
            </ul>
        </nav>

        <div class="colorlib-footer">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is
                made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                    target="_blank">Colorlib</a>
            <ul>
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-instagram"></i></a></li>
                <li><a href="#"><i class="icon-linkedin"></i></a></li>
            </ul>
        </div>
    </aside> <!-- END COLORLIB-ASIDE -->
    <div id="colorlib-main">