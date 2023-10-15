<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Leituras do Clima</title>
</head>
<body>
    <h1>Listagem de Leituras do Clima</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Estação</th>
            <th>ID Usuário</th>
			<th>Estação Latitude</th>
			<th>Estação Longitude</th>
			<th>GPS Lat</th>
			<th>GPS Lon</th>
			<th>Data</th>
			<th>Hora</th>
			<th>Temperatura</th>
			<th>Umidade</th>
			<th>Direção Vento</th>
			<th>Velocidade Vento</th>
			<th>Solar UV</th>            
            <th>Ações</th>
        </tr>

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

        // Consultar os dados da tabela
        $sql = "SELECT * FROM leituras_clima";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha['id'] . "</td>";
                echo "<td>" . $linha['id_estacao'] . "</td>";
                echo "<td>" . $linha['id_usuario'] . "</td>";
				echo "<td>" . $linha['estacao_lat'] . "</td>";
				echo "<td>" . $linha['estacao_lon'] . "</td>";
				echo "<td>" . $linha['gps_lat'] . "</td>";
				echo "<td>" . $linha['gps_lon'] . "</td>";
				echo "<td>" . $linha['data'] . "</td>";
				echo "<td>" . $linha['hora'] . "</td>";
				echo "<td>" . $linha['temperatura'] . "</td>";
				echo "<td>" . $linha['umidade'] . "</td>";
				echo "<td>" . $linha['vento_dir'] . "</td>";
				echo "<td>" . $linha['vento_vel'] . "</td>";
				echo "<td>" . $linha['solar_uv'] . "</td>";        
                echo "<td>
                    <a href='editar.php?id=" . $linha['id'] . "'>Editar</a> |
                    <a href='excluir.php?id=" . $linha['id'] . "'>Excluir</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "Nenhum registro encontrado.";
        }

        // Fechar a conexão
        $conexao->close();
        ?>
    </table>

    <a href="incluir.php">Incluir Novo Registro</a>
</body>
</html>
