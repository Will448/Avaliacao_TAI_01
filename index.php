<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>SisAgenda</title>
  
  <link href="style.css" rel="stylesheet" type="text/css" />
 
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <body>
  

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        <a class="nav-link" href="./screen/AgendaList.php">Minha Agenda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./screen/ContatoList.php">Meus Contatos</a>
      </li>
    </ul>
  </div>
</nav>

<br>
 <h1 class="display-4"style= "text-align: center">Telas</h1>
    <br>

 <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
         <span style= "color: Blue;">
          <div style="text-align: left;">
        <i class="fa-solid fa-circle-user fa-10x borda" ></i>
          </div>
         </span>
       <h5 class="card-title">Meus Contatos</h5>
        <p class="card-text">Cadastre e Gerencie todos os seus contatos</p>
        <button><a href="./screen/ContatoList.php" class="btn btn-info">Ver</a></button>
        </div>
      </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
           <span style= "color: Blue;">
          <div style="text-align: left;">
     <img src= 'img/agendamento.png' width='150'>
          </div>
         </span>
       <h5 class="card-title">Minha Agenda</h5>
        <p class="card-text">Cadastre e Gerencie todos os seus compromissos na sua Agenda</p>
        <button><a href="./screen/AgendaList.php" class="btn btn-info">Ver</a></button>
        </div>
      </div>
    </div>
      </div>
  <script src="script.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://kit.fontawesome.com/243aaa6612.js" crossorigin="anonymous"></script>

  <style>
body {
    background-color: #cefcec;
}
</style>

</body>
</html>