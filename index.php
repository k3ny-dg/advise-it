<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("includes/connect.php");
include("includes/functions.php");

// PAGE AUTO-REFRESH SOLUTION FROM USER TOBIAS_K ON STACK OVERFLOW:
// https://stackoverflow.com/a/24942000

// any valid date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// always modified right now
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// HTTP/1.1
header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
// HTTP/1.0
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="resources/styles.css">
    </head>
    <body class="container-fluid center">
        <div class="row">
            <div class="col-12 center">
                <h1 class="center-text jumbotron" id="home_head">Advise It Homepage</h1>
            </div>

            <?php
            $unique_id = generateToken();

            // APPEND IT TO THE END OF THE URL
            $unique_url = "student_plan.php/".$unique_id;
            ?>

            <!-- CREATE NEW TOKEN AND GO TO THE NEWLY CREATED STUDENT PLAN -->
            <div class="col-12 center-text">
                <?php echo '<form action="'.$unique_url.'"method="post">
                    <input type="hidden" name="token" value="'.$unique_id.'">
                    <button type="submit" id="create" class="btn btn-primary center">Create New</button>
                </form>'
                ?>
            </div>

        </div>
            <div id="admin-access">
                <form action="admin.php">
                    <button id="admin-btn" class="btn-secondary" type="submit">Admin Access</button>
                </form>
            </div>
    </body>
</html>