<?php

include '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "INSERT INTO restaurantes (nome, categoria, telefone, endereco)
            VALUES ('$nome', '$categoria', '$telefone', '$endereco')";

    if ($conn->query($sql) === TRUE) {
        echo "Restaurante cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Restaurante</title>
</head>

<body>

    <h2>Adicionar Novo Restaurante</h2>

    <form method="POST">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required>

        <br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone">

        <br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>

        <br><br>

        <button type="submit">Cadastrar Restaurante</button>

    </form>

    <br>

    <button type="button" onclick="window.location.href='../../index.php'">
        Voltar
    </button>

</body>

</html>