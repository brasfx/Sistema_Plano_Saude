<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
include "./exames.php";
include "./consultas.php";
include "./laboratorios.php";
include "./pacientes.php";
include "./medicos.php";

session_start();

if (isset($_POST["acao"])) {
  switch ($_POST["acao"]) {

      /* MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS MÉDICOS */
    case 'incluiMedico':
      if (isset($_POST["CRM"], $_POST["email"],  $_POST["telefone"], $_POST["senha"], $_POST["nome"], $_POST["CEP"], $_POST["endNum"], $_POST["especialidade"])) {
        if (!empty($_POST["CRM"]) && !empty($_POST["email"]) &&  !empty($_POST["telefone"]) && !empty($_POST["senha"]) && !empty($_POST["nome"]) && !empty($_POST["CEP"]) && !empty($_POST["endNum"]) && !empty($_POST["especialidade"])) {
          incluiMedico($_POST["CRM"], $_POST["email"],  $_POST["telefone"], $_POST["senha"], $_POST["nome"], $_POST["CEP"], $_POST["endNum"], $_POST["especialidade"]);
        }
      }
      header("Location: ../admin/form_med.php");
      break;
    case 'listaMedicos':
      $medMatriz = listaMedicos();
      break;
    case 'excluiMedico':
      if (isset($_POST["CRM"])) { //só preciso saber obrigatoriamente o CRM
        if (!empty($_POST["CRM"])) {
          excluiMedico($_POST["CRM"]);
        }
      }
      break;
    case 'alteraMedico':
      if (isset($_POST["CRM"])) { //só preciso saber obrigatoriamente o CRM
        //o resto se tiver eu atualizo, senão vai NULL para deixar como está
        alteraMedico($_POST["CRM"], (!empty($_POST["email"]) ? $_POST["email"] : NULL), (!empty($_POST["senha"]) ? $_POST["senha"] : NULL), (!empty($_POST["telefone"]) ? $_POST["telefone"] : NULL), (!empty($_POST["nome"]) ? $_POST["nome"] : NULL), (!empty($_POST["CEP"]) ? $_POST["CEP"] : NULL), (!empty($_POST["endNum"]) ? $_POST["endNum"] : NULL), (!empty($_POST["especialidade"]) ? $_POST["especialidade"] : NULL));
      }
      header("Location: ../pages/Medico/starter_med.php");
      break;
    case 'mostraMedico':
      if (isset($_POST["CRM"])) { //só preciso saber obrigatoriamente o CRM
        $medico = mostraMedico($_POST["CRM"]);
        echo "<pre>";
        print_r($medico);
        echo "</pre>";
      }
      break;

      /* EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME EXAME */

    case 'incluiExame':
      if (isset($_SESSION['CNPJ'])) {
        if (isset($_POST["CPF"], $_POST["data"], $_POST["tipoExame"], $_POST["resultado"])) {
          if (!empty($_POST["CPF"]) &&  !empty($_POST["data"]) && !empty($_POST["tipoExame"]) && !empty($_POST["resultado"])) {
            incluiExame($_POST["CPF"], $_SESSION["CNPJ"],  $_POST["data"], $_POST["tipoExame"], $_POST["resultado"]);
          }
        }
      }
      header("Location: ../pages/Laboratorio/form_exame.php");
      break;
    case 'listaExames':
      $medMatriz = listaExames();
      // echo "<pre>";
      // print_r($medMatriz);
      // echo "</pre>";
      break;
    case 'excluiExame':
      if (isset($_POST["CPF"])) { //só preciso saber obrigatoriamente o CPF
        if (!empty($_POST["CPF"])) {
          excluiExame($_POST["CPF"]);
        }
      }
      break;
    case 'alteraExame':
      if (isset($_POST["CPF"])) { //só preciso saber obrigatoriamente o CPF
        //o resto se tiver eu atualizo, senão vai NULL para deixar como está
        alteraExame($_POST["CPF"], (!empty($_POST["CNPJ"]) ? $_POST["CNPJ"] : NULL), (!empty($_POST["tipoExame"]) ? $_POST["tipoExame"] : NULL), (!empty($_POST["data"]) ? $_POST["data"] : NULL), (!empty($_POST["resultado"]) ? $_POST["resultado"] : NULL));
      }
      break;
    case 'mostraExame':
      if (isset($_POST["CPF"])) { //só preciso saber obrigatoriamente o CPF
        $exame = mostraExame($_POST["CPF"]);
        // echo "<pre>";
        // print_r($exame);
        // echo "</pre>";
      }
      break;

      /* PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE PACIENTE */

    case 'incluiPaciente':
      if (isset($_POST["CPF"], $_POST["email"],  $_POST["telefone"], $_POST["senha"], $_POST["nome"], $_POST["CEP"], $_POST["endNum"], $_POST["idade"], $_POST["genero"])) {
        echo "set";
        if (!empty($_POST["CPF"]) && !empty($_POST["email"]) &&  !empty($_POST["telefone"]) && !empty($_POST["senha"]) && !empty($_POST["nome"]) && !empty($_POST["CEP"]) && !empty($_POST["endNum"]) && !empty($_POST["idade"]) && !empty($_POST["genero"])) {
          echo "!empty";
          incluiPaciente($_POST["CPF"], $_POST["email"],  $_POST["telefone"], $_POST["senha"], $_POST["nome"], $_POST["CEP"], $_POST["endNum"], $_POST["idade"], $_POST["genero"]);
        }
      }
      header("Location: ../admin/form_pac.php");
      break;
    case 'listaPacientes':
      $pacMatriz = listaPacientes();
      echo "<pre>";
      print_r($pacMatriz);
      echo "</pre>";
      break;
    case 'excluiPaciente':
      if (isset($_POST["CPF"])) { //só preciso saber obrigatoriamente o CPF
        if (!empty($_POST["CPF"])) {
          excluiPacientes($_POST["CPF"]);
        }
      }
      break;
    case 'alteraPaciente':
      if (isset($_POST["CPF"])) { //só preciso saber obrigatoriamente o CPF
        //o resto se tiver eu atualizo, senão vai NULL para deixar como está
        alteraPaciente($_POST["CPF"], (!empty($_POST["email"]) ? $_POST["email"] : NULL), (!empty($_POST["senha"]) ? $_POST["senha"] : NULL), (!empty($_POST["telefone"]) ? $_POST["telefone"] : NULL), (!empty($_POST["nome"]) ? $_POST["nome"] : NULL), (!empty($_POST["CEP"]) ? $_POST["CEP"] : NULL), (!empty($_POST["endNum"]) ? $_POST["endNum"] : NULL), (!empty($_POST["idade"]) ? $_POST["idade"] : NULL), (!empty($_POST["genero"]) ? $_POST["genero"] : NULL));
      }
      break;
    case 'mostraPaciente':
      if (isset($_POST["CPF"])) { //só preciso saber obrigatoriamente o CPF
        $paciente = mostraPaciente($_POST["CPF"]);
        echo "<pre>";
        print_r($paciente);
        echo "</pre>";
      }
      break;

      /* LABORATORIO LABORATORIO LABORATORIO LABORATORIO LABORATORIO LABORATORIO LABORATORIO LABORATORIO LABORATORIO LABORATORIO LABORATORIO */

    case 'incluiLaboratorio':

      if (isset($_POST["CNPJ"], $_POST["email"],  $_POST["telefone"], $_POST["senha"], $_POST["nome"], $_POST["CEP"], $_POST["endNum"], $_POST["exametipos"])) {
        if (!empty($_POST["CNPJ"]) && !empty($_POST["email"]) &&  !empty($_POST["telefone"]) && !empty($_POST["senha"]) && !empty($_POST["nome"]) && !empty($_POST["CEP"]) && !empty($_POST["endNum"]) && !empty($_POST["exametipos"])) {
          incluiLaboratorio($_POST["CNPJ"], $_POST["email"],  $_POST["telefone"], $_POST["senha"], $_POST["nome"], $_POST["CEP"], $_POST["endNum"], $_POST["exametipos"]);
        }
      }
      header("Location: ../admin/form_lab.php");
      break;
    case 'listaLaboratorios':
      $medMatriz = listaLaboratorios();
      echo "<pre>";
      print_r($medMatriz);
      echo "</pre>";
      break;
    case 'excluiLaboratorio':
      if (isset($_POST["CNPJ"])) { //só preciso saber obrigatoriamente o CNPJ
        if (!empty($_POST["CNPJ"])) {
          excluiLaboratorio($_POST["CNPJ"]);
        }
      }
      break;
    case 'alteraLaboratorio':
      if (isset($_POST["CNPJ"])) { //só preciso saber obrigatoriamente o CNPJ
        //o resto se tiver eu atualizo, senão vai NULL para deixar como está
        alteraLaboratorio($_POST["CNPJ"], (!empty($_POST["email"]) ? $_POST["email"] : NULL), (!empty($_POST["senha"]) ? $_POST["senha"] : NULL), (!empty($_POST["telefone"]) ? $_POST["telefone"] : NULL), (!empty($_POST["nome"]) ? $_POST["nome"] : NULL), (!empty($_POST["CEP"]) ? $_POST["CEP"] : NULL), (!empty($_POST["endNum"]) ? $_POST["endNum"] : NULL), (!empty($_POST["exametipos"]) ? $_POST["exametipos"] : NULL));
      }
      header("Location: ../pages/Laboratorio/starter_lab.php");
      break;
    case 'mostraLaboratorio':
      if (isset($_POST["CNPJ"])) { //só preciso saber obrigatoriamente o CNPJ
        $laboratorio = mostraLaboratorio($_POST["CNPJ"]);
        echo "<pre>";
        print_r($laboratorio);
        echo "</pre>";
      }
      break;

      /* CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS CONSULTAS */

      //MEDICO SOMENTE INCLUI CONSULTAS
      //PACIENTE BUSCA CONSULTAS EM OUTRO ARUIVO buscaConsultas.php
    case 'incluiConsulta':
      // não precisa do $_POST["CRM"]
      // dado está em $_SESSION['CRM']
      if (isset($_SESSION['CRM'])) {
        if (isset($_POST["CPF"], $_POST["data"], $_POST["receita"], $_POST["observacoes"])) {
          if (!empty($_POST["CPF"]) && !empty($_POST["data"]) && !empty($_POST["receita"]) && !empty($_POST["observacoes"])) {
            incluiConsulta($_POST["CPF"], $_SESSION['CRM'],  $_POST["data"], $_POST["receita"], $_POST["observacoes"]);
            echo $_SESSION['CRM'];
          }
        }
      }

      header("Location: ../pages/Medico/form_consultas.php");
      break;

    default:
      echo "Ação não encontrada<br>";
      break;
  }
}
