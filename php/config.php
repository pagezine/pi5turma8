<?php
// Informações de conexão com o banco de dados
$hostname = 'localhost';    // Host do banco de dados
$username = 'seu_usuario';   // Nome de usuário do banco de dados
$password = 'sua_senha';    // Senha do banco de dados
$database = 'seu_banco';    // Nome do banco de dados

// Conectar ao banco de dados
$conexao = new mysqli($hostname, $username, $password, $database);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
