
<link rel="stylesheet" type="text/css" href="../css/adicionar.css">

<form method = "post" action= "adicionar.php">
    Nome do paciente: <input type= "text" placeholder ="Digite o nome do paciente"  name="paciente"> <br>
    Endereço: <input type= "text" placeholder ="Digite o endereço do paciente" name= "endereco"><br>
    Telefone: <input type= "text" placeholder ="Digite o telefone"  name= "telefone"><br>
    <input type="submit" value="Adicionar">
</form>

<?php
    include '../conexao.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $paciente= $_POST ['paciente'];
        $endereco= $_POST ['endereco'];
        $telefone= $_POST ['telefone'];

        $sql_paciente=
        "INSERT INTO
            pacientes
            (
                nome, endereco, telefone
            )
        VALUES
            (
                '$paciente','$endereco',' $telefone'
            )
        ";
var_dump($sql_paciente);
        if($conexao->query($sql_paciente) === TRUE) {
            header("Location: listar.php");
        } else {
            echo "Erro: ".$conexao->error;
        }
    }
    $conexao->close();


?>