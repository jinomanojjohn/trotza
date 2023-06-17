<?php
include 'connection.php';
$mark = $_REQUEST['mark'];
$id = $_REQUEST['mcid'];
$date = $_REQUEST['dt'];
$class = $_REQUEST['class'];
$aid = $_REQUEST['aid'];
echo $id;
mysqli_query($conn,"update mark_child set mark=$mark where mcid=$id");
header("location: ../pages/view_mark.php?aid=".$aid."&&dt=".$date."&&class=".$class);
?>