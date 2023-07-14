<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['pass'];
$role = $_POST['role'];
if ($role == "Admin") {
    $role = 1;
} else {
    $role = 0;
}

require '../../connect.php';
// var_dump($role);
$query = "INSERT INTO account(name, phone, username, password, role) VALUE('$name', '$phone', '$username', '$password', $role)";
$stmt = $conn->prepare($query);
$stmt->execute();
header('location: ../account.php');