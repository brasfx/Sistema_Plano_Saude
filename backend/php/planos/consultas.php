<?php

// function existeConsulta($CPF){
//   $xml = new DOMDocument();
//   libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
//   $arquivoxml = "../DB/consultas.xml";
//   $xml->load($arquivoxml);
//   $existe=FALSE;
//   foreach ($xml->getElementsByTagName('consulta') as $consulta) {
//     if ($consulta->getAttribute('CPF')==$CPF) {
//       $existe=TRUE;
//       break;
//     }
//   }
//   return $existe;
// }

function incluiConsulta($CPF, $CRM, $data, $receita, $observacoes)
{
  // if (!existeConsulta($CPF)) {
  $arquivoxml = "../../db/consultas.xml";
  $xml = new DOMDocument();
  $xml->load($arquivoxml);
  $consultas = $xml->getElementsByTagName('consultas')[0];
  $consulta = $consultas->appendChild(new DOMElement('consulta'));
  $xml->save($arquivoxml);
  $consulta->setAttribute('CPF', $CPF);
  $consulta->setAttribute('CRM', $CRM);
  $consulta->appendChild(new DOMElement('data', $data));
  $consulta->appendChild(new DOMElement('receita', $receita));
  $consulta->appendChild(new DOMElement('observacoes', $observacoes));
  $xml->save($arquivoxml);
  // }
}

function mostraConsultaPAC($CPF)
{ // consultas por paciente
  $xml = new DOMDocument();
  $arquivoxml = "../../db/consultas.xml";
  $xml->load($arquivoxml);
  $busca = array();
  $count = 0;
  foreach ($xml->getElementsByTagName('consulta') as $consulta) {
    if ($consulta->getAttribute('CPF') == $CPF) {
      $busca[$count]['CRM'] = $consulta->getAttribute('CRM');
      $busca[$count]['data'] = $consulta->getElementsByTagName('data')[0]->nodeValue;
      $busca[$count]['receita'] = $consulta->getElementsByTagName('receita')[0]->nodeValue;
      $busca[$count]['observacoes'] = $consulta->getElementsByTagName('observacoes')[0]->nodeValue;
      $count++;
      // break;
    }
  }
  return $busca;
}
function mostraConsultaMED($CRM)
{ // Econsultas por medico
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/consultas.xml";
  $xml->load($arquivoxml);
  $busca = array();
  $count = 0;
  foreach ($xml->getElementsByTagName('consulta') as $consulta) {
    // echo $consulta->getAttribute('CRM');
    if ($consulta->getAttribute('CRM') == $CRM) {
      $busca[$count]['CPF'] = $consulta->getAttribute('CPF');
      $busca[$count]['data'] = $consulta->getElementsByTagName('data')[0]->nodeValue;
      $busca[$count]['receita'] = $consulta->getElementsByTagName('receita')[0]->nodeValue;
      $busca[$count]['observacoes'] = $consulta->getElementsByTagName('observacoes')[0]->nodeValue;
      $count++;
      // break;
    }
  }
  return $busca;
}
