<?php
session_start();
session_destroy(); // Remove todos os dados da sessão
header("Location: index.html"); // Redireciona para login
?>
