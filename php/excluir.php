<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conectar ao banco de dados e executar a exclusão
    $host = 'localhost';
    $usuario = 'seu_usuario';
    $senha = 'sua_senha';
    $banco = 'seu_banco';

    $conexao = new mysqli($host, $usuario, $senha, $banco);

    if ($conexao->connect_error) {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    $sql = "DELETE FROM leituras_clima WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: listagem.php");
    } else {
        echo "Erro ao excluir o registro: " . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();
} else {
    echo "ID de registro não fornecido.";
}
?>
