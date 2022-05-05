<?php
include "../database/bd_agenda.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $objBD = new BD_agenda();
    $objBD->conn();

    if (!empty($_GET['id'])) {
        $result = $objBD->buscar($_GET['id_agenda']);
        //select * from usuario where id = ?
    }
    if (!empty($_POST)) {

        if (empty($_POST['id_agenda'])) {
            $objBD->inserir($_POST);
        } else {
            $objBD->update($_POST);
        }
        header("Location: ./AgendaList.php");
    }
    ?>
    <h2>Formulário da Agenda</h2>
    <form action="./AgendaForm.php" method="post">
        <input type="hidden" name="id_agenda" value="<?php echo !empty($result->id_agenda) ? $result->id_agenda : "" ?>" /><br>

        <label>Titulo</label>
        <input type="text" name="titulo" value="<?php echo !empty($result->titulo) ? $result->titulo : "" ?>" /><br>

        <label>Data de inicio</label>
        <input type="date" name="data_inicio" value="<?php echo !empty($result->data_inicio) ? $result->data_inicio : "" ?>" /><br>

        <label>Hora de inicio</label>
        <input type="time" name="hora_inicio" value="<?php echo !empty($result->hora_inicio) ? $result->hora_inicio : "" ?>" /><br>

        <label>Data de fim</label>
        <input type="date" name="data_fim" value="<?php echo !empty($result->data_fim) ? $result->data_fim : "" ?>" /><br>

        <label>Hora de fim</label>
        <input type="time" name="hora_fim" value="<?php echo !empty($result->hora_fim) ? $result->hora_fim : "" ?>" /><br>

        <label>lugar</label>
        <input type="text" name="lugar" value="<?php echo !empty($result->lugar) ? $result->lugar : "" ?>" /><br>

        <label>descriçao</label>
        <input type="text" name="descriçao" value="<?php echo !empty($result->descriçao) ? $result->descriçao : "" ?>" /><br>

        <label>Id do convidado</label>
        <input type="text" name="convidado_id" value="<?php echo !empty($result->convidado_id) ? $result->convidado_id : "" ?>" /><br>

        <input type="submit" value="Salvar" />
    </form>
    <a href="./AgendaList.php">Voltar</a> <br>
</body>

</html>