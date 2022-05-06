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
    <h2>Listagem Clientes</h2>
    <form action="./AgendaList.php" method="post">
        <input type="search" name="nome" placeholder="Pesquisar nome">
        <input type="submit" value="Pesquisar">
    </form>
    <a href="./AgendaForm.php">Cadastrar</a> <br>
    <?php
    $objBD = new BD_agenda();
    $objBD->conn();

    if (!empty($_POST['titulo'])) {
        $result = $objBD->pesquisar($_POST);
    } else {
        $result = $objBD->select();
    }

    if (!empty($_GET['id_agenda'])) {

        $objBD->remover($_GET['id_agenda']);
        header("location: AgendaList.php");
    }

    echo "<table>
                <tr>
                    <th>ID</th>
                    <th>titulo</th>
                    <th>data_inicio</th>
                    <th>hora_inicio</th>
                    <th>hora_fim</th>
                    <th>lugar</th>
                    <th>descricao</th>
                    <th>convidado_id</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            ";
    foreach ($result as $item) {
        echo "
        <tr>
            <td>" . $item['id_agenda'] . "</td>
            <tr><td>" . $item['titulo'] . "</td></tr>
            <td>" . $item['data_inicio'] . "</td>
            <td>" . $item['hora_inicio'] . "</td>
            <td>" . $item['data_fim'] . "</td>
            <td>" . $item['hora_fim'] . "</td>
            <td>" . $item['lugar'] . "</td>
            <td>" . $item['descricao'] . "</td>
            <td>" . $item['convidado_id'] . "</td>
            <td><a href='./AgendaForm.php?id_agenda=" . $item['id_agenda'] . "'>Editar</a></td>
            <td><a href='./AgendaList.php?id_agenda=" . $item['id_agenda'] . "'
                   onclick=\"return confirm('Deseja realmente remover o registro permanentemente?') \" >Deletar</a></td>
        </tr>";
    }
    echo "</table>";
    ?>

    <a href="../index.php">Voltar</a>
</body>

</html>