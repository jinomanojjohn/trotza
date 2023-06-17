<?php
include 'connection.php';
session_start();
if (!isset($_REQUEST['dt']) && !isset($_REQUEST['class'])) {
    header("location: ../pages/marks.php");
}
$date = $_REQUEST['dt'];
$class = $_REQUEST['class'];
$subject = $_REQUEST['sub'];
$tmark = $_REQUEST['total'];
$mark = $_REQUEST['mark'];
$sid = $_REQUEST['sid'];
// print_r($mark);
// print_r($sid);

$query = "insert into mark_master(date,fid,class,subject,total) values('$date',{$_SESSION['LoginTeacher']},$class,$subject,$tmark)";
mysqli_query($conn, $query);
$query5 = "select max(markid) as mkid from mark_master ";
$res = mysqli_query($conn, $query5);
$rw = mysqli_fetch_array($res);
$markid = $rw["mkid"];
$query1 = "select * from student_data where class=$class";
$result1 = mysqli_query($conn, $query1);
for ($i=0; $i < count($mark); $i++) { 
    $query4 = "insert into mark_child(markid,sid,mark) values($markid,$sid[$i],$mark[$i])";
    mysqli_query($conn, $query4);
}
header("location: ../pages/marks.php")
?>
