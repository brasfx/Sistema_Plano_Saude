<?php
session_start();
if (isset($_SESSION['tipo'])) {
  if ($_SESSION['tipo'] != "MED") {
    header("location: login_med.php");
  }
}else{
  header("location: login_med.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Início Médico</title>
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
    <a href="starter_admin.php" class="logo">
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
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Médico</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <p style="text-align:center;">
                  Médico
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
                    <a href="logout_med.php" class="btn btn-default">Deslogar</a>
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
        <li class="active"><a href="starter_med.php"><i class="fa fa-laptop"></i> <span>Início</span></a></li>
        <li><a href="exibir_consultas_med.php"><i class="fa fa-map-pin"></i> <span>Ver consultas</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Cadastro</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Editar meu cadastro</a></li>
            <li><a href="form_consultas.php">Adicionar consultas</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <p style="font-size: 22px"><b>Meu Cadastro</b>
        </p>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="box box-primary">
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="../../planoshg/funcao.php" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nomeMed">Nome</label>
              <input type="text" class="form-control" name="nome" placeholder="Eric Gondran" required>
            </div>
            <div class="form-group">
              <label for="cepMed">CEP</label>
              <input type="number" class="form-control" name="CEP" placeholder="96000000" required>
            </div>
            <div class="form-group">
              <label for="endNum">Número</label>
              <input type="number" class="form-control" name="endNum" placeholder="99" required>
            </div>
            <div class="form-group">
              <label for="telefoneMed">Telefone</label>
              <input type="number" class="form-control" name="telefone" placeholder="99999999999" required>
            </div>
            <div class="form-group">
              <label for="emailMed">Email</label>
              <input type="email" class="form-control" name="email" placeholder="medico@email" required>
            </div>
            <div class="form-group">
              <label for="especialidade">Especialidade</label>
              <select class="form-control" name="especialidade">
                <option >--ESPECIALIDADE--</option>
                <option value="pediatra" selected >pediatra</option>
                <option value="ginecologista">ginecologista</option>
                <option value="cirurgiao">cirurgião</option>
                <option value="cardiologista">cardiologista</option>
                <option value="clinico">clinico geral</option>
              </select>
            </div>
            <div class="form-group">
              <label for="CRM">CRM</label>
              <input type="number" class="form-control" name="CRM" placeholder="CRM" autofocus required>
            </div>
            <div class="form-group">
              <label for="pwdMed">Senha</label>
              <input type="password" class="form-control" name="senha" placeholder="Senha" required>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <input type="hidden" name="acao" value="alteraMedico">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Sistemas HG
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">SHG</a>.</strong> Todos os direitos reservados.
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
