<?php 
include 'connection.php';
$email = $_POST['email'];
$password = $_POST['password'];
$id = 0;

$query = "UPDATE login 
set email = '$email', 
    password = '$password' 
    where id = $id";

if ($result = mysqli_query($conn, $query)) {
    header("Location: ../pages/profile.php");
} else {
    echo "Error occured";
}
?>