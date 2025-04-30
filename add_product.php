<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.html");
  exit;
}

$conn = new mysqli("localhost", "root", "", "crud_login");

$name = $_POST['name'];
$description = $_POST['description'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO products (name, description, user_id) VALUES ('$name', '$description', $user_id)";
$conn->query($sql);

header("Location: dashboard.php");
?>
