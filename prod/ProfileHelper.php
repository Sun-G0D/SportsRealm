<?php
    require_once('config.php');
    require_once('core/controller.Class.php');

    $Controller = new Controller;

    $profit = $_POST['profit'];
    $Controller -> changeMoney(intval($profit), $_COOKIE['id'], $_COOKIE['sess']);
    if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
        echo $Controller -> printData(intval($_COOKIE['id']), $_COOKIE['sess']);
    }
?>