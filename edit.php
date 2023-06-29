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
 $id = $_GET['ID'];

 $sql = "SELECT * FROM management_system WHERE id = '$id'";
 $management = $cons->query($sql) or die($cons->connect_error);
 $row = $management->fetch_assoc();

 // Function for Update Profile after submitting
 if (isset($_POST['submit']))
 {
    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

 $sql = "UPDATE management_system SET last_name = '$lname', first_name = 
'$fname', email = '$email', gender = '$gender' WHERE id = '$id'";
 $cons->query($sql) or die($cons->connect_error);
 echo header("Location: view.php?ID=".$id);


//  echo header("Location: view.php?id = ".$id);
 }

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

<form action="" method = "post">

    <label>First Name</label>
    <input type = "text" name = "firstname" id = "firstname" value = " <?php echo $row['first_name']; ?>">

    <label>Last Name</label>
    <input type = "text" name = "lastname" id = "lastname" value = " <?php echo $row['last_name']; ?>">

    <label>Email</label>
    <input type = "text" name = "email" id = "email" value = " <?php echo $row['email']; ?>">

    <label>Gender</label>
    <select name="gender" id="gender">
        <!-- echo()? '' : '' ; -->
        <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : ''; ?>>Female</option>
    </select>

    <input type="submit" name = "submit" value = "Update">

</form>


</body>
</html>