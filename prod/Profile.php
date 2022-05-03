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
            function winBet() {
                console.log("winbet has been called");
                var xhr;
                if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                    xhr = new XMLHttpRequest();
                }

                var data = "profit=" + 1;
                xhr.open("POST", "ProfileHelper.php", true); 
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
	            xhr.onreadystatechange = display_data;
                xhr.send(data);

                function display_data() {
                    console.log("displaydata gets called");
	                if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            //alert(xhr.responseText);	   
	                        document.getElementById("userProfileData").innerHTML = xhr.responseText;
                        } else {
                            alert('There was a problem with the request.');
                        }
                    }
	            }
            }
            function loseBet() {
                console.log("winbet has been called");
                var xhr;
                if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                    xhr = new XMLHttpRequest();
                }

                var data = "profit=-1";
                xhr.open("POST", "ProfileHelper.php", true); 
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
	            xhr.onreadystatechange = display_data;
                xhr.send(data);

                function display_data() {
                    console.log("displaydata gets called");
	                if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            //alert(xhr.responseText);	   
	                        document.getElementById("userProfileData").innerHTML = xhr.responseText;
                        } else {
                            alert('There was a problem with the request.');
                        }
                    }
	            }
            }
        </script>
        <button class="gLoginButton" id="addMoolah" onclick="winBet()" type="button">add 1 betbux</button>
        <button class="genericButton" id="subtractMoolah" onclick="loseBet()" type="button">lose 1 betbux</button>
        
    </header>
    
    
</html>
