<?php

require_once 'dbConnection.php';

?>

<html lang="en">

<head>
    <title>Admin for Kate's Portfolio Page</title>
    <link rel='stylesheet' type='text/css' href='../css/normalize.css'/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../css/cms_styles.css'/>
</head>
<body>

    <h1>Content Managing Kate's Portfolio Page</h1>
    <section>
        <h2>About Me</h2>
        <form method="post">
            <label for="addAboutMe">Add new information or additional paragraphs here:</label>
            <input type="text" name="addAboutMe">
            <input type="submit">
        </form>
        <form method="post">
            <label for="editAboutMe">Edit text:</label>
            <select type=""
        </form>
    </section>
</body>
</html>
