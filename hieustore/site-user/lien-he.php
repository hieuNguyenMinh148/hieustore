<?php
//Khai báo các biến chứa dữ liệu đc gửi qua POST
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$content = $_POST['content'];

require "../connect.php";
//Câu truy vấn
$query = "INSERT INTO contact(fullname, email, mobile, content) VALUE('$fullname', '$email', '$mobile', '$content')";
//Thực thi câu truy vấn
$stmt = $conn->prepare($query);
$stmt->execute();
//Khai báo biến để nhận dữ liệu đc lấy ra
header('location:../contact.php');
