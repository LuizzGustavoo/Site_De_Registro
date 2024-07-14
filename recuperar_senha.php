<?php
session_start();
include_once('config.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Consultar o banco de dados para verificar se o email existe
    $sql = "SELECT * FROM usuários WHERE email = '$email'";
    $result = $conexao->query($sql);

    if(mysqli_num_rows($result) == 1) {
        // Gerar um token seguro para redefinição de senha
        $token = bin2hex(random_bytes(32));

        // Armazenar o token e a validade no banco de dados
        $sql_update = "UPDATE usuários SET token_recuperacao = '$token', validade_token = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = '$email'";
        $conexao->query($sql_update);

        // Montar o email
        $to = $email;
        $subject = "Recuperação de Senha - SeuSite.com";
        $reset_link = "http://seusite.com/reset_senha.php?token=$token";
        $message_body = "Olá,\r\n\r\n";
        $message_body .= "Você solicitou a recuperação de senha. Clique no link abaixo para redefinir sua senha:\r\n";
        $message_body .= "$reset_link\r\n\r\n";
        $message_body .= "Se não solicitou a recuperação de senha, ignore este email.\r\n\r\n";
        $message_body .= "Atenciosamente,\r\n";
        $message_body .= "Equipe SeuSite.com";

        // Cabeçalhos adicionais
        $headers = "From: SeuSite <noreply@seusite.com>\r\n";
        $headers .= "Reply-To: noreply@seusite.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Enviar o email
        if (mail($to, $subject, $message_body, $headers)) {
            echo '<script>alert("Um link para redefinição de senha foi enviado para o seu email."); window.location.href = "login.php";</script>';
        } else {
            echo '<script>alert("Ocorreu um erro ao enviar o email. Por favor, tente novamente mais tarde.");</script>';
        }
    } else {
        echo '<script>alert("Email não encontrado.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        font-family: Arial, sans-serif; /* Definição da fonte Arial */
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
    }
        .back-btn {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
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
        <h2>Recuperar Senha</h2>
        <form action="recuperar_senha.php" method="POST">
            <div class="inputBox">
                <input type="email" name="email" id="email" class="inputUser" placeholder="Email cadastrado" required>
            </div>
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
