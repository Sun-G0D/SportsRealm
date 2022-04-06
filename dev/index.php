<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to my app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px;">
        <?php if(isset($_COOKIE['id']) && isset($_COOKIE['sess'])){
            $Controller = new Controller;
            if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
                echo $Controller -> printData(intval($_COOKIE['id']), $_COOKIE['sess']);
                echo '<a href="logout.php">Log Out</a>';
            }
            
        }else{ ?>
        <img src="img/logo.png" alt="logo" style="max-width: 150px; margin: 0 auto; display: table;" />
        <form action='' method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="just placeholder dummy form, only working signin is through google">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="just placeholder dummy form, only working signin is through google">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <button onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="btn btn-danger">Login with Google</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>