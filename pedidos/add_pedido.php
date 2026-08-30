<?php

include '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cliente_id = $_POST['cliente_id'];
    $restaurante_id = $_POST['restaurante_id'];
    $data_pedido = $_POST['data_pedido'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];

    $sql = "INSERT INTO pedidos
            (cliente_id, restaurante_id, data_pedido, valor, status)
            VALUES
            ('$cliente_id', '$restaurante_id', '$data_pedido', '$valor', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Pedido cadastrado com sucesso!";
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
    <title>Adicionar Pedido</title>
</head>

<body>

    <h2>Adicionar Novo Pedido</h2>

    <form method="POST">

        <label>Cliente:</label>

        <select name="cliente_id" required>

            <option value="">Selecione o Cliente</option>

            <?php

            $sql = "SELECT id, nome FROM clientes";
            $clientes = $conn->query($sql);

            while ($cliente = $clientes->fetch_assoc()) {

            ?>

                <option value="<?php echo $cliente['id']; ?>">
                    <?php echo $cliente['nome']; ?>
                </option>

            <?php
            }
            ?>

        </select>

        <br><br>

        <label>Restaurante:</label>

        <select name="restaurante_id" required>

            <option value="">Selecione o Restaurante</option>

            <?php

            $sql = "SELECT id, nome FROM restaurantes";
            $restaurantes = $conn->query($sql);

            while ($restaurante = $restaurantes->fetch_assoc()) {

            ?>

                <option value="<?php echo $restaurante['id']; ?>">
                    <?php echo $restaurante['nome']; ?>
                </option>

            <?php
            }
            ?>

        </select>

        <br><br>

        <label for="data_pedido">Data do Pedido:</label>
        <input type="datetime-local" id="data_pedido" name="data_pedido" required>

        <br><br>

        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" step="0.01" required>

        <br><br>

        <label for="status">Status:</label>

        <select name="status" id="status" required>

            <option value="">Selecione o Status</option>
            <option value="Pendente">Pendente</option>
            <option value="Preparando">Preparando</option>
            <option value="Saiu para entrega">Saiu para entrega</option>
            <option value="Entregue">Entregue</option>
            <option value="Cancelado">Cancelado</option>

        </select>

        <br><br>

        <button type="submit">Cadastrar Pedido</button>

    </form>

    <br>

    <button type="button" onclick="window.location.href='../../index.php'">
        Voltar
    </button>

</body>

</html>