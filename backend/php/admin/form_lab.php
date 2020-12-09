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
      <div class="nav-wrapper">
        <a href="./starter_admin.php" class="brand-logo"> <img src="../../../frontend/img/logo.png" /></a>
        <ul class="right hide-on-med-and-down">
          <li><a>A link</a></li>
          <li><a>A second link</a></li>
          <li>
            <a style="display: flex; flex-direction: row" href="../../../frontend/html/home.html">
              <i class="material-icons">exit_to_app</i>Logout</a>
          </li>
        </ul>
      </div>
      <div class="nav-content">
        <span class="nav-title"></span>
        <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal" href="../../../frontend/html/cadastro.html">
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
        <h5>Laboratório</h5>
        <div id="login-page" class="row">
          <div class="col s12 z-depth-2 card-panel">
            <form class="login-form" action="../../php/planos/funcao.php" method="post">
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">person_outline</i>
                  <input class="validate" id="nome" type="text" name="nome" />
                  <label for="nome" data-error="wrong" data-success="right">Nome</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">location_city</i>
                  <input class="validate" id="CEP" type="number" name="CEP" />
                  <label for="CEP" data-error="wrong" data-success="right">CEP</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">location_city</i>
                  <input class="validate" id="endNum" type="text" name="endNum" />
                  <label for="endNum" data-error="wrong" data-success="right">Endereço</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">local_phone</i>
                  <input class="validate" id="telefone" type="number" name="telefone" />
                  <label for="telefone" data-error="wrong" data-success="right">Telefone</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">subtitles</i>
                  <input class="validate" id="CNPJ" type="number" name="CNPJ" />
                  <label for="CNPJ" data-error="wrong" data-success="right">CNPJ</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">local_hospital</i>
                  <input class="validate" id="exametipos" type="text" name="exametipos" />
                  <label for="exametipos" data-error="wrong" data-success="right">Tipo de exame</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">mail_outline</i>
                  <input class="validate" id="email" type="email" name="email" />
                  <label for="email" data-error="wrong" data-success="right">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">lock_outline</i>
                  <input id="senha" type="password" name="senha" />
                  <label for="password">Senha</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <input type="hidden" name="acao" value="incluiLaboratorio">
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
      <script src="validaForm.js"></script>
</body>

</html>