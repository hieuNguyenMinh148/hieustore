<?php
$id = $_GET['id'];
require '../../connect.php';

$query = "DELETE FROM contact WHERE id=$id";
$stmt = $conn->prepare($query);
$stmt->execute();
header('location: ../letters.php');
