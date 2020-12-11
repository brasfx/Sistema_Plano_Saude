<?php
session_start();
if (isset($_POST["CRM"], $_POST["senha"])) {
  // print_r($_POST);
  if (!empty($_POST["CRM"]) && !empty($_POST["senha"])) {
    $xml = new DOMDocument();
    libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
    $arquivoxml = "../../DB/medicos.xml";
    $xml->load($arquivoxml);
    $busca = array();
    foreach ($xml->getElementsByTagName('medico') as $medico) {
      if ($medico->getAttribute('CRM') == $_POST["CRM"] && $medico->getAttribute('senha') == $_POST["senha"]) {
        $_SESSION['tipo'] = "MED";
        $_SESSION['CRM'] = $_POST["CRM"];
        header("location: ./starter_med.php");
      }
    }
  }
} else {
  include "login_med.html";
}
