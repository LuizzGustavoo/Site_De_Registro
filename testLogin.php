<?php
session_start();

// Verificar se o usuário está logado e se existe uma matrícula na sessão
if(isset($_SESSION['matricula'])) {
    // Incluir o arquivo de configuração do banco de dados
    include_once('config.php');

    // Obter a matrícula do usuário da sessão
    $matricula = $_SESSION['matricula'];

    // Obter o tempo atual
    $tempo_logout = date('Y-m-d H:i:s');

    // Atualizar o tempo de logout na tabela de usuários
    $sql = "UPDATE usuários SET tempo_logout = '$tempo_logout' WHERE matricula = '$matricula'";
    $conexao->query($sql);
}

// Verificar se o formulário foi submetido e se os campos matricula e senha não estão vazios
if(isset($_POST['submit']) && !empty($_POST['matricula']) && !empty($_POST['senha'])) {

    // Incluir o arquivo de configuração do banco de dados
    include_once('config.php');

    // Obter matricula e senha do formulário
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    // Obter a data e hora atual
    $tempo_login = date('Y-m-d H:i:s');

    // Consulta SQL para verificar se há um usuário com a matrícula e senha fornecidas
    $sql = "SELECT * FROM usuários WHERE matricula = '$matricula' AND senha = '$senha'";

    // Executar a consulta
    $result = $conexao->query($sql);

    // Verificar se a consulta retornou algum resultado
    if(mysqli_num_rows($result) < 1) {
        // Redirecionar para a página de login se não houver usuário encontrado
        header('Location: login.php');
    } else {
        // Inserir o tempo de login na tabela de usuários
        $sql_insert = "UPDATE usuários SET tempo_login = '$tempo_login' WHERE matricula = '$matricula'";
        $conexao->query($sql_insert);

        // Redirecionar para a página do sistema se o usuário for encontrado
        header('Location: sistema.php');
    }

} else {
    // Redirecionar para a página de login se o formulário não foi submetido ou se matricula e senha estiverem vazios
    header('Location: login.php');
}

?>

