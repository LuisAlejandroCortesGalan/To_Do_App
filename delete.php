<?php 
include_once "connection.php";


$id = $_GET['id'];
// echo $id;

$delete = "DELETE FROM app WHERE id = ?";
$delete_prepare = $conn->prepare($delete);
$delete_prepare->execute([$id]);

$delete_prepare = null;
$conn = null;

header('location:index.php');