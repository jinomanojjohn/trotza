<?php

include 'connection.php';
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['pass'];

$query = "UPDATE faculty_data set name='$name', email='$email', mobile='$mobile' where fid=$id";
$query2 = "UPDATE login SET username='$email', password = '$password' WHERE id = $id and type = 'faculty'";
if (mysqli_query($conn, $query) && mysqli_query($conn, $query2)) {
    // echo "Record updated successfully";
    if(isset($_POST['profile'])){
        echo "<script>window.location.href='../pages/profile.php';</script>";
    }
    else{
        echo "<script>window.location.href='../pages/faculty_list.php';</script>";
    }

} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>