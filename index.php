<?php
//SESSION START
if(!isset($_SESSION))
{
    session_start();
}

// Function Connection
include_once("connection/function.php");
$cons = connection();

 // SQL Database for index management_system
 $sql = "SELECT * FROM management_system ORDER By id DESC";
 $management = $cons->query($sql) or die($cons->connect_error);
 $row = $management->fetch_assoc();

 // Knowing if the User is Admin or Guest
 if(isset($_SESSION['UserLogin']))
 {
    echo "Welcome " . $_SESSION['UserLogin'];
 } else {
    echo "Welcome Guest";
 }

 // i change again the code for testing only
 // i change again the code for testing only
 // i change again the code for testing only
 // i change again the code for testing only
 // i change again the code for testing only
 echo 'DAN';


?>

<!-- INDEX MANAGEMENT SYSTEM -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management System</title>

            <!-- css style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index/index.css">

    
</head>
<body>
    <h1>Management System</h1><br><br>

    <!-- Login & Logout Session -->
    <form action="index_result.php" method = "get">
                    <!-- search -->
        <input type="text" name = "search" id = search>
        <button type = "submit">Search</button>
                    <!-- Login & Logout -->
        <?php if(isset($_SESSION['UserLogin'])) {?>
            <a href="logout.php">Logout</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
        <?php } ?>
    </form>


    <!-- Add Section src (add.php) -->
    <a href="add.php">Add New</a>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Added At</th>
            </tr>
        </thead>

        <tbody>
            <?php do { ?>           
            <tr>
                <td><a href="view.php?ID=<?php echo $row['id'];?>">View Profile</a></td>

                <td> <?php echo $row['last_name']; ?> </td>
                <td> <?php echo $row['first_name']; ?> </td>
                <td> <?php echo $row['email']; ?> </td>
                <td> <?php echo $row['gender']; ?> </td>
                <td> <?php echo $row['added_at']; ?> </td>
            </tr>
            <?php } while ($row = $management->fetch_assoc()); ?> 
        </tbody>
    </table>
</body>
</html>