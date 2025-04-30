<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.html");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Produtos</title>
</head>
<body>
  <h2>Cadastro de Produtos</h2>
  <form action="add_product.php" method="POST">
    <input type="text" name="name" placeholder="Nome do produto" required><br>
    <textarea name="description" placeholder="Descrição" required></textarea><br>
    <input type="submit" value="Cadastrar">
  </form>

  <h3>Seus Produtos:</h3>
  <div id="product-list"></div>

  <a href="logout.php">Sair</a>

  <script>
    fetch('get_products.php')
      .then(response => response.text())
      .then(data => {
        document.getElementById('product-list').innerHTML = data;
      });
  </script>
</body>
</html>
""