<?php

include '../../infra/conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = $id";
$clientes = $conn->query($sql);
$cliente = $clientes->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE clientes 
            SET nome='$nome',
                email='$email',
                telefone='$telefone',
                endereco='$endereco'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente atualizado com sucesso!";
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
    <title>Editar Cliente</title>
</head>

<body>

    <h2>Editar Cliente</h2>

    <form method="POST">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"
            value="<?php echo $cliente['nome']; ?>" required>

        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"
            value="<?php echo $cliente['email']; ?>" required>

        <br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone"
            value="<?php echo $cliente['telefone']; ?>">

        <br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco"
            value="<?php echo $cliente['endereco']; ?>" required>

        <br><br>

        <button type="submit">Editar Cliente</button>

    </form>

    <br>

    <button type="button" onclick="window.location.href='../../index.php'">
        Voltar
    </button>

</body>

</html>