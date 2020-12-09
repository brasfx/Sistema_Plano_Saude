<?php
session_start();
if (isset($_POST["CNPJ"], $_POST["senha"])) {
  // print_r($_POST);
  if (!empty($_POST["CNPJ"]) && !empty($_POST["senha"])) {
    $xml = new DOMDocument();
    libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
    $arquivoxml = "../../db/laboratorios.xml";
    $xml->load($arquivoxml);
    $busca = array();
    foreach ($xml->getElementsByTagName('laboratorio') as $laboratorio) {
      if ($laboratorio->getAttribute('CNPJ') == $_POST["CNPJ"] && $laboratorio->getAttribute('senha') == $_POST["senha"]) {
        $_SESSION['tipo'] = "LAB";
        $_SESSION['CNPJ'] = $_POST["CNPJ"];
        header("location: ./starter_lab.php");
      }
    }
  }
} else {

  include "./login_lab.html";
}
