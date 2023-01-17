<?php
//GENERATE RANDOM TOKEN

function generateToken() {
    $allowed_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $result_token = "";

    // loop six times
    for($i=0; $i < 6; $i++) {

        // concatenate new value each time
        $result_token .= $allowed_chars[mt_rand(0, strlen($allowed_chars))];
    }
    // return the generated token
    return $result_token;
}

//            //if the button is pushed
//            if(array_key_exists('create', $_GET)) {
//                // generate a token
//                do {
//                    $token = generateToken();
//                    //check to see if token already exists in database.
//                    //if so, try again
//                } while (mysql_num_rows(mysql_query('SELECT * FROM student_plan WHERE token = $token')) != 0);
//
//                $unique_id = $token;
//            }
