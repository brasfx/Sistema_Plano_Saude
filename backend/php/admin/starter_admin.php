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
  <!--<ul id="slide-out" class="sidenav">
    <h6>Cadastro</6>
      <li><a href="form_med.php">Médicos</a></li>
      <li><a href="form_lab.php">Laboratórios</a></li>
      <li><a href="form_pac.php">Pacientes</a></li>
  </ul>

  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>-->
  <nav class="nav-extended">
    <div></div>
    <div class="nav-wrapper">
      <a href="./starter_admin.php" class="brand-logo"><img src="../../../frontend/img/logo.png" /></a>
      <ul class="right hide-on-med-and-down">
        <li style="color: black"><a>A link</a></li>
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

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../../js/nav.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>