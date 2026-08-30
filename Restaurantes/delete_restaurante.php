<?php

$id = $_GET['id'];

include '../../infra/conexao.php';

$sql = "DELETE FROM restaurantes WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Restaurante excluído com sucesso!<br>";
    echo "<button type='button' onclick=\"window.location.href='../../index.php'\">Voltar</button>";
} else {
    echo "Erro ao excluir restaurante: " . $conn->error;
}

?>