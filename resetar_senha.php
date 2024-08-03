<?php
include_once('config.php');

$mensagem = ''; // Variável para armazenar mensagens

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['token']) && isset($_POST['nova_senha'])) {
        $token = $_POST['token'];
        $nova_senha = $_POST['nova_senha'];

        // Validar token
        $sql = "SELECT * FROM usuários WHERE token_recuperacao = ? AND data_token > NOW() - INTERVAL 1 HOUR";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Atualizar senha e limpar token
            $sql = "UPDATE usuários SET senha = ?, token_recuperacao = NULL WHERE token_recuperacao = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param('ss', $nova_senha, $token);
            if ($stmt->execute()) {
                $mensagem = "Senha atualizada com sucesso!";
            } else {
                $mensagem = "Erro ao atualizar a senha.";
            }
        } else {
            $mensagem = "Token inválido ou expirado.";
        }
    } else {
        $mensagem = "Token ou nova senha não fornecidos.";
    }
} else {
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    } else {
        $mensagem = "Token não fornecido.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link href="https://fonts.cdnfonts.com/css/bebas-neue" rel="stylesheet">
    <style>
        @import url('https://fonts.cdnfonts.com/css/bebas-neue');

        body {
            font-family: 'Bebas Neue', sans-serif;
            background-image: linear-gradient(to bottom, #dfe2e6, #829d5e);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 80%;
            max-width: 400px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            margin-bottom: 20px;
            color: #ffffff;
            text-align: center;
        }
        input[type="password"] {
            width: 100%;
            padding: 4px;
            margin: 5px 0;
            border: 1px solid #ffffff;
            border-radius: 4px;
            background: none;
            color: #ffffff;
        }
        input[type="password"]::placeholder {
            color: #ffffff;
        }
        input[type="submit"] {
            background-image: linear-gradient(to right, #568915, green);
            width: 100%;
            border: none;
            padding: 15px;
            color: #ffffff;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-image: linear-gradient(to right, #568915, green);
        }
        .mensagem { 
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }
        .sucesso {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .erro {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Redefinir Senha</h1>
        <?php if ($mensagem): ?>
            <div class="mensagem <?php echo strpos($mensagem, 'sucesso') !== false ? 'sucesso' : 'erro'; ?>">
                <?php echo htmlspecialchars($mensagem); ?>
            </div>
        <?php endif; ?>
        <form action="resetar_senha.php" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            Nova Senha: <input type="password" name="nova_senha" required><br>
            <input type="submit" value="Redefinir Senha">
        </form>
        <p>Voltar para página de login: <a href="login.php" style="color: #829d5e;">LOGIN</a>.</p>
    </div>
</body>
</html>
