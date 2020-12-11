<?php

function existeLaboratorio($CNPJ)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/laboratorios.xml";
  $xml->load($arquivoxml);
  $existe = FALSE;
  foreach ($xml->getElementsByTagName('laboratorio') as $laboratorio) {
    if ($laboratorio->getAttribute('CNPJ') == $CNPJ) {
      $existe = TRUE;
      break;
    }
  }
  return $existe;
}

function incluiLaboratorio($CNPJ, $email, $telefone, $senha, $nome, $CEP, $endNum, $exametipos)
{
  echo "goo";
  if (!existeLaboratorio($CNPJ)) {
    $arquivoxml = "../../db/laboratorios.xml";
    $xml = new DOMDocument();
    $xml->load($arquivoxml);
    $laboratorios = $xml->getElementsByTagName('laboratorios')[0];
    $laboratorio = $laboratorios->appendChild(new DOMElement('laboratorio'));
    $xml->save($arquivoxml);
    $laboratorio->setAttribute('CNPJ', $CNPJ);
    $laboratorio->setAttribute('senha', $senha);
    $laboratorio->appendChild(new DOMElement('nome', $nome));
    $laboratorio->appendChild(new DOMElement('email', $email));
    $laboratorio->appendChild(new DOMElement('telefone', $telefone));
    $laboratorio->appendChild(new DOMElement('CEP', $CEP));
    $laboratorio->appendChild(new DOMElement('endNum', $endNum));
    $laboratorio->appendChild(new DOMElement('exametipos', $exametipos));
    $xml->save($arquivoxml);
  }
}

function mostraLaboratorio($CNPJ)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/laboratorios.xml";
  $xml->load($arquivoxml);
  $busca = array();
  foreach ($xml->getElementsByTagName('laboratorio') as $laboratorio) {
    if ($laboratorio->getAttribute('CNPJ') == $CNPJ) {
      $busca['senha'] = $laboratorio->getAttribute('senha');
      $busca['nome'] = $laboratorio->getElementsByTagName('nome')[0]->nodeValue;
      $busca['email'] = $laboratorio->getElementsByTagName('email')[0]->nodeValue;
      $busca['telefone'] = $laboratorio->getElementsByTagName('telefone')[0]->nodeValue;
      $busca['CEP'] = $laboratorio->getElementsByTagName('CEP')[0]->nodeValue;
      $busca['endNum'] = $laboratorio->getElementsByTagName('endNum')[0]->nodeValue;
      $busca['exametipos'] = $laboratorio->getElementsByTagName('exametipos')[0]->nodeValue;
      break;
    }
  }
  return $busca;
}

function listaLaboratorios()
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/laboratorios.xml";
  $xml->load($arquivoxml);
  $busca = array();
  foreach ($xml->getElementsByTagName('laboratorio') as $laboratorio) {
    $CNPJ = $laboratorio->getAttribute('CNPJ');
    $busca[$CNPJ]['senha'] = $laboratorio->getAttribute('senha');
    $busca[$CNPJ]['nome'] = $laboratorio->getElementsByTagName('nome')[0]->nodeValue;
    $busca[$CNPJ]['email'] = $laboratorio->getElementsByTagName('email')[0]->nodeValue;
    $busca[$CNPJ]['telefone'] = $laboratorio->getElementsByTagName('telefone')[0]->nodeValue;
    $busca[$CNPJ]['CEP'] = $laboratorio->getElementsByTagName('CEP')[0]->nodeValue;
    $busca[$CNPJ]['endNum'] = $laboratorio->getElementsByTagName('endNum')[0]->nodeValue;
    $busca[$CNPJ]['exametipos'] = $laboratorio->getElementsByTagName('exametipos')[0]->nodeValue;
  }
  return $busca;
}
/*
CNPJ não se altera, é só para a busca, os demais, coloque os valores a serem atualizados
caso não queira atualizar um campo, deixe o respectivo parâmetro NULL (ñ é em branco)
 */
function alteraLaboratorio($CNPJ, $email, $senha, $telefone, $nome, $CEP, $endNum, $exametipos)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/laboratorios.xml";
  $xml->load($arquivoxml);
  foreach ($xml->getElementsByTagName('laboratorio') as $laboratorio) {
    if ($laboratorio->getAttribute('CNPJ') == $CNPJ) {
      /*verifica o que vai entrar de dados antigos ou atuais*/
      $senha = ($senha ? $senha : $laboratorio->getAttribute('senha'));
      $nome = ($nome ? $nome : $laboratorio->getElementsByTagName('nome')[0]->nodeValue);
      $email = ($email ? $email : $laboratorio->getElementsByTagName('email')[0]->nodeValue);
      $telefone = ($telefone ? $telefone : $laboratorio->getElementsByTagName('telefone')[0]->nodeValue);
      $CEP = ($CEP ? $CEP : $laboratorio->getElementsByTagName('CEP')[0]->nodeValue);
      $endNum = ($endNum ? $endNum : $laboratorio->getElementsByTagName('endNum')[0]->nodeValue);
      $exametipos = ($exametipos ? $exametipos : $laboratorio->getElementsByTagName('exametipos')[0]->nodeValue);
      /*repopula o elemento laboratorio com a decisão anterior*/
      $laboratorioatualizado = $xml->createElement('laboratorio');
      $laboratorioatualizado->setAttribute('CNPJ', $CNPJ);
      $laboratorioatualizado->setAttribute('senha', $senha);
      $laboratorioatualizado->appendChild(new DOMElement('nome', $nome));
      $laboratorioatualizado->appendChild(new DOMElement('email', $email));
      $laboratorioatualizado->appendChild(new DOMElement('telefone', $telefone));
      $laboratorioatualizado->appendChild(new DOMElement('CEP', $CEP));
      $laboratorioatualizado->appendChild(new DOMElement('endNum', $endNum));
      $laboratorioatualizado->appendChild(new DOMElement('exametipos', $exametipos));
      $laboratorio->parentNode->replaceChild($laboratorioatualizado, $laboratorio);
      $xml->save($arquivoxml);
      break;
    }
  }
}

function excluiLaboratorio($CNPJ)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/laboratorios.xml";
  $xml->load($arquivoxml);
  foreach ($xml->getElementsByTagName('laboratorio') as $laboratorio) {
    if ($laboratorio->getAttribute('CNPJ') == $CNPJ) {
      $parent = $laboratorio->parentNode;
      $parent->removeChild($laboratorio);
      break;
    }
  }
  $xml->save($arquivoxml);
}
