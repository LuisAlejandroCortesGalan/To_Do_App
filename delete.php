<?php 
include_once "connection.php";


$id = $_GET['id'];
$estado = "white";
$estado_user = "eliminado";
// echo $id;


$delete = "UPDATE app SET estado = ?, estado_user = ? WHERE id = ?";
$delete_prepare = $conn->prepare($delete);
$delete_prepare->execute([$estado,$estado_user,$id]);

$delete_prepare = null;
$conn = null;

header('location:index.php');