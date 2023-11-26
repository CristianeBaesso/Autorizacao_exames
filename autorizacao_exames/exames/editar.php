<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $exames= $_POST ['nome'];


    $sql = "UPDATE exames SET nome='$exames' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, nome FROM exames WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $exames = $result->fetch_assoc();
    } else {
        echo "Exame não encontrado!";
        exit;
    }
}

$conexao->close();
?>

<link rel="stylesheet" type="text/css" href="../css/adicionar.css">

<form method="post" action="editar.php">
    <input type="hidden" name="id" value="<?php echo $exames['id']; ?>">
    Exame: <input type="text" name="nome" value="<?php echo $exames['nome']; ?>"><br>
    <input type="submit" value="Salvar">
</form>