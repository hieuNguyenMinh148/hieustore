<?php
ob_start();
session_start();
$fullname = $_POST['fullname'];
$mobile = $_POST['mobile'];
$province = $_POST['province'];
$district = $_POST['district'];
$ward = $_POST['ward'];
$address = $_POST['address'];
$payment_method = $_POST['payment_method'];
$id = $_SESSION['id'];

$addre = $province . ", " . $district . ", " . $ward . ", " . $address;

require "../connect.php";
$query = "INSERT INTO bill(fullname, mobile, address, payment_method, customer_id) VALUE('$fullname', '$mobile', '$addre', '$payment_method','$id')";
//Thực thi câu truy vấn
$stmt = $conn->prepare($query);
$stmt->execute();
//Khai báo biến để nhận dữ liệu đc lấy ra

header('location:../../../dat-hang.php');
