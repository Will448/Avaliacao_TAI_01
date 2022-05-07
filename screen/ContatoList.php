<?php
include "../database/bd_contato.php";
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
    <h2>Listagem de contatos</h2>
    <form action="./ContatoList.php" method="post">
        <input type="search" name="nome" placeholder="Pesquisar nome">
        <input type="submit" value="Pesquisar">
    </form>
    <a href="./ContatoForm.php">Cadastrar</a> <br>
    <?php

    $objBD = new BD_contato();
    $objBD->conn();

    if (!empty($_POST['nome'])) {
        $result = $objBD->pesquisar($_POST);
    } else {
        $result = $objBD->select();
    }

    if (!empty($_GET['id_contato'])) {

        $objBD->remover($_GET['id_contato']);
        header("location: ContatoList.php");
    }

    echo "<table>
                <tr>
                    <th>ID</th>
                    <th>nome</th>
                    <th>sobrenome</th>
                    <th>telefone1</th>
                    <th>tipo_telefone1</th>
                    <th>telefone2</th>
                    <th>tipo_telefone2</th>
                    <th>email</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            ";
    foreach ($result as $item) {
        echo "
        <tr>
            <td>" . $item['id_contato'] . "</td>
            <td>" . $item['nome'] . "</td>
            <td>" . $item['sobrenome'] . "</td>
            <td>" . $item['telefone1'] . "</td>
            <td>" . $item['tipo_telefone1'] . "</td>
            <td>" . $item['telefone2'] . "</td>
            <td>" . $item['tipo_telefone2'] . "</td>
            <td>" . $item['email'] . "</td>
            <td><br></td>
            <td><a href='./ContatoForm.php?id_contato=" . $item['id_contato'] . "'>Editar</a></td>
            <td><a href='./ContatoList.php?id_contato=" . $item['id_contato'] . "'
                   onclick=\"return confirm('Deseja realmente remover o registro permanentemente?') \" >Deletar</a></td>
        </tr>";
    }
    echo "</table>";
    ?>

    <a href="../index.php">Voltar</a>
</body>

</html>