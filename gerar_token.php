<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Verificar se o e-mail está no banco de dados
    $sql = "SELECT * FROM usuários WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(16)); // Gerar token
        $link = "http://localhost/Projeto/resetar_senha.php?token=$token";

        // Atualizar token no banco de dados
        $sql = "UPDATE usuários SET token_recuperacao = ?, data_token = NOW() WHERE email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('ss', $token, $email);
        $stmt->execute(); 

        echo "Você pode redefinir sua senha <a href='$link'>aqui</a>.";
    } else {
        echo "E-mail não encontrado.";
    }
}
?>
