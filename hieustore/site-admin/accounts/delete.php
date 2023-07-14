<?php
$id = $_GET['id'];
require '../../connect.php';

$query = "DELETE FROM account WHERE id=$id";
$stmt = $conn->prepare($query);
$stmt->execute();
header('location: ../account.php');