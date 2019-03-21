<?php

session_start();

if (isset($_SESSION['loggedIn'])) {
    header('Location: login_page.php');
}

require_once 'php/dbConnection.php';
require_once 'php/functions.php';

$db = getDbConnection();

if (isset($_POST['addAboutMeText'])) {
    $addAboutMeText = $_POST['addAboutMeText'];
    $cleanAboutMeText = removeWhitespaceHTML($addAboutMeText);
    $checkAddMeText = checkTextExists($cleanAboutMeText);
    $newAboutMeText = addAboutMeText($db, $checkAddMeText, $cleanAboutMeText);
    $addAboutMeSuccess = aboutMeSuccess($newAboutMeText);
}

if(isset($_POST['selectAboutMeText'])) {
    $editId = $_POST['selectAboutMeText'];
    $aboutTextToEdit = getAboutTextToEdit($db, $editId);
    $displayAboutTextToEdit = displayAboutTextToEdit($aboutTextToEdit);
    $displaySubmitEditButton = displaySubmitEditButton();
}

if(isset($_POST['editAboutMeTextAndQuote'])) {
    $submitEditText = $_POST['editAboutMeTextAndQuote'];
    $cleanEditText = removeWhitespaceHTML($submitEditText);
    $checkEditText = checkTextExists($cleanEditText);
    $editId = $_POST['editId'];
    if ($checkEditText === false) {
        $updateAboutMeQuoteAndText = updateAboutMeQuoteAndText($db, $cleanEditText, $editId);
    }
    $editSuccessMessage = aboutMeSuccess($updateAboutMeQuoteAndText);
}

if(isset($_POST['deleteAboutMeText'])) {
    $deleteAboutMePara = $_POST['deleteAboutMeText'];
    $aboutMeTextDeleted = deleteAboutMeText($db, $deleteAboutMePara);
    $deleteSuccessMessage = deleteAboutMeSuccess($aboutMeTextDeleted);
}

$aboutMeTextAndQuote = getAboutMeTextAndQuote($db);
$displayAboutMeDropdown = aboutMeTextDropdown($aboutMeTextAndQuote);

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
        <form method="POST" action="cms_index.php" id="addAboutMeText">
            <label for="addAboutMeText"><h4>Add new information or additional paragraphs here:</h4></label>
            <textarea class="typeText" name="addAboutMeText" form="addAboutMeText"></textarea>
            <input type="submit" value="Add text">
        </form>
        <?php
        if (isset($addAboutMeSuccess)) {
            echo $addAboutMeSuccess;
        }
        ?>
        <form method="POST">
            <label for="selectAboutMeText"><h4>Edit text or quote:</h4></label>
            <select class="aboutMeDropdown" name="selectAboutMeText">
                <?php
                echo $displayAboutMeDropdown;
                ?>
            </select>
            <input type="submit" value="select text">
        </form>
        <form method="POST" action="" id="editAboutMeTextAndQuote">
                <textarea class="typeText" name="editAboutMeTextAndQuote" form="editAboutMeTextAndQuote"><?php
                if (isset($displayAboutTextToEdit)) {
                    echo $displayAboutTextToEdit;
                }?></textarea>
                    <?php
                    if (isset($editId)) {
                        echo '<input type="hidden" value=' . $editId . ' name="editId">';
                        }
                    if (isset($displaySubmitEditButton)) {
                        echo $displaySubmitEditButton;
                    }
                    if (isset($editSuccessMessage)) {
                        echo $editSuccessMessage;
                    }
                    ?></form>
        <form method="POST">
            <label for="deleteAboutMeText"><h4>Select about me text to delete:</h4></label>
            <select class="aboutMeDropdown" name="deleteAboutMeText">
                <?php
                echo $displayAboutMeDropdown;
                ?>
            </select>
            <input type="submit" value="Delete">
        </form>
        <?php
        if(isset($deleteSuccessMessage)) {
            echo $deleteSuccessMessage;
        }
        ?>
    </section>
    <footer>
        <ul>
            <li><h2><a href='index.php'>Home</h2></li></a>
        </ul>
</footer>
</body>
</html>
