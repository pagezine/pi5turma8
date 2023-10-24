<?php
// Informações de conexão com o banco de dados

$hostname = "hostname";
$username = "username";
$password = "password";
$database = "database";

// Conectar ao banco de dados
$conexao = new mysqli($hostname, $username, $password, $database);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
