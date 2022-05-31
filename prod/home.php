<?php
require_once('config.php');
require_once('updateAPI.php');
require_once('core/controller.Class.php');
?>
<!DOCTYPE HTML>
<html>
    
    <head>
        <link rel = "stylesheet" href= "style.css">
        <script src="started.js"></script>
        <script src="notStarted.js"></script>
        <script src="script.js"></script>
        <meta name="google-signin-client_id" content="547265347014-fva39q2c43k7lua7p6802srkcp6qia66.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/api.js?onload=onLibraryLoaded" async defer></script>
    </head> 

    <img src="img/logo.png" alt="logo" style="max-width: 80px; float: left; margin-top:0px; margin-bottom:0px; padding-left:30px; padding-right:30px" />
    <body onload="updateMatchList()">
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

        <script>
            function homeBet(matchid) {
                console.log("winbet has been called");
                var xhr;
                if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                    xhr = new XMLHttpRequest();
                }

                var data = "matchid=" + matchid + " profit=" + 1;
                xhr.open("POST", "ProfileHelper.php", true); 
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
	            xhr.onreadystatechange = console.log("bet on home");
                xhr.send(data);
            }
            function awayBet(matchid) {
                console.log("winbet has been called");
                var xhr;
                if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                    xhr = new XMLHttpRequest();
                }

                var data = "matchid=" + `${fixtureObj.fixture.id}` + " profit=" + 1;
                xhr.open("POST", "ProfileHelper.php", true); 
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
	            xhr.onreadystatechange = console.log("bet on away");
                xhr.send(data);
            }
        </script>
        
        <div class="flexParent">
            <ul id="displayMatch"; class="menu-nav displayList"></ul>
            <div id="detailDisplayMatch"></div>
        </div>
        
    </body>
</html>
