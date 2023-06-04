<?php
include 'connection.php';
if (!isset($_REQUEST['dt']) && !isset($_REQUEST['class'])) {
    header("location: ../pages/attendance_list.php");
}
$date = $_REQUEST['dt'];
$class = $_REQUEST['class'];
$query = "insert into attendance_master values(null,'$date',$class,1)"; //last value from session
mysqli_query($conn, $query);
$query1 = "SELECT * from student_data where class='$class'";
$result1 = mysqli_query($conn, $query1);
$query3 = "SELECT max(aid) as aid from attendance_master";
$result3 = mysqli_query($conn, $query3);
$row_data = mysqli_fetch_array($result3);
$mid = $row_data['aid'];
while ($row = mysqli_fetch_array($result1)) {
    $sid = $row['sid'];
    $query2 = '';
    if(isset($_POST["$sid"])){
        $query2 = "insert into attendance_child values(null,$sid,$mid,1)";
    }
    else{
        $query2 = "insert into attendance_child values(null,$sid,$mid,0)";
    }
    mysqli_query($conn, $query2);
}
header("location: ../pages/attendance_list.php");
?>