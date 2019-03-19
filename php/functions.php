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
    $query = $db->prepare("SELECT `content` FROM `about_me` WHERE `deleted` = 0 LIMIT 1,50");
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
    $query = $db->prepare("SELECT `content` FROM `about_me` WHERE `deleted` = 0 LIMIT 1");
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
?>