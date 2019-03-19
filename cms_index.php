<?php
require_once 'php/dbConnection.php';
require_once 'php/functions.php';

session_start();


$db = getdbConnection();

if (isset($_POST['addAboutMeText'])) {
    $addAboutMeText = $_POST['addAboutMeText'];
    $newAboutMeText = addAboutMeText($db, $addAboutMeText);
}

$aboutMeTextAndQuote = getAboutMeTextAndQuote($db);
$displayEditAboutMeDropdown = editAboutMeTextAndQuote($aboutMeTextAndQuote);

if(isset($_POST['selectAboutMeText'])) {
    $aboutMeDropDownValue = $_POST['selectAboutMeText'];
    $aboutTextToEdit = getAboutTextToEdit($db, $aboutMeDropDownValue);
    $displayAboutTextToEdit = displayAboutTextToEdit($aboutTextToEdit);
    $_SESSION['id'] = $aboutMeDropDownValue;
}

if(isset($_POST['editAboutMeTextAndQuote'])) {
    $submitEditText = $_POST['editAboutMeTextAndQuote'];
    $updateAboutMeTextAndQuote = updateAboutMeTextAndQuote($db, $submitEditText, $_SESSION['id']);
    $editAboutMeSuccess = editAboutMeSuccess($updateAboutMeTextAndQuote);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin for Kate's Portfolio Page</title>
    <link rel='stylesheet' type='text/css' href='css/normalize.css'/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='css/cms_styles.css'/>
</head>
<body>
<h1>Content Managing Kate's Portfolio Page</h1>
<section class="aboutMe">
    <h2>About Me</h2>
    <form method="POST" action="" id="addAboutMeText">
        <label for="addAboutMeText"><h4>Add new information or additional paragraphs here:</h4></label>
        <textarea class="typeText" name="addAboutMeText" form="addAboutMeText"></textarea>
        <input type="submit" value="Add text">
    </form>
    <form method="post">
        <label for="selectAboutMeText"><h4>Edit text or quote:</h4></label>
        <select class="aboutMeDropdown" name="selectAboutMeText">
            <?php
            echo $displayEditAboutMeDropdown;
            ?>
        </select>
        <input type="submit" value="select text">
    </form>
    <form method="post" action="" id="editAboutMeTextAndQuote">
            <textarea class="typeText" name="editAboutMeTextAndQuote" form="editAboutMeTextAndQuote">
                <?php
                echo $displayAboutTextToEdit;
                ?>
            </textarea>
        <input type="submit" value="Edit text">
    </form>
    <?php
    echo $editAboutMeSuccess;
    ?>
    <form method="post">
        <label for="deleteAboutMeText"><h4>Select about me text to delete:</h4></label>
        <select class="aboutMeDropdown" name="deleteAboutMeText">

        </select>
        <input type="submit" value="Delete">
    </form>
</section>
<footer>
    <ul>
        <li><h2><a href='../index.php'</a>Home</h2></li>
    </ul>
</footer>
</body>
</html>
