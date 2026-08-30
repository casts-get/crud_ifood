<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Delivery</title>
</head>

<body>

    <h1>Sistema de Delivery</h1>

    <button type="button"
        onclick="window.location.href='public/clientes/add_cliente.php'">
        Cadastrar Cliente
    </button>

    <button type="button"
        onclick="window.location.href='public/restaurantes/add_restaurante.php'">
        Cadastrar Restaurante
    </button>

    <button type="button"
        onclick="window.location.href='public/pedidos/add_pedido.php'">
        Cadastrar Pedido
    </button>

    <br><br>

    <h2>Lista de Clientes</h2>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>

        <?php

        include 'infra/conexao.php';

        $sql = "SELECT * FROM clientes";
        $clientes = $conn->query($sql);

        while ($cliente = $clientes->fetch_assoc()) {

        ?>

            <tr>

                <td><?php echo $cliente['id']; ?></td>

                <td><?php echo $cliente['nome']; ?></td>

                <td><?php echo $cliente['email']; ?></td>

                <td><?php echo $cliente['telefone']; ?></td>

                <td><?php echo $cliente['endereco']; ?></td>

                <td>

                    <button type="button"
                        onclick="window.location.href='public/clientes/edit_cliente.php?id=<?php echo $cliente['id']; ?>'">
                        Editar
                    </button>

                    <button type="button"
                        onclick="if (confirm('Tem certeza que deseja excluir este cliente?')) { window.location.href='public/clientes/delete_cliente.php?id=<?php echo $cliente['id']; ?>'; }">
                        Excluir
                    </button>

                </td>

            </tr>

        <?php
        }
        ?>

    </table>


    <h2>Lista de Restaurantes</h2>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>

        <?php

        $sql = "SELECT * FROM restaurantes";
        $restaurantes = $conn->query($sql);

        while ($restaurante = $restaurantes->fetch_assoc()) {

        ?>

            <tr>

                <td><?php echo $restaurante['id']; ?></td>

                <td><?php echo $restaurante['nome']; ?></td>

                <td><?php echo $restaurante['categoria']; ?></td>

                <td><?php echo $restaurante['telefone']; ?></td>

                <td><?php echo $restaurante['endereco']; ?></td>

                <td>

                    <button type="button"
                        onclick="window.location.href='public/restaurantes/edit_restaurante.php?id=<?php echo $restaurante['id']; ?>'">
                        Editar
                    </button>

                    <button type="button"
                        onclick="if (confirm('Tem certeza que deseja excluir este restaurante?')) { window.location.href='public/restaurantes/delete_restaurante.php?id=<?php echo $restaurante['id']; ?>'; }">
                        Excluir
                    </button>

                </td>

            </tr>

        <?php
        }
        ?>

    </table>


    <h2>Lista de Pedidos</h2>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Restaurante</th>
            <th>Data do Pedido</th>
            <th>Valor</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

        <?php

        $sql = "SELECT pedidos.*,
                       clientes.nome AS cliente_nome,
                       restaurantes.nome AS restaurante_nome
                FROM pedidos
                INNER JOIN clientes
                    ON pedidos.cliente_id = clientes.id
                INNER JOIN restaurantes
                    ON pedidos.restaurante_id = restaurantes.id";

        $pedidos = $conn->query($sql);

        while ($pedido = $pedidos->fetch_assoc()) {

        ?>

            <tr>

                <td><?php echo $pedido['id']; ?></td>

                <td><?php echo $pedido['cliente_nome']; ?></td>

                <td><?php echo $pedido['restaurante_nome']; ?></td>

                <td><?php echo $pedido['data_pedido']; ?></td>

                <td>R$ <?php echo number_format($pedido['valor'], 2, ',', '.'); ?></td>

                <td><?php echo $pedido['status']; ?></td>

                <td>

                    <button type="button"
                        onclick="window.location.href='public/pedidos/edit_pedido.php?id=<?php echo $pedido['id']; ?>'">
                        Editar
                    </button>

                    <button type="button"
                        onclick="if (confirm('Tem certeza que deseja excluir este pedido?')) { window.location.href='public/pedidos/delete_pedido.php?id=<?php echo $pedido['id']; ?>'; }">
                        Excluir
                    </button>

                </td>

            </tr>

        <?php
        }
        ?>

    </table>

</body>

</html>