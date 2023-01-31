<?php
ini_set('display_errors', 1);
//error_reporting(E_ALL);
include("includes/connect.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/../config.php');

$uri = $_SERVER['REQUEST_URI'];
$token= substr($uri, -6);
$creation = date("Y-m-d h:m:s");

// MOVE FORM DATA INTO VARIABLES
$q1 = "";
$q2 = "";
$q3 = "";
$q4 = "";
$timestamp = "";
$advisor = "";
$created_date = "";

$query = "SELECT * FROM student_plan WHERE token = '$token'";
$result = mysqli_query($cnxn, $query);



if(mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO student_plan (`token`, `created_date`)
            VALUES ('$token', '$creation')";
    $success = mysqli_query($cnxn, $sql);
    $statement = $dbh->prepare($sql);
    $statement->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Student Plan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../resources/styles.css">
    </head>
    <body id="student_body" class="container-fluid center">
        <div id="print-holder">
            <button id="print-btn" class="btn-secondary" type="button" onclick="window.print();return false;">Print   🖨️</button>
        </div>
        <div class="row">
            <div class="col-12 jumbotron center-text">
                <h1>Course Planning</h1>
            </div>
        </div>

        <!-- DISPLAY STUDENT'S IDENTIFYING TOKEN -->
        <div class="center-text col-12">
            <h3 id="show-token">Student Token: <?php echo $token ?> </h3>
        </div>

        <!-- TEXT AREAS TO ENTER COURSE NUMBERS AND NOTES -->
        <form action="" method="post" id="save">
            <?php

                $query = "SELECT * FROM student_plan WHERE token = '$token'";
                $result = mysqli_query($cnxn, $query);

                if(mysqli_num_rows($result) > 0)
                {
                    foreach ($result as $row)
                    {
                        $fall = $row['fall'];
                        $winter = $row['winter'];
                        $spring = $row['spring'];
                        $summer = $row['summer'];
                        $advisor = $row['advisor'];
            ?>

            <!-- FIRST TWO QUARTERS -->
                <div class="row">
                    <!-- QUARTER 1 -->
                    <div class="col-6 center-text">
                        <h3>Fall Quarter</h3>
                        <textarea id="q1" class="q-txtbx" name="q1" rows="4"><?php echo $fall; ?></textarea>
                    </div>

                    <!-- QUARTER 2 -->
                    <div class="col-6 center-text">
                        <h3>Winter Quarter</h3>
                        <textarea id="q2" class="q-txtbx" name="q2" rows="4"><?php echo $winter; ?></textarea>
                    </div>
                </div>

            <!-- LAST 2 QUARTERS -->
                <div class="row">
                    <!-- QUARTER 3 -->
                    <div class="col-6 center-text">
                        <h3>Spring Quarter</h3>
                        <textarea id="q3" class="q-txtbx" name="q3" rows="4"><?php echo $spring; ?></textarea>
                    </div>

                    <!-- QUARTER 4 -->
                    <div class="col-6 center-text">
                        <h3>Summer Quarter</h3>
                        <textarea id="q4" class="q-txtbx" name="q4" rows="4"><?php echo $summer; ?></textarea>
                    </div>
                </div>

                <!-- ADVISOR -->
                <div class="row">
                    <div class="col-12 center-text">
                        <label for="advisor">Advisor</label>
                        <br>
                        <input type="text" id="advisor" class="q-txtbx" name="advisor" value="<?php echo $advisor; ?>">
                      </div>
                </div>

                <?php
                    }
                }

            // INSERT NEW SCHEDULE

            $sql = "INSERT INTO student_plan (`token`,`fall`, `winter`, `spring`, `summer`, `advisor`)
            VALUES ('$token', '$q1', '$q2', '$q3', '$q4', '$advisor')";
            $success = mysqli_query($cnxn, $sql);
            $statement = $dbh->prepare($sql);

            // MOVE FORM DATA INTO VARIABLES
            $q1 = $_POST['q1'];
            $q2 = $_POST['q2'];
            $q3 = $_POST['q3'];
            $q4 = $_POST['q4'];
            $advisor = $_POST['advisor'];

            $statement->bindParam('token', $token, PDO::PARAM_STR);
            $statement->bindParam('q1', $q1, PDO::PARAM_STR);
            $statement->bindParam('q2', $q2, PDO::PARAM_STR);
            $statement->bindParam('q3',$q3, PDO::PARAM_STR);
            $statement->bindParam('q4', $q4, PDO::PARAM_STR);
            $statement->bindParam('advisor', $advisor, PDO::PARAM_STR);

            $t_update = date("Y-m-d h:m:s");

            $update = "UPDATE student_plan
            SET fall='$q1', winter='$q2', spring='$q3', summer='$q4', timestamp='$t_update', advisor='$advisor'
            WHERE token='$token'";

            $update_statement = $dbh->prepare($update);
            $update_statement->execute();

            if(mysqli_num_rows($result) > 0)
            {
                foreach ($result as $row) {

                    $save_time = $row['timestamp'];
                    echo '<p id="timestamp" class="updated center-text"> Last updated: '.$save_time.'</p>';
                }
           }
            ?>

            <!--SAVE BUTTON -->
            <div class="row center-text">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
                </div>

            </div>
        </form>
        <script src="../resources/scripts.js"></script>
    </body>
</html>