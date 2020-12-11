<?php
//verifica se o admin já existe
function existeAdmin($CPF)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/admin.xml";
  $xml->load($arquivoxml);
  $existe = FALSE;
  foreach ($xml->getElementsByTagName('admin') as $admin) {
    if ($admin->getAttribute('CPF') == $CPF) {
      $existe = TRUE;
      break;
    }
  }
  return $existe;
}
//cadastra um novo admin
function insereAdmin($CPF, $senha, $nome)
{
  if (!existeAdmin($CPF)) {
    $arquivoxml = "../../db/admin.xml";
    $xml = new DOMDocument();
    $xml->load($arquivoxml);
    $admins = $xml->getElementsByTagName('administradores')[0];
    $admin = $admins->appendChild(new DOMElement('admin'));
    $xml->save($arquivoxml);
    $admin->setAttribute('login', $CPF);
    $admin->setAttribute('senha', $senha);
    $admin->appendChild(new DOMElement('nome', $nome));
    $xml->save($arquivoxml);
  }
}

function alteraAdmin($CPF, $senha, $nome)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/admin.xml";
  $xml->load($arquivoxml);
  foreach ($xml->getElementsByTagName('admin') as $admin) {
    if ($admin->getAttribute('login') == $CPF) {
      /*verifica o que vai entrar de dados antigos ou atuais*/
      $senha = ($senha ? $senha : $admin->getAtribute('senha'));
      $nome = ($nome ? $nome : $admin->getElementsByTagName('nome')[0]->nodeValue);
      /*repopula o elemento Admin com a decisão anterior*/
      $adminatualizado = $xml->createElement('admin');
      $adminatualizado->setAttribute('login', $CPF);
      $adminatualizado->setAttribute('senha', $senha);
      $adminatualizado->appendChild(new DOMElement('nome', $nome));
      $admin->parentNode->replaceChild($adminatualizado, $admin);
      $xml->save($arquivoxml);
      break;
    }
  }
}
