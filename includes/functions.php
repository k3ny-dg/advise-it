<?php
//GENERATE RANDOM TOKEN

function generateToken() {
    $allowed_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $result_token = "";

    // loop six times
    for($i=0; $i <= 5; $i++) {

        // concatenate new value each time
        $result_token .= $allowed_chars[mt_rand(0, strlen($allowed_chars))];
    }
    // return the generated token
    return $result_token;
}

