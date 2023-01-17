<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "includes/connect.php";

/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";
*/

// move form data into variables
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


$back = "student_plan.php/".$token;

echo '<form action="'.$back.'" method="post">
        <input type="hidden" name="token" value="'.$token.'"> 
        <button type="submit" class="btn btn-large"> Saved!</button>
      </form>';

/*
if ($success){
    echo '<h3>"Saved!"</h3>';

        // redirect to student plan
        //header("location: student_plan.php");
} else {
    echo '<p>Could not be saved</p>';
}
/*


