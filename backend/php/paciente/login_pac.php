<?php
session_start();
if (isset($_POST["CPF"], $_POST["senha"])) {
  // print_r($_POST);
  if (!empty($_POST["CPF"]) && !empty($_POST["senha"])) {
    $xml = new DOMDocument();
    libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
    $arquivoxml = "../../DB/pacientes.xml";
    $xml->load($arquivoxml);
    $busca = array();
    foreach ($xml->getElementsByTagName('paciente') as $paciente) {
      if ($paciente->getAttribute('CPF') == $_POST["CPF"] && $paciente->getAttribute('senha') == $_POST["senha"]) {
        $_SESSION['tipo'] = "PAC";
        $_SESSION['CPF'] = $_POST["CPF"];
        header("location: ./starter_pac.php");
      }
    }
  }
} else {
  include "./login_pac.html";
}
