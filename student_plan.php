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
        <link rel="stylesheet" href="resources/styles.css">
    </head>
    <body class="container center">
        <div class="row">
            <div class="col-12">
                <h1>Course Planning</h1>
            </div>
        </div>

        <!-- Display Student's identifying token -->
        <div>
            <h3>Student Token: <?php echo $token ?> </h3>
        </div>

        <!-- Text areas to enter course numbers and notes -->
        <form action="../confirm.php" method="post">
        <!-- First two quarters -->
            <div class="row">
                <!-- Quarter 1 -->
                <div class="col-6 center-text">
                    <h3>Fall Quarter</h3>
                    <textarea id="q1" name="q1" rows="4"></textarea>
                </div>

                <!-- Quarter 2 -->
                <div class="col-6">
                    <h3>Winter Quarter</h3>
                    <textarea id="q2" name="q2" rows="4"></textarea>
                </div>
            </div>

        <!-- Last two quarters -->
            <div class="row">
                <div class="col-6">
                    <h3>Spring Quarter</h3>
                    <textarea id="q3" name="q3" rows="4"></textarea>
                </div>
                <div class="col-6">
                    <h3>Summer Quarter</h3>
                    <textarea id="q4" name="q4" rows="4"></textarea>
                </div>
            </div>

            <!--SAVE BUTTON -->
            <div class="row">
                <div class="col-12">
                    <!-- Pass token to be submitted with data -->
                    <?php echo '<input type="hidden" name="token" value="'.$token.'">' ?>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </body>
</html>