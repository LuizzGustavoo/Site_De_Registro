<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | Kaiman System</title>
    <link href="https://fonts.cdnfonts.com/css/bebas-neue" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.cdnfonts.com/css/bebas-neue');

        body {
            font-family: 'Bebas Neue', sans-serif;
            background-image: linear-gradient(to bottom, #dfe2e6, #829d5e);
            text-align: center;
            color: #ffffff;
            margin: 0;
            height: 100vh; 
            display: flex;
            flex-direction: column;
            justify-content: center;
        } 
        .box {
            position: relative;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 80%;
            max-width: 500px;

            margin: 0 auto; /* Center horizontally */
        }
        a {
            text-decoration: none;
            color: white;
            border: 3px solid #568915;
            border-radius: 15px;
            padding: 10px;
            margin: 0 10px;
        }
        a:hover {
            background-color: #568915;
        }
        .social-links {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }
        .social-links a {
            display: inline-block;
            margin: 10px;
            padding: 10px;
            border-radius: 50%;
            border: 3px solid #568915;
            font-size: 20px;
        }
        .social-links a:hover {
            background-color: #568915;
        }
        .author-info {
            position: absolute;
            bottom: 10px;
            right: 10px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }
        .verified-icon {
            color: #568915;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Seja Bem Vindo(a)!!</h1>
        <br>
        <br>
        <a href="formulario.php">Cadastre-se</a>
        <a href="login.php">Login</a>
    </div>
    <div class="social-links">
        <a href="https://github.com/LuizzGustavoo/Site_De_Registro" target="_blank"><i class="fab fa-github"></i></a>
    </div>
    <br>
    <br>
    <div class="author-info"> <i class="fas fa-check-circle verified-icon"></i>
    </div>
</body>
</html>