<?php
$id = $_GET['id'];
require '../../connect.php';

$query = "DELETE FROM product WHERE id=$id";
$stmt = $conn->prepare($query);
$stmt->execute();
header('location: ../product.php');