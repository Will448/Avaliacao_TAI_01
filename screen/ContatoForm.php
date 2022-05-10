<?php
include "../database/bd_contato.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>ContatoForm</title>
    <link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body> 

<?php

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

<nav class="navbar navbar-dark bg-primary">
   <a class="navbar-brand" href="#"></a>
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

    <h2>Formulário do Contato</h2>
    <form action="./ContatoForm.php" method="post">
    <input type="hidden" name="id_contato" value="<?php echo !empty($result->id_contato) ? $result->id_contato : "" ?>" /><br>
          <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo !empty($result->nome) ? $result->nome : "" ?>"/><br>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome" value="<?php echo !empty($result->sobrenome) ? $result->sobrenome : "" ?>" /><br>
    </div>
   </div>
   <div class="form-row">
    <div class="col-auto my-1">
      <input type="text" class="form-control" placeholder="Primeiro telefone" name="telefone1" value="<?php echo !empty($result->telefone1) ? $result->telefone1 : "" ?>" /><br>
      </div>
    <div class="col-auto my-1">
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected name="tipo_telefone1" value="<?php /*if($tipo_telefone1 == $tipo_telefone)*/ echo !empty($result->tipo_telefone1) ? $result->tipo_telefone1 : "" ?>">Tipo Telefone 01</option><br>
        <option value="1">Casa</option>
        <option value="2">Celular</option>
        <option value="3">Comercial</option>
        <option value="4">Principal</option>
      </select>
    </div>
    <div class="form-row">
    <div class="col-auto my-1">
      <input type="text" class="form-control" placeholder="Telefone 02" name="telefone2" value="<?php echo !empty($result->telefone2) ? $result->telefone2 : "" ?>" />><br>
      </div>
    <div class="col-auto my-1">
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected name="tipo_telefone2" value="<?php echo !empty($result->tipo_telefone2) ? $result->tipo_telefone2 : "" ?>">Tipo Telefone 02</option><br>
        <option value="1">Casa</option>
        <option value="2">Celular</option>
        <option value="3">Comercial</option>
        <option value="4">Principal</option>
      </select>
    </div>
    </div>
  <br>
  <div class="col my-1">
      <input type="email" class="form-control" id="colFormLabel" placeholder="nome@exemplo.com" name="email" value="<?php echo !empty($result->email) ? $result->email : "" ?>" /><br>
    </div>
    </div>
   
    <button type= "submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>    
</form>
<br>
<button type="button" class="btn btn-info" href="ContatoList.php"><i class="fa-solid fa-circle-arrow-left"></i> Voltar</button>
  
</body>

</html>