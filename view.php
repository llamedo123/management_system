<?php
//SESSION START
if(!isset($_SESSION))
{
    session_start();
}

 // Only the admin can access the view profile
 if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator")
 {
    echo "Hello! " . $_SESSION['UserLogin'] . "<br><br>";
 } else {
    echo header("Location: index.php");
 }

// Function Connection
include_once("connection/function.php");
$cons = connection();

 // SQL Database for user_profile management_system
 $id = $_GET['ID'];

 $sql = "SELECT * FROM `management_system` WHERE id = '$id'";
 $management = $cons->query($sql) or die($cons->connect_error);
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
<form action="delete.php" method="post">
    <a href="index.php">Back</a>
    <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>

    <?php if($_SESSION['Access'] == 'administrator') { ?>
        <button type="submit" name="delete">Delete</button>
    <?php } ?>


        <input type="hidden" name = "ID" value="<?php echo $row['id'];?>">
    </form>
  
    <h2><?php echo $row['last_name'];?> <?php echo $row['first_name'];?></h2>
    <p>is a <?php echo $row['gender']; ?></p><br>

    
</body>
</html>