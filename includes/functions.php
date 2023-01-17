<?php

/**
 * Generates a unique random token of 6 characters
 * @return string token
 */
function generateToken() {
    $allowed_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $result_token = "";

    for($i=0; $i <= 5; $i++) {

        // concatenate new random char each time
        $result_token .= $allowed_chars[mt_rand(0, strlen($allowed_chars))];
    }
        return $result_token;

    // Check DB to ensure that token is unique
    $result = mysqli_query("SELECT id FROM student_plan WHERE token = '$result_token'");

    if($result->num_rows == 0) {
        return $result_token;
    } else {
        // loop six times
        for($i=0; $i <= 5; $i++) {

            // concatenate new random char each time
            $result_token .= $allowed_chars[mt_rand(0, strlen($allowed_chars))];
        }
    }

}
