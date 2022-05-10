<?php
include "../database/bd_agenda.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>AgendaLista</title>
</head>

<body>
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="../index.php">Sis Agenda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Início <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../screen/AgendaList.php">Minha Agenda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../screen/ContatoList.php">Meus Contatos</a>
      </li>
    </ul>
  </div>
</nav>
</button>
<br>
       <h2 class="display-5" style= "text-align: center">Listagem das Agendas</h2>
    <br>
    <form action="./AgendaList.php" method="post">

    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="titulo" type="search" href="./AgendaList.php" placeholder="Pesquisar" aria-label="Pesquisar">
     <div class="col-auto my-1">
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Tipo</option>
        <option value="1">Tipo</option>
        <option value="2">Título</option>
      </select>
    </div>
       <button type="submit" class="btn btn-outline-success"  href="./AgendaList.php"> <i class="fa-solid fa-magnifying-glass plus"></i> Buscar</button> 
           <a type="button" class="btn btn-primary" href="./AgendaForm.php"> <i class="fa-solid fa-plus plus"></i> Cadastrar</a>
  </div>
    </form>

    <?php
    $objBD = new BD_agenda();
    $objBD->conn();

    if (!empty($_POST['titulo'])) {
        $result = $objBD->pesquisar($_POST);
      //  var_dump($result);
        //exit;
    } else {
        $result = $objBD->select();
    }

    if (!empty($_GET['id_agenda'])) {

        $objBD->remover($_GET['id_agenda']);
        header("location: ./AgendaList.php");
    }
?>
    <br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Título</th>
        <th scope="col">Data Inicio</th>
        <th scope="col">Hora Inicio 1</th>
        <th scope="col">Data Fim</th>
        <th scope="col">Hora Fim</th>
        <th scope="col">Local</th>
        <th scope="col">Descrição</th>
        <th scope="col">Convidado</th>
        <th scope="col">Editar</th>
        <th scope="col">Apagar</th>
      </tr>
    </thead>
    
    <?php       

    foreach ($result as $item) {
        echo "
        <tr>
            <td>" . $item['id_agenda'] . "</td>
            <td>" . $item['titulo'] . "</td>
            <td>" . $item['data_inicio'] . "</td>
            <td>" . $item['hora_inicio'] . "</td>
            <td>" . $item['data_fim'] . "</td>
            <td>" . $item['hora_fim'] . "</td>
            <td>" . $item['lugar'] . "</td>
            <td>" . $item['descricao'] . "</td>
            <td>" . $item['convidado_id'] . "</td>
            <td><a href='./AgendaForm.php?id_agenda=" . $item['id_agenda'] . "'><i class='fa-solid fa-pen-to-square orange'></i></a></td>
            <td><a href='./AgendaList.php?id_agenda=" . $item['id_agenda'] . "'
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