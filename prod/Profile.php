<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>
<!DOCTYPE HTML>
<html>
    <header>
        <link rel = "stylesheet" href= "style.css">
        <script src="script.js"></script>
        <img src="img/logo.png" alt="logo" style="max-width: 80px; float: left; margin-top:0px; margin-bottom:0px; padding-left:30px; padding-right:30px" />
        <ul class ="main-nav o-flexy">
            <li class = "menu-nav-item"> 
                <a href = "home.php" >
                    <span>
                        Home
                    </span>
                </a>
            </li>
            <li class = "menu-nav-item">
                <a href = "Profile.php" >
                    <span>
                        Profile
                    </span>
                </a>
            </li>
            <li class = "menu-nav-item">
                <a href = "Shop.php" >
                    <span>
                        Shop
                    </span>
                </a>
            </li>
            <li class = "menu-nav-item">
                <a href="logout.php">Log Out</a>
            </li>
        </ul> 

        <article>
            <header>
                <?php
                    $Controller = new Controller;
                    if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
                        echo $Controller -> printData(intval($_COOKIE['id']), $_COOKIE['sess']);
                    }
                ?>
            </header>
        </article>

    </header>
    
    
</html>
