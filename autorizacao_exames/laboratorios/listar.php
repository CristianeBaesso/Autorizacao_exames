<?php
include '../conexao.php';

$sql = "SELECT id, nome, endereco, telefone FROM laboratorios";
$result = $conexao->query($sql);
?>
 

 <head> 
        <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>



<nav>
    <h1>Laboratórios</h1>
    <a href="adicionar.php">Adicionar Novo Laboratório</a>
    <a href="http://localhost/autorizacao_exames/home/index">Ir para a página principal</a>
</nav>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
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
                echo "<td>" . $row["endereco"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td><a href='editar.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Não existem Laboratórios</td></tr>";
        }
        ?>
    </tbody>
</table>
<footer>
    
    <p>Secretaria Municipal de Saúde de Serafina Corrêa</p> 
    <p>Rua Costa e Silva, 703, Centro, Serafina Corrêa/RS</p>   
    <p>Telefone: 54-3444-1136</p>  
  
</footer>

<?php
$conexao->close();
?>