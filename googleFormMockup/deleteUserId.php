<?php

include 'dbcon.php';
$userId = $_GET['deleteUserId'];
echo $userId;
$deleteUserQuery = "DELETE FROM user WHERE userID = '$userId'";

$deleteUserResult = mysqli_query($con, $deleteUserQuery);
if ($deleteUserResult) {
    header("Location: index.php");
    exit; 
}



?>