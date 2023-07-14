<?php
session_start();
ob_start();
require "../connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$customer_id = $_SESSION['id'];

$query = "INSERT INTO order_detail(customer_id, product_id, price) VALUES('$customer_id', '$id', (SELECT price FROM product WHERE id = '$id'))";
$stmt = $conn->prepare($query);
$stmt->execute();
header('location:/');