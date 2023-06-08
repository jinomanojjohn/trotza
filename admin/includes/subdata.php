<?php
include 'connection.php';
$name = $_POST['name'];
$class = $_POST['classs'];

$query = "INSERT INTO subject (subname,cid) VALUES ('$name','$class')";
if (mysqli_query($conn, $query)) {
    echo "<script>window.location.href='../pages/subject.php';</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>