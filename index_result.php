<?php
//SESSION START
if(!isset($_SESSION))
{
    session_start();
}

// Function Connection
include_once("connection/function.php");
$cons = connection();

// Knowing if the User is Admin or Guest
  if(isset($_SESSION['UserLogin']))
  {
     echo "Welcome " . $_SESSION['UserLogin'];
  } else {
     echo "Welcome Guest";
  }

// For Search Function
$search = isset($_GET['search']) ? $_GET['search']: '';
if(empty($search))
{
    echo "Please Enter A Search Term";
    exit();
} 

// SQL Search Database Function

$sql = "SELECT * FROM management_system WHERE last_name LIKE '%$search%' OR
first_name LIKE '%$search%'";
$management = $cons->query($sql) or die ($cons->connect_error);
$row = $management->fetch_assoc();

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
        <input type="text" name = "search" id = "search">
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
            <?php 
                if($management->num_rows == 0)
                {
                    echo "<tr><td colspan = '3'>Sorry! No Data Found!</td></tr>";
                }
                else { do { ?>
            <tr>
                <td><a href="view.php?ID = <?php $row['id']; ?>">View Profile</a></td>
            
                <?php if($row['last_name']) 
                { ?>
                <td> <?php echo $row['last_name']; ?> </td>
                <td> <?php echo $row['first_name']; ?> </td>
                <?php } else {
                    echo "<tr><td colspan = '2'>Sorry! No Data Found!</td></tr>";
                } ?>
                <td> <?php echo $row['email']; ?> </td>
                <td> <?php echo $row['gender']; ?> </td>
                <td> <?php echo $row['added_at']; ?> </td>
            </tr>
            <?php } while ($row = $management->fetch_assoc()); 
                 }?> 
        </tbody>
    </table>
</body>
</html>