<?php
// 328/pdo/config.php

// define constants
define("DB_DSN","mysql:dbname=kduttong_grc");
define("DB_USERNAME","kduttong_grcuser");
define("DB_PASSWORD","q3LH2NKVAu23Hg");

try{
    // connect to DB
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

}
catch (PDOException $e) {
    echo $e->getMessage();
}