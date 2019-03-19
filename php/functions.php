<?php

require_once "dbConnection.php";


/**
 * Retrieves content from the database excluding line 1
 *
 * @param PDO $db database of about me text
 *
 * returns an array of content field excluding the first line of the database
 */
function getAboutMeText(PDO $db) : array {
    $query = $db->prepare("SELECT `id`,`content` FROM `about_me` WHERE `deleted` = 0 LIMIT 1,50");
    $query->execute();
    return $query->fetchAll();
}

/**
 * Displays data held in the array fetched from the database which excludes line 1
 *
 * @param array $aboutMeTexts result of function to get the about me text (excl line 1) assigned to a variable
 *
 * returns string of the array items concatenated with html
 */
function displayAboutMeText(array $aboutMeTexts) : string {
    $result = "";
    foreach ($aboutMeTexts as $aboutMeText) {
        if(array_key_exists('content', $aboutMeText)){
            $result .= "<p>" . $aboutMeText['content'] . "</p>";
        } else {
            $result .= "";
        }
    }
    return $result;
}

/**
 * Retrieves content from the database limited to line one
 *
 * @param PDO $db database of about me text
 *
 * returns an array of content field limited to the first line of the database
 */
function getAboutMeQuote(PDO $db) : array {
    $query = $db->prepare("SELECT `id`,`content` FROM `about_me` WHERE `deleted` = 0 LIMIT 1");
    $query->execute();
    return $query->fetchAll();
}

/**
 * Displays data held in the array fetched from the database limited to line 1
 *
 * @param array $aboutMeTexts result of function to get the about me text (limited to line 1) assigned to a variable
 *
 * returns string of the array items concatenated with html
 */
function displayAboutMeQuote(array $aboutMeQuotes) : string {
    $result="";
    foreach ($aboutMeQuotes as $aboutMeQuote) {
        if(array_key_exists('content', $aboutMeQuote)) {
            $result .= "<p class='contentEmphasisLine'>" . $aboutMeQuote['content'] . "<span class='contentQuote'>\"</span></p>";
         } else {
            $result .="";
        }
    }
    return $result;
}

/**
 * Adds data to content field when input into CMS form
 *
 * @param PDO $db database kate_portfolio
 * @param string $addAboutMeText values posted from the form
 *
 * @return array of text input into the form on CMS
 */
function addAboutMeText(PDO $db, string $addAboutMeText) : array {
    $query = $db->prepare("INSERT INTO `about_me`(`content`) VALUES (:addAboutMeText);");
    $query->bindParam(':addAboutMeText', $addAboutMeText);
    $query->execute();
    return $query->fetchAll();
}

/**
 * Returns an array from the database of all lines of text
 *
 * @param PDO $db database connection
 *
 * @return array of id and content for all lines of the database
 */
function getAboutMeTextAndQuote (PDO $db) : array {
    $query = $db->prepare("SELECT `id`,`content` FROM `about_me` WHERE `deleted` = 0");
    $query->execute();
    return $query->fetchAll();
}

/**
 * Takes content from the database, shortens the length and inserts into a string of html
 *
 * @param array $aboutMeTextAndQuotes from database fetch
 *
 * @return string of options for the edit text dropdown
 */
function editAboutMeTextAndQuote (array $aboutMeTextAndQuotes) : string {
    $dropdown = "";
    foreach ($aboutMeTextAndQuotes as $aboutMeTextAndQuote) {
        $shortAboutMe = substr($aboutMeTextAndQuote['content'], 0, 50);
        $dropdown .= '<option value='. $aboutMeTextAndQuote['id'] . '>' . $shortAboutMe . '</option>';
    }
    return $dropdown;
}


/**
 * Fetches content from the database to display in the edit box
 *
 * @param PDO $db connection to database
 * @param string $aboutMeDropDownValue variable assigned from post data in form dropdown
 *
 * @return array of one content value from the database
 */
function getAboutTextToEdit(PDO $db, string $aboutMeDropDownValue) : array {
    $query = $db->prepare("SELECT `content` FROM `about_me` WHERE `id` = '$aboutMeDropDownValue';");
    $query->execute();
    return $query->fetchAll();
}

/**
 * displays the content value fetched from the database inside the edit box
 *
 * @param array $aboutTextToEdit content value fetched from the database
 *
 * @return string of content from the array
 */
//function displayAboutTextToEdit(array $aboutTextToEdit) : string {
//    return $aboutTextToEdit[0]["content"];
//}

function displayAboutTextToEdit(array $aboutTextToEdits) : string {
    $result="";
    foreach ($aboutTextToEdits as $aboutTextToEdit) {
        if(array_key_exists('content', $aboutTextToEdit)) {
            $result .= $aboutTextToEdit['content'];
        } else {
            $result .="";
        }
    }
    return $result;
}
?>