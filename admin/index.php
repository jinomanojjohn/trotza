<?php
session_start();
if (!isset($_SESSION['LoginTeacher'])){
    header('Location: ../login.php');
}else {
    header('Location: pages/profile.php');
}
?>