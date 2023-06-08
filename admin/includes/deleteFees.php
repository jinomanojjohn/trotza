<?php
include 'connection.php';
$id = $_REQUEST['feid'];
$query = "delete from fees where feid = $id";
if ($result = mysqli_query($conn, $query)) {
    echo "<script>alert('Deleted successfully');window.location.href='../pages/fees.php';</script>";            
} 
else {
    echo "Error occured";
}
?>