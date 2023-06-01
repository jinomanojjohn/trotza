<?php
include 'connection.php';
$id = $_GET['id'];
$pa = $_GET['d'];

$query = "UPDATE login SET status = '$pa' WHERE id = $id and type = 'faculty'";
if (mysqli_query($conn, $query)) {
    // echo "Record updated successfully";
    echo "<script>window.location.href='../pages/faculty_list.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>