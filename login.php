<?php
//SESSION START
if(!isset($_SESSION))
{
    session_start();
}

// Function Connection
include_once("connection/function.php");
$cons = connection();


// SQL Database for login management_system
if(isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

$sql = "SELECT * FROM management_system_user WHERE username = '$username' AND 
        password = '$password'";
$user = $cons->query($sql) or die ($cons->connect_error);
$row = $user->fetch_assoc();
$total = $user->num_rows;

if($total > 0)
{
    $_SESSION['UserLogin'] = $row['username'];
    $_SESSION['Access'] = $row['access'];
    echo header("Location: index.php");
} else {
    echo "Sorry! No User Found!";
}
}
?>

<!-- LOGIN MANAGEMENT SYSTEM -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management System</title>

            <!-- css style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login/login.css">


</head>
<body>
    <h1>Management System</h1><br><br>

    <form action="" method = "post">

        <label>Username</label>
        <input type = "text" name = "username" id = "username">

        <label>Password</label>
        <input type = "password" name = "password" id = "password">

        <button type = "submit" name = "submit">Login</button>

    </form>




</body>
</html>