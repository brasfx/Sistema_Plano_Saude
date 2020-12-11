<?php
session_start();
if (isset($_SESSION['tipo'])) {
  if ($_SESSION['tipo'] != "LAB") {
    header("location: login_lab.php");
  }
} else {
  header("location: login_lab.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Início Laboratório</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="../../../frontend/css/cadastro.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>

  <nav class="nav-extended">
    <div></div>
    <div class="nav-wrapper">
      <a href="./starter_lab.php" class="brand-logo"><img src="../../../frontend/img/logo.png" /></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./starter_lab.php">Inicio</a></li>
        <li><a href="./exibir_exame_lab.php">Ver historico</a></li>

        <li><a class="dropdown-trigger" href="#!" data-target="dropdown">Cadastro<i class="material-icons right">arrow_drop_down</i></a></li>
        <li>
          <a style="display: flex; flex-direction: row" href="../../../home.html">
            <i class="material-icons">exit_to_app</i>Logout</a>
        </li>
      </ul>
    </div>
    <ul id="dropdown" class="dropdown-content">
      <li><a href="./editar_lab.php">Editar meu cadastro</a></li>
      <li><a href="./form_exame.php">Adicionar exames</a></li>
    </ul>
    <div class="nav-content">
      <span class="nav-title"></span>

    </div>
  </nav>
  <div class="medico">
    <div class="input-field col s12">
      <h5>Novo exame</h5>
      <div id="login-page" class="row">
        <div class="col s12 z-depth-2 card-panel">
          <form class="login-form" action="../../php/planos/funcao.php" method="post">
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">person_outline</i>
                <input class="validate" id="CPF" type="Number" name="CPF" required />
                <label for="CPF" data-error="wrong" data-success="right">CPF do paciente</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">location_city</i>
                <input class="datepicker" id="data" type="text" name="data" />
                <label for="data" data-error="wrong" data-success="right">Data</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">location_city</i>
                <input class="validate" id="tipoExame" type="text" name="tipoExame" />
                <label for="tipoExame" data-error="wrong" data-success="right">Tipo de exame</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">local_phone</i>
                <textarea class="validate" id="resultado" type="text" name="resultado" placeholder="Resultados obtidos" required></textarea>
                <label for="resultado" data-error="wrong" data-success="right">Resultado</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input type="hidden" name="acao" value="incluiExame">
                <button type="submit" class="btn waves-effect waves-light">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../../js/buttonsEffect.js"></script>
    <script src="../../js/datePicker.js"></script>

</body>

</html>