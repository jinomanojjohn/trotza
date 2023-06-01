<?php
include 'connection.php';
$id = $_GET['id'];
$query = "SELECT * FROM faculty_data where fid=$id";
// $query2 = "SELECT * FROM login where id=$id and type='faculty'";
if ($result = mysqli_query($conn, $query)) {
    //create an array
    $techarray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $techarray[] = $row;
    }
    // $techarray[] = $row2;
    echo json_encode($techarray);
} else {
    echo "Error occured";
}
?>