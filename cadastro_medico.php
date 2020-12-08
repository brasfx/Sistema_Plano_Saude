<?php
$nome  = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereço"];
$crm =  $_POST["crm"];
$especializacao = $_POST["especialização"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$flag = 0;
$user = 0;


if ($flag == 0) {

  $operation = $_POST["operacao"];

  $xmlFile = simplexml_load_file("Medicos.xml");
  $xmlLocalCopy = new SimpleXMLElement($xmlFile->asXML());

  $newAcct = $xmlLocalCopy->addChild("Medico");
  $newAcct->addChild("nome", $nome);
  $newAcct->addChild("sobrenome", $sobrenome);
  $newAcct->addChild("telefone", $telefone);
  $newAcct->addChild("endereco", $endereco);
  $newAcct->addChild("crm", $crm);
  $newAcct->addChild("especializacao", $especializacao);
  $newAcct->addChild("email", $email);
  $newAcct->addChild("senha", $senha);



  $dom = new DOMDocument('1.0');
  $dom->preserveWhiteSpace = false;
  $dom->formatOutput = true;
  $dom->loadXML($xmlLocalCopy->asXML());
  $dom->save("Medicos.xml");

  header("location: cadastro.html ");
}
if ($user == 0) {

  $operation = $_POST["operacao"];

  $xmlFile = simplexml_load_file("Usuarios.xml");
  $xmlLocalCopy = new SimpleXMLElement($xmlFile->asXML());

  $newAcct = $xmlLocalCopy->addChild("Medico");
  $newAcct->addChild("nome", $nome);
  $newAcct->addChild("sobrenome", $sobrenome);
  $newAcct->addChild("crm", $crm);
  $newAcct->addChild("email", $email);
  $newAcct->addChild("senha", $senha);



  $dom = new DOMDocument('1.0');
  $dom->preserveWhiteSpace = false;
  $dom->formatOutput = true;
  $dom->loadXML($xmlLocalCopy->asXML());
  $dom->save("Usuarios.xml");

  header("location: cadastro.html ");
} else {

  echo "</p>" . "<a href=\" cadastro.html\">Redireciona para area de login</a>";
}
