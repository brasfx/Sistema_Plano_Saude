<?php

function existePaciente($CPF)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/pacientes.xml";
  $xml->load($arquivoxml);
  $existe = FALSE;
  foreach ($xml->getElementsByTagName('paciente') as $paciente) {
    if ($paciente->getAttribute('CPF') == $CPF) {
      $existe = TRUE;
      break;
    }
  }
  return $existe;
}

function incluiPaciente($CPF, $email, $telefone, $senha, $nome, $CEP, $endNum, $idade, $genero)
{
  if (!existePaciente($CPF)) {
    $arquivoxml = "../../db/pacientes.xml";
    $xml = new DOMDocument();
    $xml->load($arquivoxml);
    $pacientes = $xml->getElementsByTagName('pacientes')[0];
    $paciente = $pacientes->appendChild(new DOMElement('paciente'));
    $xml->save($arquivoxml);
    $paciente->setAttribute('CPF', $CPF);
    $paciente->setAttribute('senha', $senha);
    $paciente->appendChild(new DOMElement('nome', $nome));
    $paciente->appendChild(new DOMElement('email', $email));
    $paciente->appendChild(new DOMElement('telefone', $telefone));
    $paciente->appendChild(new DOMElement('CEP', $CEP));
    $paciente->appendChild(new DOMElement('endNum', $endNum));
    $paciente->appendChild(new DOMElement('idade', $idade));
    $paciente->appendChild(new DOMElement('genero', $genero));
    $xml->save($arquivoxml);
  }
}

function mostraPaciente($CPF)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/pacientes.xml";
  $xml->load($arquivoxml);
  $busca = array();
  foreach ($xml->getElementsByTagName('paciente') as $paciente) {
    if ($paciente->getAttribute('CPF') == $CPF) {
      $busca['senha'] = $paciente->getAtribute('senha');
      $busca['nome'] = $paciente->getElementsByTagName('nome')[0]->nodeValue;
      $busca['email'] = $paciente->getElementsByTagName('email')[0]->nodeValue;
      $busca['telefone'] = $paciente->getElementsByTagName('telefone')[0]->nodeValue;
      $busca['CEP'] = $paciente->getElementsByTagName('CEP')[0]->nodeValue;
      $busca['endNum'] = $paciente->getElementsByTagName('endNum')[0]->nodeValue;
      $busca['idade'] = $paciente->getElementsByTagName('idade')[0]->nodeValue;
      $busca['genero'] = $paciente->getElementsByTagName('genero')[0]->nodeValue;
      break;
    }
  }
  return $busca;
}

function listaPacientes()
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/pacientes.xml";
  $xml->load($arquivoxml);
  $busca = array();
  foreach ($xml->getElementsByTagName('paciente') as $paciente) {
    $CPF = $paciente->getAttribute('CPF');
    $busca[$CPF]['senha'] = $paciente->getAtribute('senha');
    $busca[$CPF]['nome'] = $paciente->getElementsByTagName('nome')[0]->nodeValue;
    $busca[$CPF]['email'] = $paciente->getElementsByTagName('email')[0]->nodeValue;
    $busca[$CPF]['telefone'] = $paciente->getElementsByTagName('telefone')[0]->nodeValue;
    $busca[$CPF]['CEP'] = $paciente->getElementsByTagName('CEP')[0]->nodeValue;
    $busca[$CPF]['endNum'] = $paciente->getElementsByTagName('endNum')[0]->nodeValue;
    $busca[$CPF]['idade'] = $paciente->getElementsByTagName('idade')[0]->nodeValue;
    $busca[$CPF]['genero'] = $paciente->getElementsByTagName('genero')[0]->nodeValue;
  }
  return $busca;
}
/*
CPF não se altera, é só para a busca, os demais, coloque os valores a serem atualizados
caso não queira atualizar um campo, deixe o respectivo parâmetro NULL (ñ é em branco)
 */
function alteraPaciente($CPF, $email, $senha, $telefone, $nome, $CEP, $endNum, $idade, $genero)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/pacientes.xml";
  $xml->load($arquivoxml);
  foreach ($xml->getElementsByTagName('paciente') as $paciente) {
    if ($paciente->getAttribute('CPF') == $CPF) {
      /*verifica o que vai entrar de dados antigos ou atuais*/
      $senha = ($senha ? $senha : $paciente->getAtribute('senha'));
      $nome = ($nome ? $nome : $paciente->getElementsByTagName('nome')[0]->nodeValue);
      $email = ($email ? $email : $paciente->getElementsByTagName('email')[0]->nodeValue);
      $telefone = ($telefone ? $telefone : $paciente->getElementsByTagName('telefone')[0]->nodeValue);
      $CEP = ($CEP ? $CEP : $paciente->getElementsByTagName('CEP')[0]->nodeValue);
      $endNum = ($endNum ? $endNum : $paciente->getElementsByTagName('endNum')[0]->nodeValue);
      $idade = ($idade ? $idade : $paciente->getElementsByTagName('idade')[0]->nodeValue);
      $genero = ($genero ? $genero : $paciente->getElementsByTagName('genero')[0]->nodeValue);
      /*repopula o elemento Paciente com a decisão anterior*/
      $pacienteatualizado = $xml->createElement('paciente');
      $pacienteatualizado->setAttribute('CPF', $CPF);
      $pacienteatualizado->setAttribute('senha', $senha);
      $pacienteatualizado->appendChild(new DOMElement('nome', $nome));
      $pacienteatualizado->appendChild(new DOMElement('email', $email));
      $pacienteatualizado->appendChild(new DOMElement('telefone', $telefone));
      $pacienteatualizado->appendChild(new DOMElement('CEP', $CEP));
      $pacienteatualizado->appendChild(new DOMElement('endNum', $endNum));
      $pacienteatualizado->appendChild(new DOMElement('idade', $idade));
      $pacienteatualizado->appendChild(new DOMElement('genero', $genero));
      $paciente->parentNode->replaceChild($pacienteatualizado, $paciente);
      $xml->save($arquivoxml);
      break;
    }
  }
}

function excluiPaciente($CPF)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/pacientes.xml";
  $xml->load($arquivoxml);
  foreach ($xml->getElementsByTagName('paciente') as $paciente) {
    if ($paciente->getAttribute('CPF') == $CPF) {
      $parent = $paciente->parentNode;
      $parent->removeChild($paciente);
      break;
    }
  }
  $xml->save($arquivoxml);
}

function mostraPerfil($CPF)
{ // mostra dados do paciente
  $xml = new DOMDocument();
  $arquivoxml = "../../db/pacientes.xml";
  $xml->load($arquivoxml);
  $busca = array();
  $count = 0;
  foreach ($xml->getElementsByTagName('paciente') as $paciente) {
    if ($paciente->getAttribute('CPF') == $CPF) {
      $busca[$count]['nome'] = $paciente->getElementsByTagName('nome')[0]->nodeValue;
      $busca[$count]['email'] = $paciente->getElementsByTagName('email')[0]->nodeValue;
      $busca[$count]['telefone'] = $paciente->getElementsByTagName('telefone')[0]->nodeValue;
      $busca[$count]['CEP'] = $paciente->getElementsByTagName('CEP')[0]->nodeValue;
      $busca[$count]['endNum'] = $paciente->getElementsByTagName('endNum')[0]->nodeValue;
      $busca[$count]['idade'] = $paciente->getElementsByTagName('idade')[0]->nodeValue;
      $busca[$count]['genero'] = $paciente->getElementsByTagName('genero')[0]->nodeValue;
      $count++;
      // break;
    }
  }
  return $busca;
}
