<?php
require_once "google-api/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("482125093811-r14p5f2osbph0aamb0fmrmen0m5fpfuu.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("Vicode Media Login");
$gClient->setRedirectUri("http://localhost/logingoogle/controller.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

// login URL
$login_url = $gClient->createAuthUrl();
?>