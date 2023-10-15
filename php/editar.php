<!DOCTYPE html>
<html>
<head>
    <title>Editar Leitura do Clima</title>
</head>
<body>
    <h1>Editar Leitura do Clima</h1>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Conectar ao banco de dados e consultar os detalhes do registro
        $host = 'localhost';
        $usuario = 'seu_usuario';
        $senha = 'sua_senha';
        $banco = 'seu_banco';

        $conexao = new mysqli($host, $usuario, $senha, $banco);

        if ($conexao->connect_error) {
            die("Erro de conexão: " . $conexao->connect_error);
        }

        $sql = "SELECT * FROM leituras_clima WHERE id = $id";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows == 1) {
            $linha = $resultado->fetch_assoc();
            // Exibir campos e formulário de edição
            // Formulário de edição pode incluir campos preenchidos com os valores atuais
        } else {
            echo "Registro não encontrado.";
        }

        // Fechar a conexão
        $conexao->close();
    } else {
        echo "ID de registro não fornecido.";
    }
    ?>
</body>
</html>
