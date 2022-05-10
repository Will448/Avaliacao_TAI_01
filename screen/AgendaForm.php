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
    <title>Document</title>
</head>

<body>
    <?php
    $objBD = new BD_agenda();
    $objBD->conn();

    if (!empty($_GET['id_agenda'])) {
        $result = $objBD->buscar($_GET['id_agenda']);
        $resultContato = $objBD->buscarContato( $result->convidado_id);
        //select * from usuario where id = ?
    }
    if (!empty($_POST)) {

        if (empty($_POST['id_agenda'])) {
            $objBD->inserir($_POST);
        } else {
            $objBD->update($_POST);
        }
        header("Location:./AgendaList.php");
    }
    
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    <h2>Formulário da Agenda</h2>
    <form action="./AgendaForm.php" method="post">
    <input type="hidden" name="id_agenda" value="<?php echo !empty($result->id_agenda) ? $result->id_agenda : "" ?>" /><br>
    <div>
    <label for="titulo">Título</label>
    <input type="text" class="form-control" name="titulo" placeholder="Reunião..." required value="<?php echo !empty($result->titulo) ? $result->titulo : "" ?>"/>
        </div>

        <div class="row">
    <div class="col">
      <label for="formGroupExampleInput">Data Inicio </label>
      <input type="date" class="form-control" name="data_inicio" placeholder="mm/dd/yyyy" value="<?php echo !empty($result->data_inicio) ? $result->data_inicio : "" ?>" />
    </div>
    <div class="col">
      <label for="formGroupExampleInput">Hora Inicio</label>
      <input type="time" class="form-control" name="hora_inicio" placeholder="--:-- --" value="<?php echo !empty($result->hora_inicio) ? $result->hora_inicio : "" ?>" />
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label for="formGroupExampleInput">Data Fim </label>
      <input type="date" class="form-control"  name="data_fim" placeholder="mm/dd/yyyy"value="<?php echo !empty($result->data_fim) ? $result->data_fim : "" ?>" />
    </div>
    <div class="col">
      <label for="formGroupExampleInput">Hora Fim</label>
      <input type="time" class="form-control" name="hora_fim" placeholder="--:-- --" value="<?php echo !empty($result->hora_fim) ? $result->hora_fim : "" ?>" />
    </div>
  </div>
  <div>
  <div>
    <label for="formGroupExampleInput">Local</label>
    <input type="text" name="lugar" value="<?php echo !empty($result->lugar) ? $result->lugar : "" ?>"/>
  </div>
  <div>
    <label for="validationTextarea">Descrição</label>
    <textarea class="form-control" id="validationTextarea" placeholder="Ponto de referência" name="descricao" value="<?php echo !empty($result->descricao) ? $result->descricao : "" ?>">
</textarea></br>
  </div>
  <div>
    <div>
      <label for="formGroupExampleInput">Contato Convidado</label>
      <label>Id do convidado</label>
        <input type="text" name="convidado_id" value="<?php echo !empty($result->convidado_id) ? $result->convidado_id : "" ?>" /><br>
        <select name="convidado">
            
            <option></option>
    </div>
    </div>
</select>
<button type= "submit" class="btn btn-success" value="Salvar"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
    </form>
    <button href="./AgendaList.php" > Voltar </button>
</body>

</html>