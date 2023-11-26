<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sql = "DELETE FROM pacientes WHERE id=$id";
    try {
        
        $conexao->query($sql);
        
        header("Location: listar.php");

    } catch (Exception $e) {
        echo "Erro ao deletar: " . $conexao->error;
        echo '<br><br> <a href="http://localhost/autorizacao_exames/home/index">Voltar</a>';
        //echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    
}

$conexao->close();
?>
