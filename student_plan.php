<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("includes/connect.php");

$token = $_POST['token'];
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
        <form action="../confirm.php" method="post">

        <!-- FIRST TWO QUARTERS -->
            <div class="row">
                <!-- QUARTER 1 -->
                <div class="col-6 center-text">
                    <h3>Fall Quarter</h3>
                    <textarea id="q1" name="q1" rows="4"></textarea>
                </div>

                <!-- QUARTER 2 -->
                <div class="col-6">
                    <h3>Winter Quarter</h3>
                    <textarea id="q2" name="q2" rows="4"></textarea>
                </div>
            </div>

        <!-- LAST 2 QUARTERS -->
            <div class="row">
                <!-- QUARTER 3 -->
                <div class="col-6">
                    <h3>Spring Quarter</h3>
                    <textarea id="q3" name="q3" rows="4"></textarea>
                </div>

                <!-- QUARTER 4 -->
                <div class="col-6">
                    <h3>Summer Quarter</h3>
                    <textarea id="q4" name="q4" rows="4"></textarea>
                </div>
            </div>

            <!--SAVE BUTTON -->
            <div class="row center">
                <div class="col-12">
                    <!-- Pass token to be submitted with data -->
                    <?php echo '<input type="hidden" name="token" value="'.$token.'">' ?>
                    <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
                </div>
            </div>
        </form>
    </body>
</html>