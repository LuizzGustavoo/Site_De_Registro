<?php
session_start();
require('fpdf/fpdf.php');
require('config.php'); // Inclua o arquivo de conexão


// Função para gerar o relatório em PDF
function gerarPDF($conexao) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Título do documento
    $pdf->Cell(0, 10, 'Relatorio de Usuarios', 0, 1, 'C');

    // Cabeçalhos das colunas
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'ID', 1);
    $pdf->Cell(60, 10, 'Nome', 1);
    $pdf->Cell(30, 10, 'Matricula', 1);
    $pdf->Cell(60, 10, 'Email', 1);
    $pdf->Cell(30, 10, 'Telefone', 1);
    $pdf->Ln();

    // Dados dos usuários
    $pdf->SetFont('Arial', '', 10);
    $sql = "SELECT id, nome, matricula, email, telefone FROM usuários";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(20, 10, $row['id'], 1);
            $pdf->Cell(60, 10, $row['nome'], 1);
            $pdf->Cell(30, 10, $row['matricula'], 1);
            $pdf->Cell(60, 10, $row['email'], 1);
            $pdf->Cell(30, 10, $row['telefone'], 1);
            $pdf->Ln();
        }
    } else {
        $pdf->Cell(0, 10, 'Nenhum usuario encontrado.', 0, 1, 'C');
    }

    // Saída do PDF
    $pdf->Output('D', 'relatorio_usuarios.pdf'); // 'D' força o download do PDF
    exit();
}

// Verifica se o botão de gerar PDF foi clicado
if (isset($_POST['gerar_pdf'])) {
    gerarPDF($conexao);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Relatório</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(to bottom, #dfe2e6, #829d5e);
        }

        /* Estilo do contêiner principal */
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        /* Estilo do título */
        h1 {
            font-family: 'Bebas Neue', cursive;
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Estilo do botão */
        input[type="submit"] {
            font-family: 'Bebas Neue', cursive;
            font-size: 18px;
            background-color: #829d5e;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #6d834f; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerar Relatório</h1>
        <form action="gerar_relatorio.php" method="POST">
            <input type="submit" name="gerar_pdf" value="Gerar PDF">
        </form>
    </div>
</body>
</html>

