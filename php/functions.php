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
 * Removes white space from content
 * @param string $AboutMeText content from form add input
 *
 * @return string content from add input with white space removed at start and end
 */
function removeWhitespaceHTML(string $AboutMeText) :string {
    $removeWhitespace = trim($AboutMeText);
    return $newAboutMeText = htmlspecialchars($removeWhitespace);
}

/**
 * Checks whether there is content in the add input
 *
 * @param string $AboutMeText returned from the add form input
 *
 * @return bool returns boolean determining whether there is content
 */
function checkTextExists(string $AboutMeText) :bool {
    if ($AboutMeText == '') {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/**
 * Adds data to content field when input into CMS form
 *
 * @param PDO $db database kate_portfolio
 * @param bool returned from the function which checks whether there are characters in the string
 * @param string $addAboutMeText values posted from the form
 *
 * @return bool determined by whether the text has been successfully input into the form on CMS
 */
function addAboutMeText(PDO $db, bool $checkAddMeText, string $addAboutMeText) : bool {
    if ($checkAddMeText == false) {
        $query = $db->prepare("INSERT INTO `about_me`(`content`) VALUES (:addAboutMeText);");
        $query->bindParam(':addAboutMeText', $addAboutMeText);
        return $query->execute();
    } else {
        return false;
    }
}

/**
 * Displays a success message depending on whether the add me text has gone to database
 *
 * @param bool $newAboutMeText outcome of adding text to the database
 *
 * @return string display message to say whether the add text has been added to the database
 */
function aboutMeSuccess(bool $newAboutMeText) : string {
    if ($newAboutMeText === false) {
        return "<p>Please add content of up to 400 characters</p>";
    } else {
        return "<p>Your text has been added</p>";
    }
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
function aboutMeTextDropdown (array $aboutMeTextAndQuotes) : string {
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
    return $query->fetch();
}

/**
 * displays the content value fetched from the database inside the edit box
 *
 * @param array $aboutTextToEdits content value fetched from the database
 *
 * @return string of content from the array; otherwise returns an empty string
 */

function displayAboutTextToEdit(array $aboutTextToEdit) : string {
    $result="";
        if(array_key_exists('content', $aboutTextToEdit)) {
            $result .= $aboutTextToEdit['content'];
        } else {
            $result .="";
        }
    return $result;
}

/**
 * Update data base with edited content
 *
 * @param PDO $db database connection
 * @param bool returned from the function which checks whether there are characters in the string
 * @param string $submitEditText edited content from the form
 * @param string $editId database id saved in the session
 *
 * @return bool updates the database with edited content based on id
 */
function updateAboutMeQuoteAndText(PDO $db, bool $checkEditText, string $submitEditText, string $editId) :bool {
    if ($checkEditText === false) {
        $query = $db->prepare("UPDATE `about_me` SET `content` = :submitEditText WHERE `id` = :id;");
        $query->bindParam(':submitEditText', $submitEditText);
        $query->bindParam(':id', $editId);
        return $query->execute();
    } else {
        return false;
    }
}

/**
 * displays html button
 *
 * @return string html form input button
 */
function displaySubmitEditButton() :string {
    return '<input type="submit" value="Edit text">';
}


/**
 * Updates column in database to 'turn on' deleted with a 1
 *
 * @param PDO $db database connection
 * @param string $deleteAboutMePara variable with POST data from form assigned which is id of row from database

 * @return bool returns a boolean depending on whether the database has been successfully updated
 */
function deleteAboutMeText($db, $deleteAboutMePara) {
   $query = $db->prepare("UPDATE `about_me` SET `deleted` = 1 WHERE `id` = :deleteAboutMePara;");
   $query->bindParam(':deleteAboutMePara', $deleteAboutMePara);
   return $query->execute();
}
?>