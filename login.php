<?php
session_start(); // Inicia a sessão

$conn = new mysqli("localhost", "root", "", "crud_login");

$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Se encontrou 1 usuário
if ($result->num_rows == 1) {
  $user = $result->fetch_assoc();
  $_SESSION['user_id'] = $user['id'];
  header("Location: dashboard.php");
} else {
  echo "Login inválido!";
}
?>
