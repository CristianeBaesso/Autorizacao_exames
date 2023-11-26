<link rel="stylesheet" type="text/css" href="../css/adicionar.css">

<form method = "post" action= "adicionar.php">
    Nome do laboratório: <input type= "text" placeholder ="Digite o nome do laboratório"  name="laboratorio"> <br>
    Endereço: <input type= "text" placeholder ="Digite o endereço do laboratório" name= "endereco"><br>
    Telefone: <input type= "text" placeholder ="Digite o telefone"  name= "telefone"><br>
    <input type="submit" value="Adicionar">
</form>

<?php
    include '../conexao.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $laboratorio= $_POST ['laboratorio'];
        $endereco= $_POST ['endereco'];
        $telefone= $_POST ['telefone'];

        $sql_laboratorio=
        "INSERT INTO
            laboratorios
            (
                nome, endereco, telefone
            )
        VALUES
            (
                '$laboratorio','$endereco',' $telefone'
            )
        ";
var_dump($sql_laboratorio);
        if($conexao->query($sql_laboratorio) === TRUE) {
            header("Location: listar.php");
        } else {
            echo "Erro: ".$conexao->error;
        }
    }
    $conexao->close();


?>