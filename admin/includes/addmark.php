<?php
include 'connection.php';
session_start();
if (!isset($_REQUEST['dt']) && !isset($_REQUEST['class'])) {
    header("location: ../pages/marks.php");
}
$date = $_REQUEST['dt'];
$class = $_REQUEST['class'];
$query = "insert into mark_master(date,fid,class) values('$date',{$_SESSION['LoginTeacher']},$class)";
mysqli_query($conn, $query);
$query5 = "select max(markid) as mkid from mark_master ";
$res = mysqli_query($conn, $query5);
$rw = mysqli_fetch_array($res);
$markid = $rw["mkid"];
$query = "select * from subject";
$result = mysqli_query($conn, $query);
$total = array();
$subjects = array();
while ($row = mysqli_fetch_array($result)) {
    $subid = $row['subid'];
    array_push($subjects, $row['subid']);
    if (isset($_REQUEST["t$subid"])) {
        //echo $_REQUEST["t$subid"];
        $total["$subid"] = $_REQUEST["t$subid"];
    }
}
$query1 = "select * from student_data where class=$class";
$result1 = mysqli_query($conn, $query1);
echo "<br>";
while ($row = mysqli_fetch_array($result1)) {
    $sid = $row["sid"];
    $query = "insert into mark_child(markid,sid) values($markid,$sid)";
    mysqli_query($conn, $query);
    $query6 = "select max(mcid) as mcid from mark_child";
    $res = mysqli_query($conn, $query6);
    $rw = mysqli_fetch_array($res);
    $mcid = $rw["mcid"];
    foreach ($subjects as $sub) {
        if (isset($_REQUEST["s" . $sid . "m" . $sub])) {
            $mark = $_REQUEST["s" . $sid . "m" . $sub];
            $query = "insert into mark_subchild(mcid,subject,mark,tmark) values($mcid,$sub,$mark,$total[$sub])";
            mysqli_query($conn, $query);
        }
    }
}
header("location: ../pages/marks.php");
