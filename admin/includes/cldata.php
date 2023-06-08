<?php
include 'connection.php';
$name = $_POST['name'];

$query = "INSERT INTO class (clname) VALUES ('$name')";
if (mysqli_query($conn, $query)) {
    echo "<script>window.location.href='../pages/class.php';</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>