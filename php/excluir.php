<?php

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar se o formulário de confirmação foi enviado
    if (isset($_POST['confirmar'])) {
        if ($_POST['confirmar'] === 'Sim') {
            // Conectar ao banco de dados e executar a exclusão
           // $host = 'localhost';
           // $usuario = 'seu_usuario';
           // $senha = 'sua_senha';
           // $banco = 'seu_banco';

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
            echo "Exclusão cancelada. <a href='listagem.php'>Voltar para a lista</a>";
        }
    } else {
        // Exibir formulário de confirmação
        echo "Tem certeza de que deseja excluir este registro?<br>";
        echo "<form method='POST'>";
        echo "<input type='submit' name='confirmar' value='Sim'>";
        echo "<input type='submit' name='confirmar' value='Não'>";
        echo "</form>";
    }
} else {
    echo "ID de registro não fornecido.";
}
?>
