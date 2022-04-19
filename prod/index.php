<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to my app</title>
</head>
<body>
    <div class="container" style="margin-top: 100px;">
        <?php if(isset($_COOKIE['id']) && isset($_COOKIE['sess'])){
            $Controller = new Controller;
            if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
                echo '<script> window.location.replace("http://sportsrealm.great-site.net/controller.php"); </script>';

            }
            
        }else{ ?>
        <img src="img/logo.png" alt="logo" style="max-width: 150px; margin: 0 auto; display: table;" />
        <form class="loginForm" action='' method="POST">
            <button class="gLoginButton" onclick="window.location = '<?php echo $login_url; ?>'" type="button">Login with Google</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>