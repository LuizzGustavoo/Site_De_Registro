<?php
session_start();
include_once('config.php');

if (isset($_SESSION['matricula'])) {
    $matricula = $_SESSION['matricula'];

    $sql = "UPDATE alunos SET tempo_logout = NOW() WHERE matricula = ?";
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param('s', $matricula);
        $stmt->execute();
        $stmt->close();
    }

    session_unset();
    session_destroy();
    header('Location: home.php');
    exit;
} else {
    header('Location: home.php');
    exit;
}

$conexao->close();
?>
