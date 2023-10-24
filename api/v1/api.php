<?php
// Inclua o código de conexão aqui
 include 'config.php';

// Estabelecer a conexão
$conn = new mysqli($hostname, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Defina o cabeçalho para permitir solicitações de qualquer origem (CORS)
header("Access-Control-Allow-Origin: *");

// Verifique o método da solicitação HTTP
if ($_SERVER["REQUEST_METHOD"] === "GET") {
// Endpoint para buscar todos os registros
    if (isset($_GET['action']) && $_GET['action'] === 'get_all') {
        $sql = "SELECT * FROM leituras_clima";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            echo json_encode($rows);
        } else {
            echo "Nenhum registro encontrado.";
        }
    }
    
    // Endpoint para buscar um registro por ID
    elseif (isset($_GET['action']) && $_GET['action'] === 'get_by_id') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM leituras_clima WHERE id = $id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo json_encode($row);
            } else {
                echo "Nenhum registro encontrado para o ID especificado.";
            }
        } else {
            echo "ID não especificado.";
        }
    } else {
        echo "Ação não suportada.";
    }
} else {
    echo "Método não suportado.";
}

// Feche a conexão
$conn->close();
?>
