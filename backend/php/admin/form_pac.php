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
        <li><a href="./exclui_pc.php">Paciente</a></li>

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
        <select class="browser-default">
          <option value="" disabled selected>
            Escolha o tipo de usuário
          </option>
          <option value="./form_med.php">Médico</option>
          <option value="./form_lab.php">
            Laboratório
          </option>
          <option value="./form_pac.php">
            Paciente
          </option>
        </select>
        <h5>Paciente</h5>
        <div id="login-page" class="row">
          <div class="col s12 z-depth-2 card-panel">
            <form class="login-form" action="../../php/planos/funcao.php" method="post" onsubmit="return formPac(this)">
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">person_outline</i>
                  <input class="validate" id="nome" type="text" name="nome" required />
                  <label for="nome" data-error="wrong" data-success="right">Nome</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">subtitles</i>
                  <input class="validate" id="CPF" type="text" name="CPF" required />
                  <label for="CPF" data-error="wrong" data-success="right">CPF</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">loupe</i>
                  <input class="validate" id="idade" type="number" name="idade" required />
                  <label for="idade" data-error="wrong" data-success="right">Idade</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">face</i>
                  <input class="validate" id="genero" type="text" name="genero" required />
                  <label for="genero" data-error="wrong" data-success="right">Gênero</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">phone</i>
                  <input class="validate" id="telefone" type="number" name="telefone" required />
                  <label for="telefone" data-error="wrong" data-success="right">Telefone</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">home</i>
                  <input class="validate" id="CEP" type="number" name="CEP" required />
                  <label for="CEP" data-error="wrong" data-success="right">CEP</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">home</i>
                  <input class="validate" id="endNum" type="text" name="endNum" required />
                  <label for="endNum" data-error="wrong" data-success="right">Endereço</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">mail_outline</i>
                  <input class="validate" id="email" type="email" name="email" required />
                  <label for="email" data-error="wrong" data-success="right">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">lock_outline</i>
                  <input id="senha" type="password" name="senha" required />
                  <label for="senha">Senha</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <input type="hidden" name="acao" value="incluiPaciente">
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
      <script src="../../js/validaForm.js"></script>
</body>

</html>