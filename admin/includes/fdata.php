<?php
include 'connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['pass'];

$query3 = "SELECT COUNT(*) FROM faculty_data inner join login on faculty_data.fid = login.id and login.type='faculty' WHERE mobile='$mobile' and status='1' or status='0'";
if ($result = mysqli_query($conn, $query3)) {
    $row = mysqli_fetch_assoc($result);
    if ($row['COUNT(*)'] != 0) {
        echo "<script>alert('Mobile number already exists');window.location.href='../pages/faculty_list.php';</script>";
    }
    else {
        $query = "INSERT INTO faculty_data (name, email, mobile) VALUES ('$name', '$email', '$mobile')";
        if (mysqli_query($conn, $query)) {
            $query2 = "INSERT INTO login (id, username, password, type, status) VALUES (LAST_INSERT_ID(),'$email', '$password', 'faculty', '1')";
            if (mysqli_query($conn, $query2)) {
                echo "<script>alert('Record inserted successfully');window.location.href='../pages/faculty_list.php';</script>";
            } else {
                echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
} 
else {
    echo "Error occured";
}
?>