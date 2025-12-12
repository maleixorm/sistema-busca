<?php 
    include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Busca</title>
</head>
<body>
    <h1>Lista de Veículos</h1>
    <form action="" method="get">
        <input type="text" name="busca" placeholder="Digite os termos de pesquisa...">
        <button type="submit">Pesquisar</button>
    </form>
    <table border="1" width="400px">
        <tr>
            <th>Marca</th>
            <th>Veículo</th>
            <th>Modelo</th>
        </tr>
        <?php
        if (!isset($_GET['busca'])) { ?>
            <tr>
                <td colspan="3">Nada foi pesquisado até o momento...</td>
            </tr>
        <?php } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql = "SELECT * FROM veiculos WHERE marca LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%' OR veiculo LIKE '%$pesquisa%'";
            $query = $mysqli->query($sql) or die("Erro ao consultar o banco de dados: " . $mysqli->error);
            if ($query->num_rows == 0) { ?>
                <tr>
                    <td colspan="3">Nenhum resultado encontrado...</td>
                </tr>
            <?php } else { 
                while ($dados = $query->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $dados['marca'] ?></td>
                        <td><?= $dados['modelo'] ?></td>
                        <td><?= $dados['ano'] ?></td>
                    </tr>
                <?php }
                ?>
                
            <?php } ?>    
        <?php } ?>
    </table>
</body>
</html>