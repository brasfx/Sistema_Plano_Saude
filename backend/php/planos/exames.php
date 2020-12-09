<?php

// function existeExame($CPF){
//   $xml = new DOMDocument();
//   libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
//   $arquivoxml = "../DB/exames.xml";
//   $xml->load($arquivoxml);
//   $existe=FALSE;
//   foreach ($xml->getElementsByTagName('exame') as $exame) {
//     if ($exame->getAttribute('CPF')==$CPF) {
//       $existe=TRUE;
//       break;
//     }
//   }
//   return $existe;
// }

function incluiExame($CPF, $CNPJ, $data, $tipoExame, $resultado){
  // if (!existeExame($CPF)) {
    $arquivoxml = "../DB/exames.xml";
    $xml = new DOMDocument();
    $xml->load($arquivoxml);
    $exames = $xml->getElementsByTagName('exames')[0];
    $exame = $exames->appendChild(new DOMElement('exame'));
    $xml->save($arquivoxml);
    $exame->setAttribute('CPF', $CPF);
    $exame->setAttribute('CNPJ', $CNPJ);
    $exame->appendChild(new DOMElement('data', $data));
    $exame->appendChild(new DOMElement('tipoExame', $tipoExame));
    $exame->appendChild(new DOMElement('resultado', $resultado));
    $xml->save($arquivoxml);
  // }
}

function mostraExameLAB($CNPJ){ // exames por laboratorio
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../DB/exames.xml";
  $xml->load($arquivoxml);
  $busca=array();
  $count=0;
  foreach ($xml->getElementsByTagName('exame') as $exame) {
    if ($exame->getAttribute('CNPJ')==$CNPJ) {
      $busca[$count]['CPF'] = $exame->getAttribute('CPF');
      $busca[$count]['data'] = $exame->getElementsByTagName('data')[0]->nodeValue;
      $busca[$count]['resultado'] = $exame->getElementsByTagName('resultado')[0]->nodeValue;
      $busca[$count]['tipoExame'] = $exame->getElementsByTagName('tipoExame')[0]->nodeValue;
      $count++;
      // break;
    }
  }
  return $busca;
}

function mostraExamePAC($CPF){ // exames por paciente
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../DB/exames.xml";
  $xml->load($arquivoxml);
  $busca=array();
  $count=0;
  foreach ($xml->getElementsByTagName('exame') as $exame) {
    if ($exame->getAttribute('CPF')==$CPF) {
      $busca[$count]['CNPJ'] = $exame->getAttribute('CNPJ');
      $busca[$count]['data'] = $exame->getElementsByTagName('data')[0]->nodeValue;
      $busca[$count]['resultado'] = $exame->getElementsByTagName('resultado')[0]->nodeValue;
      $busca[$count]['tipoExame'] = $exame->getElementsByTagName('tipoExame')[0]->nodeValue;
      $count++;
      // break;
    }
  }
  return $busca;
}

function listaExames(){
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../DB/exames.xml";
  $xml->load($arquivoxml);
  $busca=array();
  foreach ($xml->getElementsByTagName('exame') as $exame) {
    $CPF = $exame->getAttribute('CPF');
    $busca[$CPF]['resultado'] = $exame->getElementsByTagName('resultado')[0]->nodeValue;
    $busca[$CPF]['CNPJ'] = $exame->getElementsByTagName('CNPJ')[0]->nodeValue;
    $busca[$CPF]['tipoExame'] = $exame->getElementsByTagName('tipoExame')[0]->nodeValue;
    $busca[$CPF]['data'] = $exame->getElementsByTagName('data')[0]->nodeValue;
  }
  return $busca;
}
/*
CPF não se altera, é só para a busca, os demais, coloque os valores a serem atualizados
caso não queira atualizar um campo, deixe o respectivo parâmetro NULL (ñ é em branco)
 */
// function alteraExame($CPF, $CNPJ, $data, $tipoExame, $resultado){ // somente até duas horas depois
//   $xml = new DOMDocument();
//   libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
//   $arquivoxml = "../DB/exames.xml";
//   $xml->load($arquivoxml);
//   foreach ($xml->getElementsByTagName('exame') as $exame) {
//     if ($exame->getAttribute('CPF')==$CPF) {
//       /*verifica o que vai entrar de dados antigos ou atuais*/
//       $CNPJ = ($CNPJ ? $CNPJ : $exame->getElementsByTagName('CNPJ')[0]->nodeValue);
//       $resultado = ($resultado ? $resultado : $exame->getElementsByTagName('resultado')[0]->nodeValue);
//       $tipoExame = ($tipoExame ? $tipoExame : $exame->getElementsByTagName('tipoExame')[0]->nodeValue);
//       $data = ($data ? $data : $exame->getElementsByTagName('data')[0]->nodeValue);
//       /*repopula o elemento Exame com a decisão anterior*/
//       $exameatualizado = $xml->createElement('exame');
//       $exameatualizado->setAttribute('CPF', $CPF);
//       $exameatualizado->setAttribute('CNPJ', $CNPJ);
//       $exameatualizado->appendChild(new DOMElement('resultado', $resultado));
//       $exameatualizado->appendChild(new DOMElement('tipoExame', $tipoExame));
//       $exameatualizado->appendChild(new DOMElement('data', $data));
//       $exame->parentNode->replaceChild($exameatualizado, $exame);
//       $xml->save($arquivoxml);
//       break;
//     }
//   }
// }
//
// function excluiExame($CPF){ // não ÚTIL por enquanto
//   $xml = new DOMDocument();
//   libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
//   $arquivoxml = "../DB/exames.xml";
//   $xml->load($arquivoxml);
//   foreach ($xml->getElementsByTagName('exame') as $exame) {
//     if ($exame->getAttribute('CPF')==$CPF) {
//       $parent=$exame->parentNode;
//       $parent->removeChild($exame);
//       break;
//     }
//   }
//   $xml->save($arquivoxml);
// }
