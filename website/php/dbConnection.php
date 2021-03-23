<?php

function getDbConnection() {
        $username = trim(getenv("DB_USERNAME"), '"');
        $password = trim(getenv("DB_PASSWORD"), '"');
        $db_host = trim(getenv("DB_HOST"), '"');
        $db_name = trim(getenv("DB_NAME"), '"');
    try {
        $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $username, $password);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
}