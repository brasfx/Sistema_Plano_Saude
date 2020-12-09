<?php
session_start();
if (isset($_SESSION['tipo'])) {
  if ($_SESSION['tipo'] != "PAC") {
    header("location: login_pac.php");
  }
}else{
  header("location: login_pac.php");
}
include "../../planoshg/exames.php";
$exames = mostraExamePAC($_SESSION['CPF']);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Exames Paciente</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/skin-blue.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>HG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Planos</b>HG</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Paciente</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <p style="text-align:center;">
                  Paciente
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="col-xs-3"></div>
                  <div class="col-xs-4 text-center">
                    <a href="../../index.php" class="btn btn-default">Deslogar</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="starter_pac.php"><i class="fa fa-laptop"></i> <span>Início</span></a></li>
        <li><a href="exibir_consultas_pac.php"><i class="fa fa-map-pin"></i> <span>Ver consultas</span></a></li>
        <li class="active"><a href="exibir_exames_pac.php"><i class="fa fa-map-pin"></i> <span>Ver exames</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content container-fluid">


          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Meus Exames</h3>

                  <div class="box-tools">

                  </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Laboratório</th>
                      <th>Data</th>
                      <th>Tipo de exame</th>
                      <th>Resultado</th>
                    </tr>
      <?php

      foreach ($exames as $exame) {
        echo
        "<tr>
        <td>".$exame['CNPJ']."</td>
        <td>".$exame['data']."</td>
        <td>".$exame['tipoExame']."</td>
        <td>".$exame['resultado']."</td>
        </tr>";
      }

      ?>

                  <!--
                  <tr>
                      <td>183</td>
                      <td>11-7-2014</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td>Approved</td>
                  </tr>
                   -->
                  </table>
              </div>
              <!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
