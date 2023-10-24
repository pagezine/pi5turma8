<?php
// Função para gerar um token aleatório
function generateToken($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';

    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $token;
}

// Gere e exiba quatro tokens aleatórios
for ($i = 0; $i < 4; $i++) {
    $token = generateToken();
    echo "Token $i: $token<br>";
}
?>