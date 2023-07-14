<?php
$id = $_GET['id'];
require "../connect.php";

$query = "DELETE FROM order_detail WHERE id = '$id'";
$stmt = $conn->prepare($query);
$stmt->execute();
header('location:/');