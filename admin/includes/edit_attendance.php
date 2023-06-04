<?php
include 'connection.php';
if (!isset($_REQUEST['dt']) && !isset($_REQUEST['class']) && !isset($_REQUEST['aid'])) {
    header("location: ../pages/attendance_list.php");
}
$date = $_REQUEST['dt'];
$class = $_REQUEST['class'];
$mid = $_REQUEST['aid'];
$query1 = "SELECT * from attendance_child where mid='$mid'";
$result1 = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_array($result1)) {
    $acid = $row['acid'];
    $query2 = '';
    if(isset($_POST["$acid"])){
        $query2 = "update attendance_child set status = 1 where acid= $acid";
    }
    else{
        $query2 = "update attendance_child set status = 0 where acid= $acid";
    }
    mysqli_query($conn, $query2);
}
header("location: ../pages/attendance_list.php");
?>