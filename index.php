<?php 
    include("conexao.php");
    $pesquisa = isset($_GET['busca']);
    $sql = "SELECT * FROM veiculos WHERE fabricante LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%' OR veiculo LIKE '%$pesquisa%'";
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
    <form action="" method="post">
        <input type="text" name="busca" placeholder="Digite os termos de pesquisa...">
        <button type="submit">Pesquisar</button>
    </form>
    <table border="1" width="400px">
        <tr>
            <th>Marca</th>
            <th>Veículo</th>
            <th>Modelo</th>
        </tr>
        <tr>
            <td colspan="3">Nada foi pesquisado até o momento...</td>
        </tr>
    </table>
</body>
</html>