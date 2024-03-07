<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box {
            color: rgb(0, 0, 0);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(245, 248, 245, 0.774);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        .inputSubmit {
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            width: 100%;
            border: none;
            padding: 15px;
            color: rgb(0, 0, 0);
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid rgb(8, 8, 8);
            outline: none;
            color: rgb(2, 2, 2);
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <h2>Login</h2>
        <form action="testLogin.php" method="POST">
            <div class="inputBox">
                <input type="text" name="matricula" id="matricula" class="inputUser" required>
                <label for="matricula" class="LabelInput">Matrícula</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="LabelInput">Senha</label>
            </div>
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
        <p>Não tem o registro ainda? <a href="formulário.php">Faça o registro aqui</a>.</p>
    </div>
</body>
</html>
