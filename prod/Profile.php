<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>
<!DOCTYPE HTML>
<html>
    <header>
        <link rel = "stylesheet" href= "style.css">
        

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
            <header id="userProfileData">
                <?php
                    $Controller = new Controller;
                    if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
                        echo $Controller -> printData(intval($_COOKIE['id']), $_COOKIE['sess']);
                    }
                ?>
            </header>
        </article>
        <script>
            function addMoney() {
                console.log("ff");
                <?php 
                    $Controller = new Controller;
                    $Controller -> changeMoney(intval(100), $_COOKIE['id'], $_COOKIE['sess']);
                ?>
                document.getElementById("userProfileData").innerHTML = `<?php
                    $Controller = new Controller;
                    if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
                        echo $Controller -> printData(intval($_COOKIE['id']), $_COOKIE['sess']);
                    }
                ?>`;
            }

            function subtractMoney() {
                console.log("sdfsfdsf");
                <?php 
                    $Controller = new Controller;
                    $Controller -> changeMoney(-intval(1), $_COOKIE['id'], $_COOKIE['sess']);
                ?>
                document.getElementById("userProfileData").innerHTML = `<?php
                    $Controller = new Controller;
                    if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
                        echo $Controller -> printData(intval($_COOKIE['id']), $_COOKIE['sess']);
                    }
                ?>`;
            }
        </script>
        <button class="gLoginButton" id="addMoolah" type="button">add 1 betbux</button>
        <script>document.getElementById("addMoolah").onclick = addMoney;</script>
        <button class="genericButton" id="subtractMoolah" type="button">lose 1 betbux</button>
        <script>document.getElementById("subtractMoolah").onclick = subtractMoney;</script>
    </header>
    
    
</html>
