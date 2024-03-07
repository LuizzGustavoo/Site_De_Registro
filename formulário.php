<?php
    if(isset($_POST['submit'])){    
        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $matricula = $_POST['matricula'];
        $telefone = $_POST['telefone'];
        $data_nasc = $_POST['data_nascimento'];

        $result = mysqli_query($conexao, "INSERT INTO usuários(nome,email,senha,matricula,telefone,data_nasc)  VALUES('$nome', '$email', '$senha', '$matricula', '$telefone', '$data_nasc')");
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset {
            border: 3px solid dodgerblue;
        }
        legend {
            border: 1px solid dodgerblue;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 5px;
            color: white;
        }
        .inputBox {
            position: relative;
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
        }
        .LabelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .LabelInput,
        .inputUser:valid ~ .LabelInput {
            top: -20px;
            font-size: 12px;
            color: red;
        }
        #data_nascimento {
            border: none;
            padding: 9px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit {
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(80, 10, 160));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover {
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(89, 36, 150));
        }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="formulário.php" method="POST">
            <fieldset>
                <legend> <b>Cadastro de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="LabelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="LabelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="LabelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="matricula" id="matricula" class="inputUser" required>
                    <label for="matricula" class="LabelInput">Matrícula</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="LabelInput">Telefone</label>
                </div>                   
                <br><br>
                <p>Curso:</p>
                <input type="radio" name="Curso" value="ADS">
                <label for="ADS">ADS</label><br>
                <input type="radio" name="Curso" value="TÉC INFO">
                <label for="TÉC INFO">TÉC INFO</label><br>
                <input type="radio" name="Curso" value="TÉC ADM">
                <label for="TÉC ADM">TÉC ADM</label><br>
                <input type="radio" name="Curso" value="outro">
                <label for="outro">OUTRO</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento"  required>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
        <p>Já tem uma conta? <a href="login.php">Faça login aqui</a>.</p>
    </div>
</body>
</html>
