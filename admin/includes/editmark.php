<?php
include 'connection.php';
$mark = $_REQUEST['mark'];
$id = $_REQUEST['msid'];
$date = $_REQUEST['dt'];
$class = $_REQUEST['class'];
echo $id;
mysqli_query($conn,"update mark_subchild set mark=$mark where msid=$id");
header("location: ../pages/view_mark.php?dt=".$date."&&class=".$class);
?>