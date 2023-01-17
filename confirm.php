<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "includes/connect.php";

// TEST TO ENSURE THE DATA IS POSTING TO THIS PAGE
/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";
*/

// MOVE FORM DATA INTO VARIABLES
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$token = $_POST['token'];

/*
echo "<p>Q1: $q1</p>";
echo "<p>Q2: $q2</p>";
echo "<p>Q3: $q3</p>";
echo "<p>Q4: $q4</p>";
echo "<p>TOKEN: $token</p>";
*/

// INSERT NEW SCHEDULE
$sql = "INSERT INTO student_plan (`token`,`fall`, `winter`, `spring`, `summer`)
VALUES ('$token', '$q1', '$q2', '$q3', '$q4')";
$success = mysqli_query($cnxn, $sql);

// GO BACK TO THE PREVIOUS PAGE
$back = "student_plan.php/".$token;

echo '<form action="'.$back.'" method="post">
        <input type="hidden" name="token" value="'.$token.'"> 
        <button type="submit" class="btn btn-large"> Saved!</button>
      </form>';

// GENERATE VISIBLE TIMESTAMP
$t = time();
echo("Last updated: " . date("Y-m-d h:m:s", $t));


// TESTING IF-STATEMENT TO CHECK IF DATABASE IS RECEIVING DATA
/*
if ($success){
    echo '<h3>"Saved!"</h3>';

        // redirect to student plan
        //header("location: student_plan.php");
} else {
    echo '<p>Could not be saved</p>';
}
/*


