<?php
/**
 *  Advise-it/login.php
 *  Author: Keny Dutton-Gillespie
 *  Date: January 29, 2023
 *  Creates a login in page that stores usernames and passwords that
 *  are stored on the server using a session
 */

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// Initialize variables
$un = "";
$validLogin = true;

// If the user is already logged in
if (isset($_SESSION['username'])) {

    // redirect to home page
    header("location: admin.php");
}

if (!empty($_POST)) {

    // Get the form data
    $un = $_POST['username'];
    $pw = $_POST['password'];

    // Require the credentials file, which defines a $logins array
    require('includes/creds.php');

    // if the username is in the array and the passwords match
    if (array($un, $logins) && $pw == $logins[$un]) {

        // Record the username in the session array
        $_SESSION['username'] = $un;

        // GO to the page that the user came from, or else the home page
        $page = isset($_SESSION['page']) ? $_SESSION['page'] : 'admin.php';
        header('location: '.$page);
        echo "success!";
    }

    // Invalid login -- set flag variable
    $validLogin = false;
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
</head>

<body>
<div class="container align-content-center">

    <div class = "col-12">
        <h1 class="my-3 text-center">Login Page</h1>

        <form action="#" method="post">
            <div class="form-group text-center align-content-center">
                <label for="username" class = "mt-3">Username</label>
                <input type="text" class="form-control text-center my-2" id="username" name="username" placeholder="username" value="<?php echo $un; ?>">
            </div>
            <div class="form-group text-center">
                <label for="password">Password</label>
                <input type="password" class="form-control text-center my-2" id="password" name="password" placeholder="password">
            </div>
            <?php
            if(!$validLogin){
                echo'<p class="error">Login is incorrect</p>';
            }
            ?>
            <div class = "row justify-content-center">
                <button type="submit" class="btn btn-dark">Login</button>
            </div>
        </form>

    </div>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
