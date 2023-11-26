<?php
    include '../conexao.php';
?>

<link rel="stylesheet" type="text/css" href="../css/adicionar.css">

<form method = "post" action= "adicionar.php">
    Paciente:
    <select name="nome_paciente" id="pacientes">
        <option value="">Selecione o paciente</option>
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

    </select>
    Laboratório:
    <select name="nome_lab" id="lab">
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

    Exame:
    <select name="nome_exame" id="exame">
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
                ?>
    </select>

    <p>
        <input type="submit" value="Adicionar">
    </p>



</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pacientes = $_POST['nome_paciente'];
        $laboratorios = $_POST['nome_lab'];
        $exames = $_POST['nome_exame'];

        $sql_autorizacao = 
        "INSERT INTO 
            autorizacao (pacientes, laboratorios, exames) 
        VALUES 
            ('$pacientes', '$laboratorios', '$exames')";
            
        if ($conexao->query($sql_autorizacao) === TRUE) {
            header("Location: listar.php");
        } else {
            echo "Erro: " . $conexao->error;
        }
    }
    $conexao->close();
?>

