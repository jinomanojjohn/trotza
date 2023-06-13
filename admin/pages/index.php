<?php
session_start();
if (!isset($_SESSION['LoginTeacher'])){
    header('Location: ../../login.php');
}else {
    header('Location: profile.php');
}
?>