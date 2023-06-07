<?php
include 'connection.php';
$name = $_REQUEST['name'];
$amount = $_POST['amount'];
$query = "insert into fees(sid,`amount`) values('$name',$amount)";
if ($result = mysqli_query($conn, $query)) {
    echo "<script>alert('Record inserted successfully');window.location.href='../pages/fees.php';</script>";            
} 
else {
    echo "Error occured";
}
?>