<?php
$name = $_POST['name'];
$price = $_POST['price'];
$featured_image = $_FILES['featured_image'];

require '../../connect.php';
$target_dir = "E:/xampp/htdocs/backend/hieustore/upload/";
$file_name = basename($_FILES["featured_image"]["name"]);
$target_file = $target_dir . basename($_FILES["featured_image"]["name"]);
move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file);
$query = "INSERT INTO product(name, price, featured_image) VALUE('$name', '$price', '$file_name')";
$stmt = $conn->prepare($query);
$stmt->execute();
header('location: ../product.php');
// var_dump($featured_image);
// var_dump($target_file);
// var_dump($_FILES);