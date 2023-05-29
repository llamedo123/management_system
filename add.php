<?php
// function Connection
include_once("connection/function.php");
$cons = connection();

// SQL Database for add management_system
if(isset($_POST['submit'])) 
{
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

$sql = "INSERT INTO `management_system`(`last_name`, `first_name`, `email`, `gender`) 
        VALUES ('$lname', '$fname', '$email', '$gender')";
    $cons->query($sql) or die ($cons->connect_error);
    echo header("Location: index.php");

}

// REQUIRED FIELD AREA
    $firstname = 
    $lastname = 
    $email = 
    $gender = "";
    $firstnameErr = 
    $lastnameErr = 
    $emailErr = 
    $genderErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // FIRST_NAME
        if (empty($_POST["name"])) {
          $firstnameErr = "Required Field";
        } else {
          $firstname = test_input($_POST["name"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $firstnameErr = "Only letters and white space allowed";
          }
        }

        // LAST_NAME
        if (empty($_POST["name"])) {
            $lastnameErr = "Required Field!";
          } else {
            $lastname = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
              $lastnameErr = "Only letters and white space allowed";
            }
          }

        // EMAIL
        if (empty($_POST["name"])) {
            $emailErr = "Required Field!";
          } else {
            $email = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
              $emailnameErr = "Invalid Email Format!";
            }
          }

        //   GENDER
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
          } else {
            $gender = test_input($_POST["gender"]);
          }
    }
 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

<!-- ADD MANAGEMENT SYSTEM -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management System</title>

            <!-- css style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add/add.css">
    <style>
    .error {color: #FF0000;}
    </style>
      
</head>
<body>
    <h1>Management System</h1><br><br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
        <label>First Name</label>
        <input type="text" name = "firstname" id = "firstname" value = "<?php echo $firstname; ?>">
        <span class = "error">* <?php echo $firstnameErr; ?></span>

        <label>Last Name</label>
        <input type="text" name = "lastname" id = "lastname" value = <?php echo $lastname; ?>>
        <span class = "error">* <?php echo $lastnameErr; ?></span>

        <label>Email</label>
        <input type="text" name = "email" id = "email" value = "<?php echo $email; ?>">
        <span class = "error">* <?php echo $emailErr; ?></span>

        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>


        <input type="submit" name = "submit" value = "Add User">


    </form>
</body>
</html> 