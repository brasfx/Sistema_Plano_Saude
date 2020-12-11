<?php
session_start();
if (isset($_POST["login"], $_POST["senha"])) {
  // print_r($_POST);

  if (!empty($_POST["login"]) && !empty($_POST["senha"])) {
    $xml = new DOMDocument();
    libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
    $arquivoxml = "../../db/admin.xml";
    $xml->load($arquivoxml);
    $busca = array();
    foreach ($xml->getElementsByTagName('admin') as $admin) {
      if ($admin->getAttribute('login') == $_POST["login"] && $admin->getAttribute('senha') == $_POST["senha"]) {
        $_SESSION['tipo'] = "ADMIN";
        $_SESSION['nome'] = $admin->nodeValue;
        header("location: ./starter_admin.php");
      }
    }
    //header("location: ./starter_admin.php");
  }
} else {

  include "./login_admin.html";
}
