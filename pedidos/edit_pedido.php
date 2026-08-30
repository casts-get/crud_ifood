<?php

include '../../infra/conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM pedidos WHERE id = $id";
$resultado = $conn->query($sql);
$pedido = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cliente_id = $_POST['cliente_id'];
    $restaurante_id = $_POST['restaurante_id'];
    $data_pedido = $_POST['data_pedido'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];

    $sql = "UPDATE pedidos
            SET cliente_id='$cliente_id',
                restaurante_id='$restaurante_id',
                data_pedido='$data_pedido',
                valor='$valor',
                status='$status'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Pedido atualizado com sucesso!";
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
    <title>Editar Pedido</title>
</head>

<body>

    <h2>Editar Pedido</h2>

    <form method="POST">

        <label>Cliente:</label>

        <select name="cliente_id" required>

            <?php

            $sql = "SELECT id, nome FROM clientes";
            $clientes = $conn->query($sql);

            while ($cliente = $clientes->fetch_assoc()) {

            ?>

                <option value="<?php echo $cliente['id']; ?>"
                    <?php if ($pedido['cliente_id'] == $cliente['id']) echo 'selected'; ?>>

                    <?php echo $cliente['nome']; ?>

                </option>

            <?php
            }
            ?>

        </select>

        <br><br>

        <label>Restaurante:</label>

        <select name="restaurante_id" required>

            <?php

            $sql = "SELECT id, nome FROM restaurantes";
            $restaurantes = $conn->query($sql);

            while ($restaurante = $restaurantes->fetch_assoc()) {

            ?>

                <option value="<?php echo $restaurante['id']; ?>"
                    <?php if ($pedido['restaurante_id'] == $restaurante['id']) echo 'selected'; ?>>

                    <?php echo $restaurante['nome']; ?>

                </option>

            <?php
            }
            ?>

        </select>

        <br><br>

        <label>Data do Pedido:</label>
        <input type="datetime-local"
            name="data_pedido"
            value="<?php echo date('Y-m-d\TH:i', strtotime($pedido['data_pedido'])); ?>"
            required>

        <br><br>

        <label>Valor:</label>
        <input type="number"
            name="valor"
            step="0.01"
            value="<?php echo $pedido['valor']; ?>"
            required>

        <br><br>

        <label>Status:</label>

        <select name="status" required>

            <option value="Pendente" <?php if ($pedido['status'] == 'Pendente') echo 'selected'; ?>>
                Pendente
            </option>

            <option value="Preparando" <?php if ($pedido['status'] == 'Preparando') echo 'selected'; ?>>
                Preparando
            </option>

            <option value="Saiu para entrega" <?php if ($pedido['status'] == 'Saiu para entrega') echo 'selected'; ?>>
                Saiu para entrega
            </option>

            <option value="Entregue" <?php if ($pedido['status'] == 'Entregue') echo 'selected'; ?>>
                Entregue
            </option>

            <option value="Cancelado" <?php if ($pedido['status'] == 'Cancelado') echo 'selected'; ?>>
                Cancelado
            </option>

        </select>

        <br><br>

        <button type="submit">Editar Pedido</button>

    </form>

    <br>

    <button type="button" onclick="window.location.href='../../index.php'">
        Voltar
    </button>

</body>

</html>