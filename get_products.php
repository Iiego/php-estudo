<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  exit;
}

$conn = new mysqli("localhost", "root", "", "crud_login");

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM products WHERE user_id=$user_id";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
  echo "<strong>" . $row['name'] . "</strong><br>";
  echo $row['description'] . "<br><br>";
  echo "<a href='edit_product.php?id=" . $row['id'] . "'>Editar</a> | ";
  echo "<a href='delete_product.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>";
  echo "</div>";
}
?>
