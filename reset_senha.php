<?php
session_start();
include_once('config.php');

if(isset($_POST['submit'])) {
    $token = $_GET['token'];
    $nova_senha = $_POST['nova_senha'];

    // Utilizando prepared statements para segurança contra SQL Injection
    $stmt = $conexao->prepare("SELECT * FROM usuários WHERE token_recuperacao = ? AND validade_token > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1) {
        // Atualizar a senha do usuário usando prepared statements
        $stmt_update = $conexao->prepare("UPDATE usuários SET senha = ?, token_recuperacao = NULL, validade_token = NULL WHERE token_recuperacao = ?");
        $stmt_update->bind_param("ss", $nova_senha, $token);
        $stmt_update->execute();

        echo '<script>alert("Senha redefinida com sucesso.");</script>';
        header('Location: login.php');
        exit(); // Encerra o script após o redirecionamento
    } else {
        echo '<script>alert("Link expirado ou inválido.");</script>';
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            color: white;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 15px;
            width: 80%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .inputSubmit {
            background-color: #829d5e; /* Mesma cor verde da página inicial */
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            font-family: 'Bebas Neue', sans-serif;
            text-transform: uppercase;
        }
        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
            margin-bottom: 10px;
            padding: 10px 0;
            font-family: 'Bebas Neue', sans-serif;
        }
        .back-btn {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            position: absolute;
            top: 20px;
            left: 20px;
            margin-top: 10px;
        }
        .back-btn:hover {
            background-color: #568915;
        }
        .back-btn i {
            margin-right: 5px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .box {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <a href="login.php" class="back-btn"><i class="fas fa-arrow-left"></i>Voltar</a>
    <div class="box">
        <h2>Redefinir Senha</h2>
        <form action="recuperar_senha.php?token=<?php echo htmlspecialchars($_GET['token']); ?>" method="POST">
            <div class="inputBox">
                <input type="password" name="nova_senha" id="nova_senha" class="inputUser" placeholder="Nova Senha" required>
            </div>
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Redefinir Senha">
        </form>
    </div>
</body>
</html>
