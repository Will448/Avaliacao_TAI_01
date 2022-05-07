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
    <?php
//$tipo_telefone = 'casa, comercial, celular, principal ';


    $objBD = new BD_contato();
    $objBD->conn();

    if (!empty($_GET['id_contato'])) {
        $result = $objBD->buscar($_GET['id_contato']);
        //select * from usuario where id = ?
    }
    if (!empty($_POST)) {

        if (empty($_POST['id_contato'])) {
            $objBD->inserir($_POST);
        } else {
            $objBD->update($_POST);
        }
        header("Location: ./ContatoList.php");
    }
    ?>
    <h2>Formulário do Contato</h2>
    <form action="./ContatoForm.php" method="post">
        <input type="hidden" name="id_contato" value="<?php echo !empty($result->id_contato) ? $result->id_contato : "" ?>" /><br>

        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo !empty($result->nome) ? $result->nome : "" ?>" /><br>

        <label>Sobrenome</label>
        <input type="text" name="sobrenome" value="<?php echo !empty($result->sobrenome) ? $result->sobrenome : "" ?>" /><br>

        <label>Primeiro telefone</label>
        <input type="text" name="telefone1" value="<?php echo !empty($result->telefone1) ? $result->telefone1 : "" ?>" /><br>

        <label>Tipo do primneiro telefone</label>
        <input type="text" name="tipo_telefone1" value="<?php /*if($tipo_telefone1 == $tipo_telefone)*/ echo !empty($result->tipo_telefone1) ? $result->tipo_telefone1 : "" ?>" /><br>

        <label>Segundo telefone</label>
        <input type="text" name="telefone2" value="<?php echo !empty($result->telefone2) ? $result->telefone2 : "" ?>" /><br>

        <label>Tipo do primneiro telefone</label>
        <input type="text" name="tipo_telefone2" value="<?php echo !empty($result->tipo_telefone2) ? $result->tipo_telefone2 : "" ?>" /><br>

        <label>Email</label>
        <input type="text" name="email" value="<?php echo !empty($result->email) ? $result->email : "" ?>" /><br>
            <br>
        <input type="submit" value="Salvar" />
    </form>
    <a href="./ContatoList.php">Voltar</a> <br>
</body>

</html>