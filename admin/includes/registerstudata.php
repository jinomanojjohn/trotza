<?php
include 'connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$class = $_POST['classs'];
$mobile = $_POST['mobile'];
$school = $_POST['school'];
$board = $_POST['board'];
$parent = $_POST['parent'];
$pmobile = $_POST['pnumber'];

$query3 = "SELECT COUNT(*) FROM login WHERE username='$email' AND password='$mobile' AND (status=1 OR status=0)";
if ($result = mysqli_query($conn, $query3)) {
    $row = mysqli_fetch_assoc($result);
    if ($row['COUNT(*)'] != 0) {
        echo "<script>alert('Email or Mobile number already exists');window.location.href='../../register.php';</script>";
    }
    else {
        $query = "INSERT INTO student_data (name, email, mobile, class, school, board, pname, pmobile) VALUES ('$name', '$email', '$mobile', '$class', '$school', '$board', '$parent', '$pmobile')";
        if (mysqli_query($conn, $query)) {
            $query2 = "INSERT INTO login (id, username, password, type, status) VALUES (LAST_INSERT_ID(),'$email', '$mobile', 'student', '1')";
            if (mysqli_query($conn, $query2)) {
                echo "<script>alert('Record inserted successfully');window.location.href='../../login.php';</script>";
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