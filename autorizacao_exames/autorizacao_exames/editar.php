<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $pacientes = $_POST['pacientes'];
    $laboratorios= $_POST['laboratorios'];
    $exames = $_POST['exames'];
    
    $sql = "UPDATE autorizacao SET pacientes='$pacientes', laboratorios='$laboratorios', exames='$exames' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    
    $sql = "SELECT a.id,
                p.nome AS pacientes, 
                p.id as idPaciente,
                lab.nome AS laboratorios, 
                lab.id AS idLaboratorio,
                e.nome AS exames,
                e.id AS idExame
                from autorizacao as a 
            LEFT JOIN laboratorios as lab ON a.laboratorios = lab.id
            LEFT JOIN pacientes as p ON a.pacientes = p.id
            LEFT JOIN exames as e ON a.exames = e.id
            WHERE a.id=$id";

    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $autorizacao = $result->fetch_assoc();
    } else {
        echo "Autorização não encontrada!";
        exit;
    }
}
?>

<link rel="stylesheet" type="text/css" href="../css/adicionar.css">

<form method="post" action="editar.php">
    <input type="hidden" name="id" value="<?php echo $autorizacao['id']; ?>">
    Paciente:
    <select name="pacientes" id="pacientes">
    <option value="<?php echo $autorizacao['idPaciente']; ?>"><?php echo $autorizacao['pacientes']; ?></option>
        <?php
            $sql_pacientes = 
                "SELECT id, nome 
                    FROM pacientes";
            $result_pacientes = $conexao->query($sql_pacientes);

            while ($row = $result_pacientes->fetch_assoc()) {
                $pacientes_id = $row['id'];
                $pacientes_nome = $row['nome'];
                echo "<option value='$pacientes_id'>$pacientes_nome</option>";
            }
        ?>
    </select><br>


    Laboratório:
    <select name="laboratorios" id="laboratorios">
    <option value="<?php echo $autorizacao['idLaboratorio']; ?>"><?php echo $autorizacao['laboratorios']; ?></option>
        <option value="">Selecione o laboratório</option>
        <?php
                    $sql_laboratorios = 
                        "SELECT id, nome 
                            FROM laboratorios";
                    $result_laboratorios = $conexao->query($sql_laboratorios);

                    while ($row = $result_laboratorios->fetch_assoc()) {
                        $laboratorios_id = $row['id'];
                        $laboratorios_nome = $row['nome'];
                        echo "<option value='$laboratorios_id'>$laboratorios_nome</option>";
                    }
                ?>
    </select>

    <select name="exames" id="exames">
    <option value="<?php echo $autorizacao['idExame']; ?>"><?php echo $autorizacao['exames']; ?></option>
        <option value="">Selecione o exame</option>
        <?php
                    $sql_exames = 
                        "SELECT id, nome 
                            FROM exames";
                    $result_exames = $conexao->query($sql_exames);

                    while ($row = $result_exames->fetch_assoc()) {
                        $exames_id = $row['id'];
                        $exames_nome = $row['nome'];
                        echo "<option value='$exames_id'>$exames_nome</option>";
                    }

                    $conexao->close();
                ?>
    </select>

    <input type="submit" value="Salvar">
</form>
