<?php

if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
 }
//login_session is the name of the user, and the user was set as a session variable - $_SESSION['login_user']  -  in the login page. 
//We must declare this varable - $login_session  - on every php page in order to access it
$login_session = $_SESSION['login_user'];
echo "Welcome $login_session";