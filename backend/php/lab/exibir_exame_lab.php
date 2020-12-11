<?php
session_start();
if (isset($_SESSION['tipo'])) {
  if ($_SESSION['tipo'] != "LAB") {
    header("location: login_lab.php");
  }
} else {
  header("location: login_lab.php");
}
include "../planos/exames.php";
$exames = mostraExameLAB($_SESSION['CNPJ']);
// print_r($exames);
// include "exibir_exame_lab.html";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laboratório - Consulta de exames</title>
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
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">

      <div class="box">
        <div class="box-header">
          <h5 class="center">Exames</h5>

          <div class="box-tools">

          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table-responsive striped highlight">
            <tr style="background-color:grey">
              <th>CPF Paciente</th>
              <th>Data</th>
              <th>Tipo de exame</th>
              <th>Resultado</th>
            </tr>
            <?php

            foreach ($exames as $exame) {
              echo
                "<tr>
  <td>" . $exame['CPF'] . "</td>
  <td>" . $exame['data'] . "</td>
  <td>" . $exame['tipoExame'] . "</td>
  <td>" . $exame['resultado'] . "</td>
  </tr>";
            }

            ?>

          </table>
        </div>
        <!-- /.box-body -->
      </div>

    </section>
    <!-- /.content -->
  </div>

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="../../js/buttonsEffect.js"></script>

</body>

</html>