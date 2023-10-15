<?php
// Conectar ao banco de dados (substitua as informações de conexão conforme necessário)
$host = 'localhost';
$usuario = 'seu_usuario';
$senha = 'sua_senha';
$banco = 'seu_banco';

$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Coletar os dados do formulário
$id_estacao = $_POST['id_estacao'];
$id_usuario = $_POST['id_usuario'];

// Inserir os dados na tabela
$sql = "INSERT INTO leituras_clima (id_estacao, id_usuario) VALUES (?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ii", $id_estacao, $id_usuario);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso.";
} else {
    echo "Erro ao cadastrar os dados: " . $conexao->error;
}

// Fechar a conexão
$stmt->close();
$conexao->close();
?>
