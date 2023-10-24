<?php
// Informações de conexão com o banco de dados

$servername = "67.23.238.114";
$username = "xyzetc_clima";
$password = "zaq12wsxcde3";
$database = "xyzetc_clima";

// Conectar ao banco de dados
$conexao = new mysqli($hostname, $username, $password, $database);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
