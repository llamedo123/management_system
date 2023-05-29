<?php
// function Connection
include_once("connection/function.php");
$cons = connection();

// delete function -- redirect to index
if(isset($_POST['delete']))
{
    $id = $_POST['ID'];
    $sql = "DELETE FROM management_system WHERE id = '$id'";
    $cons->query($sql) or die ($cons->connect_error);
    echo header("Location: index.php");
}
?>