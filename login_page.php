<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in to Kate's Portfolio CMS</title>
    <link rel='stylesheet' type='text/css' href='css/normalize.css'/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='css/cms_styles.css'/>
</head>
<body>
<h1>Log in to Manage Content for Kate's Portfolio Page</h1>
    <form method="POST" action="php/login_verification.php">
        <label for="username"><h4>Username:</h4></label>
        <input type = "text" class="typeText" name="username">
        <label for="password"><h4>Password:</h4></label>
        <input type = "text" class="typeText" name="password">
        <input type="submit" value="Submit">
    </form>
<footer>
    <ul>
        <li><h2><a href='index.php'>Home</h2></li>
    </ul>
</footer>
</body>
</html>
