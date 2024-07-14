<?php
session_start();
if((isset($_SESSION ['matricula']) == true) and (!isset($_SESSION ['senha']) == true))
{
    unset($_SESSION['matricula']);
    unset($_SESSION['senha']);
    header('Location: login.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaiman System | :D </title>
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }
        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
        .rules {
            background-image: linear-gradient(to bottom, #dfe2e6, #829d5e);
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .rules h2 {
            color: rgb(255, 223, 0);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .rules ul {
            text-align: left;
            list-style-type: none;
            padding: 0;
        }
        .rules ul li {
            background: rgba(0, 0, 0, 0.3);
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .rules ul li:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">K.A.I.M.A.N | SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>

    <div class="rules">
        <h2>Regras da Biblioteca</h2>
        <ul>
            <li>Mantenha o silêncio para não atrapalhar os demais usuários.</li>
            <li>Não utilizar os computadores para jogar.</li>
            <li>Cuide dos livros e do espaço, mantenha tudo organizado.</li>
            <li>Respeite os prazos de devolução dos livros.</li>
            <li>Não coma ou beba dentro da biblioteca.</li>
            <li>Utilize os computadores apenas para atividades acadêmicas.</li>
        </ul>
    </div>

</body>
</html>