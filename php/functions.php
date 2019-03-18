<?php

require_once "dbConnection.php";

function getAboutMeText($db) {
    $query = $db->prepare("SELECT `content` FROM `about_me` LIMIT 1,50");
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

function getAboutMeQuote($db) {
    $query = $db->prepare("SELECT `content` FROM `about_me` LIMIT 1");
    $query->execute();
    return $query->fetchAll();
}

function displayAboutMeQuote($aboutMeQuotes) {
    $result="";
    foreach ($aboutMeQuotes as $aboutMeQuote) {
        $result .= "<p class='contentEmphasisLine'>" . $aboutMeQuote['content'] . "<span class='contentQuote'>\"</span></p>";
    }
    return $result;
}

?>