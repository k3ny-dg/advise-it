<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// if the admin is not logged in
if(empty($_SESSION['username'])) {

    // Store the current page in the session
    $_SESSION['page'] = "admin.php";

    // Redirect user to the home page
    header('location: login.php');

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="resources/styles.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    </head>

    <body id="admin-page">

    <div class="jumbotron">
        <h1 class="display-4 text-center">Admin Page</h1>
    </div>

    <?php
    include('includes/connect.php');

    $sql = "SELECT token, advisor, created_date
    FROM student_plan";

    $result = @mysqli_query($cnxn, $sql);
    //var_dump($result);

    echo "<table id='users' class='display'>
            <thead>
                <tr>
                    <th>Token</th>
                    <th>Advisor</th>
                    <th>Creation Date</th>
                </tr>
            </thead>
          <tbody>";

    foreach ($result as $row){

        $token = $row['token'];
        $advisor = $row['advisor'];
        $createdDate = $row['created_date'];

        echo "<tr>
                <td>$token</td>
                <td>$advisor</td>
                <td>$createdDate</td>
              </tr>";
    }

    echo "</tbody></table>"

    ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#users').DataTable();
        } );
    </script>
    </body>