<?php
session_start();
if (isset($_SESSION['tipo'])) {
  if ($_SESSION['tipo'] != "ADMIN") {
    header("location: login_admin.php");
  }
} else {
  header("location: login_admin.php");
}

?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Início Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="../../../frontend/css/index.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>
  <nav class="nav-extended">
    <div></div>
    <div class="nav-wrapper">
      <a href="./starter_admin.php" class="brand-logo"><img src="../../../frontend/img/logo.png" /></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./starter_admin.php">Inicio</a></li>

        <li><a class="dropdown-trigger" href="#!" data-target="dropdown">Perfil<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Excluir<i class="material-icons right">arrow_drop_down</i></a></li>
        <li>
          <a style="display: flex; flex-direction: row" href="../../../home.html">
            <i class="material-icons">exit_to_app</i>Logout</a>
        </li>
      </ul>
    </div>
    <ul id="dropdown" class="dropdown-content" style="text-align: justify;">
      <li><a href="./editar_admin.php">Editar meu cadastro</a></li>
      <li><a href="./form_admin.php">Adicionar novo admin</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content" style="text-align: justify;">
      <li><a href="./exclui_med.php">Médico</a></li>
      <li><a href="./exclui_lab.php">Laboratório</a></li>
      <li><a href="./exclui_pac.php">Paciente</a></li>

    </ul>

    <div class="nav-content">

    </div>
    <div class="nav-content">
      <span class="nav-title"></span>
      <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal" href="./cadastro.php">
        <i class="material-icons">add</i>
      </a>
    </div>
  </nav>
  <div class="center" style="font-size: 30px;margin-top:20px">
    <h4>Seja bem vindo Admin</h4>
  </div>


  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="../../js/buttonsEffect.js"></script>

</body>

</html>