<?php
require_once 'php/dbConnection.php';
require_once 'php/functions.php';

$db = getdbConnection();

if (isset($_POST['addAboutMeText'])) {
    $addAboutMeText = $_POST['addAboutMeText'];
    $cleanAboutMeText = cleanAboutMeText($addAboutMeText);
    $checkAddMeText = checkAddMeText($cleanAboutMeText);
    $newAboutMeText = addAboutMeText($db, $checkAddMeText, $cleanAboutMeText);
    $addAboutMeSuccess = addAboutMeSuccess($newAboutMeText);
}

$aboutMeTextAndQuote = getAboutMeTextAndQuote($db);
$displayEditAboutMeDropdown = editAboutMeTextAndQuote($aboutMeTextAndQuote);

if(isset($_POST['selectAboutMeText'])) {
    $editId = $_POST['selectAboutMeText'];
    $aboutTextToEdit = getAboutTextToEdit($db, $editId);
    $displayAboutTextToEdit = displayAboutTextToEdit($aboutTextToEdit);
    $displaySubmitEditButton = displaySubmitEditButton();
}

if(isset($_POST['editAboutMeTextAndQuote'])) {
    $submitEditText = $_POST['editAboutMeTextAndQuote'];
    $editId = $_POST['editId'];
    $updateAboutMeQuoteAndText = updateAboutMeQuoteAndText($db, $submitEditText, $editId);
    $editAboutMeSuccess = editAboutMeSuccess($updateAboutMeQuoteAndText);
    header('Location: cms_index.php');
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
    <?php
    echo $addAboutMeSuccess;
    ?>
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
<?php echo $displayAboutTextToEdit;?>
            </textarea>
                <?php
                if (isset($editId)) {
                    echo '<input type="hidden" value=' . $editId . ' name="editId">';
                    }
                echo $displaySubmitEditButton;
                ?>
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
