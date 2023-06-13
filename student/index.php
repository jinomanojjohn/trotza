<?php
session_start();
if (!isset($_SESSION['LoginStudent'])){
    header('Location: ../login.php');
}else {
    header('Location: ../index.php');
}
?>