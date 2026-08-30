<?php

$id = $_GET['id'];

include '../../infra/conexao.php';

$sql = "DELETE FROM pedidos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Pedido excluído com sucesso!<br>";
    echo "<button type='button' onclick=\"window.location.href='../../index.php'\">Voltar</button>";
} else {
    echo "Erro ao excluir pedido: " . $conn->error;
}

?>