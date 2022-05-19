<?php
include "../database/bd_contato.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>ListaContato</title>
</head>

<body>
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="../index.php">Sis Agenda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Início <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../screens/listagemagenda.php">Minha Agenda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../screens/listagemcontato.php">Meus Contatos</a>
      </li>
    </ul>
  </div>
</nav>
    <br>
    <h2 class="display-5" style= "text-align: center">Listagem dos contatos</h2>
    <br>
    <form action="./ContatoList.php" method="post">

    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" name="nome" placeholder="Pesquisar" href="./ContatoList.php" aria-label="Pesquisar">
     <div class="col-auto my-1">
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Tipo</option>
        <option value="1">Tipo</option>
        <option value="2">Nome</option>
      </select>
     </div>
  </form>
      <button type="submit" class="btn btn-outline-success" href="./ContatoList.php"> <i class="fa-solid fa-magnifying-glass plus"></i> Buscar</button> <br>
        <a type="button" class="btn btn-info" href="./ContatoForm.php"> <i class="fa-solid fa-plus plus"></i> Cadastrar</a>
  </div>
    <br>
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
?>
<br>
     <table class="table table-striped">
  <thead>
        <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Telefone 1</th>
      <th scope="col">Tipo Telefone 1</th>
      <th scope="col">Telefone 2</th>
      <th scope="col">Tipo Telefone 2</th>
      <th scope="col">Email</th>
      <th> </th>
      <th scope="col">Editar</th>
      <th scope="col">Deletar</th>
        </tr>
    </thead>
         
            <?php
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

            <td><a href='./ContatoForm.php?id_contato=" . $item['id_contato'] . "'><i class='fa-solid fa-pen-to-square orange'></i></a></td>
            
            <td><a href='./ContatoList.php?id_contato=" . $item['id_contato'] . "'
                onclick=\"return confirm('Deseja realmente remover o registro permanentemente?') \" ><i class='fa-solid fa-trash red'></i></a></td>
        </tr>";
    }
    echo "</table>";
    ?>

 <a href="../index.php"><button type="button" class="btn btn-info" >Voltar   <i class="fa-solid fa-circle-arrow-left"></i></button></a>

    <body>
       <style>
body {
  margin: 1px 1px 1px 3px;
  background-color: #e6f7ff;
}

</style>
</body>

</html>