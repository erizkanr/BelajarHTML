<?php
session_start();
unset($_SESSION['name']);
$_SESSION['danger'] = "Logout Succes";
header("Location:login.php");
?>