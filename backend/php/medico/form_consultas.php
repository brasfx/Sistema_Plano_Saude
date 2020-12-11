<?php
session_start();
if (isset($_SESSION['tipo'])) {
  if ($_SESSION['tipo'] != "MED") {
    header("location: login_med.php");
  }
} else {
  header("location: login_med.php");
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
      <a href="./starter_med.php" class="brand-logo"><img src="../../../frontend/img/logo.png" /></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./starter_med.php">Inicio</a></li>
        <li><a href="./exibir_consultas_med.php">Ver consultas</a></li>

        <li><a class="dropdown-trigger" href="#!" data-target="dropdown">Cadastro<i class="material-icons right">arrow_drop_down</i></a></li>
        <li>
          <a style="display: flex; flex-direction: row" href="../../../home.html">
            <i class="material-icons">exit_to_app</i>Logout</a>
        </li>
      </ul>
    </div>
    <ul id="dropdown" class="dropdown-content">
      <li><a href="./editar_med.php">Editar meu cadastro</a></li>
      <li><a href="./form_consultas.php">Adicionar consultas</a></li>
    </ul>
    <div class="nav-content">
      <span class="nav-title"></span>

    </div>
  </nav>

  <div class="content-wrapper">

    <div class="medico">
      <div class="input-field col s12">

        <h5>Cadastro de consulta</h5>
        <div id="login-page" class="row">
          <div class="col s12 z-depth-2 card-panel">
            <form name="form_consulta" class="login-form" action="../../php/planos/funcao.php" method="post" onsubmit="return formConsulta(this)">
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">date_range</i>
                  <input class="datepicker" id="data" type="text" name="data" required />
                  <label for="data" data-error="wrong" data-success="right">Data</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">subtitles</i>
                  <input class="validate" id="CPF" type="number" name="CPF" required />
                  <label for="CPF" data-error="wrong" data-success="right">CPF do paciente</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">event_note</i>
                  <textarea class="validate" id="receita" type="text" name="receita" placeholder="Dados da receita" required></textarea>
                  <label for="receita" data-error="wrong" data-success="right">Receita</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">comment</i>
                  <textarea class="validate" id="observacoes" type="text" name="observacoes" placeholder="Observações extras"></textarea>
                  <label for="observacoes" data-error="wrong" data-success="left">Observações</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <input type="hidden" name="acao" value="incluiConsulta">
                  <button class="btn waves-effect waves-light" type="submit">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../../js/nav.js"></script>
    <script src="../../js/datePicker.js"></script>
    <script src="../../js/validaForm.js"></script>

</body>

</html>