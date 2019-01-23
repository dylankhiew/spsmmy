<?php
$conn=mysqli_connect("localhost","root","","spsm");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
?>