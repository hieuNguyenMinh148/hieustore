<?php
$name = $_POST['name'];
$price = $_POST['price'];
$featured_image = $_FILES['featured_image'];
$id = $_POST['id'];

require "../../connect.php";
// var_dump(basename($_FILES["featured_image"]["name"]) != "");
if (basename($_FILES["featured_image"]["name"]) != "") {
    $target_dir = "C:/xampp/htdocs/backend/hieustore/upload/";
    $file_name = basename($_FILES["featured_image"]["name"]);
    $target_file = $target_dir . basename($_FILES["featured_image"]["name"]);
    move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file);
    $query = "UPDATE product SET name = '$name', price = '$price', featured_image = '$file_name' WHERE id=$id";
} else {
    $query = "UPDATE product SET name = '$name', price = '$price' WHERE id=$id";
}

$stmt = $conn->prepare($query);
$stmt->execute();

//Chuyển về trang 
header('location: ../product.php');