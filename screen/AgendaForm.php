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
    <title>AgendaFormulario</title>
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
   <h1 class="display-5" style= "text-align: center">Formulário da agenda</h1>
  <br>
    <form action="./AgendaForm.php" method="post">
    <input type="hidden" name="id_agenda" value="<?php echo !empty($result->id_agenda) ? $result->id_agenda : "" ?>" /><br>
    <div>
    <label for="titulo" style="color: rgb(255, 136, 0)"><font size="4">Título</font></label>
    <input type="text" class="form-control" name="titulo" placeholder="Reunião..." required value="<?php echo !empty($result->titulo) ? $result->titulo : "" ?>"/>
        </div>

        <div class="row">
    <div class="col">
      <label for="formGroupExampleInput" style="color: rgb(255, 136, 0)"><font size="4">Data de Inicio</font> </label>
      <input type="date" class="form-control" name="data_inicio" placeholder="mm/dd/yyyy" value="<?php echo !empty($result->data_inicio) ? $result->data_inicio : "" ?>" />
    </div>
    <div class="col">
      <label for="formGroupExampleInput" style="color: rgb(255, 136, 0)"><font size="4">Hora de Inicio</font></label>
      <input type="time" class="form-control" name="hora_inicio" placeholder="--:-- --" value="<?php echo !empty($result->hora_inicio) ? $result->hora_inicio : "" ?>" />
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label for="formGroupExampleInput" style="color: rgb(255, 136, 0)"><font size="4">Data Fim</font> </label>
      <input type="date" class="form-control"  name="data_fim" placeholder="mm/dd/yyyy"value="<?php echo !empty($result->data_fim) ? $result->data_fim : "" ?>" />
    </div>
    <div class="col">
      <label for="formGroupExampleInput"style="color: rgb(255, 136, 0)"><font size="4">Hora do fim</font></label>
      <input type="time" class="form-control" name="hora_fim" placeholder="--:-- --" value="<?php echo !empty($result->hora_fim) ? $result->hora_fim : "" ?>" />
    </div>
  </div>
  <div>
  <div>
    <label for="formGroupExampleInput" style="color: rgb(255, 136, 0)"><font size="4">Local</font></label>
    <input type="text" name="lugar" value="<?php echo !empty($result->lugar) ? $result->lugar : "" ?>"/>
  </div>
  <div>
    <label for="validationTextarea" style="color: rgb(255, 136, 0)"><font size="4">Ponto de referência</font></label>
    <textarea class="form-control" id="validationTextarea" placeholder="Ponto de referência" name="descricao" value="<?php echo !empty($result->descricao) ? $result->descricao : "" ?>">
</textarea></br>
  </div>
  <div>
    <div>
      <label for="formGroupExampleInput"style="color: rgb(255, 136, 0)"><font size="4">Id do convidado</font></label>
        <input type="text" name="convidado_id" value="<?php echo !empty($result->convidado_id) ? $result->convidado_id : "" ?>" /><br>
    </div>
    </div>
</select>
<button type= "submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>    
    </form>
    <a href="./AgendaList.php"><button type="button" class="btn btn-info" >Voltar   <i class="fa-solid fa-circle-arrow-left"></i></button></a>
  
    <style>
body {
  margin: 1px 1px 1px 3px;
  background-color: #dcc3f4;
}

</style>
</body>

</html>