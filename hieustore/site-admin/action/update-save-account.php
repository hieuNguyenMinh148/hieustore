<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['pass'];
$role = $_POST['role'];
$id = $_POST['id'];
// var_dump($role);
if ($role == "Admin") {
    $role = 1;
} else {
    $role = 0;
}

require "../../connect.php";
// var_dump($role);

$query = "UPDATE account SET name = '$name', phone = '$phone', username = '$username', password = '$password', role = $role WHERE id=$id";
$stmt = $conn->prepare($query);
$stmt->execute();

//Chuyển về trang 
header('location: ../account.php');