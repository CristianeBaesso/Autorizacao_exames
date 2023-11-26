<?php
include '../conexao.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome_laboratorio= $_POST ['nome'];
    $endereco= $_POST ['endereco'];
    $telefone= $_POST ['telefone'];
    
    

    $sql = "UPDATE laboratorios SET nome='$nome_laboratorio', endereco='$endereco', telefone='$telefone' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, nome, endereco, telefone FROM laboratorios WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $laboratorios = $result->fetch_assoc();
    } else {
        echo "Laboratório não encontrado!";
        exit;
    }
}

$conexao->close();
?>

<link rel="stylesheet" type="text/css" href="../css/adicionar.css">

<form method="post" action="editar.php">
    <input type="hidden" name="id" value="<?php echo $laboratorios['id']; ?>">
    Nome do laboratório: <input type= "text" name="nome"value="<?php echo $laboratorios['nome']; ?>"><br>
    Endereço: <input type= "text" name= "endereco"value="<?php echo $laboratorios['endereco']; ?>"><br>
    Telefone: <input type= "text" name= "telefone"value="<?php echo $laboratorios['telefone']; ?>"><br>
    <input type="submit" value="Salvar">
</form>
