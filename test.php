<?php
session_start(); // Certifique-se de iniciar a sessão
echo '4: ' . $_SESSION['user_id'];
echo 'Luiz: ' . $_SESSION['nome'];
echo 'Admin: ' . ($_SESSION['is_admin'] ? 'Sim' : 'Não');
?>
