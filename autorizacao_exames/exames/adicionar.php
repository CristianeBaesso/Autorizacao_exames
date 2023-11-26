
<link rel="stylesheet" type="text/css" href="../css/adicionar.css">

<form method = "post" action= "adicionar.php">
    Nome do exame: <input type= "text" placeholder ="Digite o nome do exame"  name="exame"> <br>
    <input type="submit" value="Adicionar">
</form>

<?php
    include '../conexao.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $exame= $_POST ['exame'];


        $sql_exame=
        "INSERT INTO
            exames
            (
                nome
            )
        VALUES
            (
                '$exame'
            )
        ";
var_dump($sql_exame);
        if($conexao->query($sql_exame) === TRUE) {
            header("Location: listar.php");
        } else {
            echo "Erro: ".$conexao->error;
        }
    }
    $conexao->close();


?>