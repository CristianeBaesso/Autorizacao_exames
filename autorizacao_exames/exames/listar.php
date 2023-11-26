<?php
include '../conexao.php';

$sql = "SELECT id, nome FROM exames";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barra de Navegação Horizontal</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

<link rel="stylesheet" type="text/css" href="../css/style.css">



<nav>

    <ul>
        <h1>Exames</h1>
        <li><a href="adicionar.php">Adicionar Novo Exame</a></li>
        <li><a href="http://localhost/autorizacao_exames/home/index">Ir para a página principal</a></li>
    </ul>

</nav>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Não existem Exames</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <footer>
        <p>Secretaria Municipal de Saúde de Serafina Corrêa</p> 
        <p>Rua Costa e Silva, 703, Centro, Serafina Corrêa/RS</p>   
        <p>Telefone: 54-3444-1136</p>    
    </footer>
    

</html>

<?php
$conexao->close();
?>