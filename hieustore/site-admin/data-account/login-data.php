<?php
session_start();
ob_start();

$user = $_POST['user'];
$pass = $_POST['password'];
require "../../connect.php";
$query = "SELECT * FROM account WHERE username = '$user' AND password = '$pass'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
// $result = mysqli_query($conn, $query);
// var_dump($result);
if ($result > 0) {
    $_SESSION['id'] = $result[0]['id'];
    $_SESSION['name'] = $result[0]['name'];
    $_SESSION['role'] = $result[0]['role'];
    if ($result[0]['role'] == 1) {
        header('location: ../index.php');
    } else if ($result[0]['role'] == 0) {
        header('location:../../../../index.php');
    }
} else {
    header('location:../../../../index.php');
}