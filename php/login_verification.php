<?php

session_start();

require_once 'functions.php';
require_once 'dbConnection.php';

$db = getDbConnection();
$logInCredentials = fetchCredentials($db);
$dbUsername = $logInCredentials['username'];
$dbPassword = $logInCredentials['password'];
$isPasswordCorrect = password_verify($_POST['password'], $dbPassword);

var_dump($logInCredentials);
var_dump($dbUsername);
var_dump($_POST['username']);
var_dump($dbPassword);
var_dump($isPasswordCorrect);

if ($_POST['username'] === $dbUsername && $isPasswordCorrect === true) {
    $_SESSION['loggedIn'] = true;
    header('Location: ../cms_index.php');
} else {
    $_SESSION['loggedIn'] = false;
    header('Location: ../login_page.php');
}
?>
