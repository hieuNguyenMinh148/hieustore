<?php
$id = $_GET['id'];
require '../../connect.php';

$query = "DELETE FROM bill WHERE id=$id";
$stmt = $conn->prepare($query);
$stmt->execute();
header('location: ../bill.php');
