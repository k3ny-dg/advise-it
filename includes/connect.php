<?php

// Connect to database
$username = "kduttong_grcuser";
$password = "q3LH2NKVAu23Hg";
$hostname = "localhost";
$database = "kduttong_grc";

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("Oops! We weren't able to connect to the database");
