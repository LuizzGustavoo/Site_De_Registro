<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Recuperação de Senha</title>
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
        label {
            color: #ffffff;
            display: block;
            margin-bottom: 10px;
        }
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            outline: none;
            color: #ffffff;
            background-color: transparent;
        }
        input[type="email"]::placeholder {
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Recupere sua senha</h1>
        <form action="gerar_token.php" method="POST">
            <label for="email">Digite seu e-mail:</label>
            <input type="email" id="email" name="email" placeholder="seu-email@exemplo.com" required>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
