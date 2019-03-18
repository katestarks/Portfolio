<?php

require_once "dbConnection.php";

function getAboutMeText($db) {
    $query = $db->prepare("SELECT `content` FROM `about_me`");
    $query->execute();
    return $query->fetchAll();
}

function displayAboutMeText($aboutMeTexts) {
    $result="";
    foreach ($aboutMeTexts as $aboutMeText) {
        $result .= "<p>" . $aboutMeText['content'] . "</p>";
    }
    return $result;
}

?>