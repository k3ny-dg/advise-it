<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("includes/connect.php");
include("includes/functions.php");
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
                <h1 class="center-text">Advise It Homepage</h1>
            </div>

            <?php
            $unique_id = generateToken();

            //append it to the end of the url
            $unique_url = "student_plan.php/".$unique_id;
            ?>

            <div class="col-12">
                <?php echo '<form action="'.$unique_url.'"method="post">
                    <input type="hidden" name="token" value="'.$unique_id.'">
                    <button type="submit" id="create" class="btn btn-primary center">Create New</button>
                </form>'
                ?>
            </div>

        </div>
    </body>
</html>