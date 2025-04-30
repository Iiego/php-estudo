<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.html");
  exit;
}

$conn = new mysqli("localhost", "root", "", "crud_login");

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM products WHERE id=$id AND user_id=$user_id";
$conn->query($sql);

header("Location: dashboard.php");
?>
