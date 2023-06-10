<?php
include 'connection.php';
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$class = $_POST['eclasss'];
$mobile = $_POST['mobile'];
$school = $_POST['school'];
$board = $_POST['board'];
$parent = $_POST['parent'];
$pmobile = $_POST['pmobile'];

$query = "UPDATE student_data set name='$name', email='$email', class='$class', mobile='$mobile', school='$school', board='$board', pname='$parent', pmobile='$pmobile' where sid=$id";
$query2 = "UPDATE login SET password = '$email' WHERE id = $id and type = 'student'";
if (mysqli_query($conn, $query) && mysqli_query($conn, $query2)) {
    // echo "Record updated successfully";
    echo "<script>window.location.href='../pages/student_list.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>