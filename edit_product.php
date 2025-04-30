<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.html");
  exit;
}

$conn = new mysqli("localhost", "root", "", "crud_login");

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM products WHERE id=$id AND user_id=$user_id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if (!$product) {
  echo "Produto não encontrado.";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar Produto</title>
</head>
<body>
  <h2>Editar Produto</h2>
  <form action="update_product.php" method="POST">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br>
    <textarea name="description" required><?= $product['description'] ?></textarea><br>
    <input type="submit" value="Atualizar">
  </form>
  <br>
  <a href="dashboard.php">Voltar</a>
</body>
</html>
