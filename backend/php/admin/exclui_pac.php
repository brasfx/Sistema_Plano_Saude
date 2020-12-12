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
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../../../frontend/css/cadastro.css" />
  <!--Import Google Icon Font-->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <title>Login</title>
</head>

<body>
  <div class="nav-wrapper">
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
    <div class="medico">
      <div class="input-field col s12">

        <h5>Remoção de paciente</h5>
        <div id="login-page" class="row">
          <div class="col s12 z-depth-2 card-panel">
            <form class="login-form" action="../../php/planos/funcao.php" method="post">
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">subtitles</i>
                  <input class="validate" id="CPF" type="number" name="CPF" required />
                  <label for="CPF" data-error="wrong" data-success="right">CPF</label>

                  <div class="row center">
                    <div class="input-field col s12">
                      <input type="hidden" name="acao" value="excluiPaciente">
                      <button type="submit" class="btn waves-effect waves-light">Enviar</button>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script src="../../js/selectUser.js"></script>
      <script src="../../js/buttonsEffect.js"></script>

</body>

</html>