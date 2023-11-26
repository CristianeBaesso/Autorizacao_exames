<?php

include '../conexao.php';
    $sql = "SELECT a.id,p.nome AS pacientes, 
            lab.nome AS laboratorios, 
            e.nome AS exames,
            a.criado_em AS data_autorizacao
            from autorizacao as a 
        LEFT JOIN laboratorios as lab ON a.laboratorios = lab.id
        LEFT JOIN pacientes as p ON a.pacientes = p.id
        LEFT JOIN exames as e ON a.exames = e.id";

    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <title>Autorizações de Exames</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>


<link rel="stylesheet" type="text/css" href="../css/style.css">


    
        <nav>
            <ul>
                <h1>Autorizações</h1>
                <li><a href="adicionar.php">Adicionar Nova Autorização de Exames</a></li>
                <li><a href="http://localhost/autorizacao_exames/home/index">Ir para a página principal</a></li>
            </ul>
        </nav>
    
<body>   
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Data da Autorização</th>
                <th>Exame</th>
                <th>Paciente</th>
                <th>Laboratório</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["data_autorizacao"] . "</td>";
                    echo "<td>" . $row["exames"] . "</td>";
                    echo "<td>" . $row["pacientes"] . "</td>";
                    echo "<td>" . $row["laboratorios"] . "</td>";
                    echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editar</a> | 
                    <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Sem Autorizações</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
<footer>
    
    <p>Secretaria Municipal de Saúde de Serafina Corrêa</p> 
    <p>Rua Costa e Silva, 703, Centro, Serafina Corrêa/RS</p>   
    <p>Telefone: 54-3444-1136</p>  
  
</footer>
</html>

<?php $conexao->close(); ?>
