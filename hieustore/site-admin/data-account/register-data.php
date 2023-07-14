<?php
require "../../connect.php";
$name = $_POST['fullname'];
$phone = $_POST['phone'];
$username = $_POST['user'];
$password = $_POST['password'];

$query = "INSERT INTO account(name, phone, username, password, role) VALUE('$name', '$phone', '$username', '$password', 0)";
$stmt = $conn->prepare($query);
$stmt->execute();
header('location:../../../index.php');