<?php
include 'connection.php';
$id = $_GET['id'];


$query = "SELECT * FROM login where id=$id";
if ($result = mysqli_query($conn, $query)) {
    //create an array
    $techarray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $techarray[] = $row;
    }

    echo json_encode($techarray);
} else {
    echo "Error occured";
}

?>