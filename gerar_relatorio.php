<?php
session_start();
require('fpdf/fpdf.php');
require('config.php'); // Inclua o arquivo de conexão

// Verifica se o usuário está logado e se é admin
if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header("Location: login.php"); // Redireciona para a página de login se não for admin
    exit();
}

// Função para gerar o relatório em PDF
function gerarPDF($conexao) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Título do documento
    $pdf->Cell(0, 10, 'Relatório de Usuários', 0, 1, 'C');

    // Cabeçalhos das colunas
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'ID', 1);
    $pdf->Cell(60, 10, 'Nome', 1);
    $pdf->Cell(30, 10, 'Matrícula', 1);
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
        $pdf->Cell(0, 10, 'Nenhum usuário encontrado.', 0, 1, 'C');
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
</head>
<body>
    <h1>Gerar Relatório</h1>
    <form action="gerar_relatorio.php" method="POST">
        <input type="submit" name="gerar_pdf" value="Gerar PDF">
    </form>
</body>
</html>
