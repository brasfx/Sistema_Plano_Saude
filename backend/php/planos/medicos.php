<?php

function existeMedico($CRM)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/medicos.xml";
  $xml->load($arquivoxml);
  $existe = FALSE;
  foreach ($xml->getElementsByTagName('medico') as $medico) {
    if ($medico->getAttribute('CRM') == $CRM) {
      $existe = TRUE;
      break;
    }
  }
  return $existe;
}

function incluiMedico($CRM, $email, $telefone, $senha, $nome, $CEP, $endNum, $especialidade)
{
  if (!existeMedico($CRM)) {
    $arquivoxml = "../../db/medicos.xml";
    $xml = new DOMDocument();
    $xml->load($arquivoxml);
    $medicos = $xml->getElementsByTagName('medicos')[0];
    $medico = $medicos->appendChild(new DOMElement('medico'));
    $xml->save($arquivoxml);
    $medico->setAttribute('CRM', $CRM);
    $medico->setAttribute('senha', $senha);
    $medico->appendChild(new DOMElement('nome', $nome));
    $medico->appendChild(new DOMElement('email', $email));
    $medico->appendChild(new DOMElement('telefone', $telefone));
    $medico->appendChild(new DOMElement('CEP', $CEP));
    $medico->appendChild(new DOMElement('endNum', $endNum));
    $medico->appendChild(new DOMElement('especialidade', $especialidade));
    $xml->save($arquivoxml);
  }
}

function mostraMedico($CRM)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/medicos.xml";
  $xml->load($arquivoxml);
  $busca = array();
  foreach ($xml->getElementsByTagName('medico') as $medico) {
    if ($medico->getAttribute('CRM') == $CRM) {
      $busca['nome'] = $medico->getAttribute('senha');
      $busca['email'] = $medico->getElementsByTagName('email')[0]->nodeValue;
      $busca['senha'] = $medico->getElementsByTagName('nome')[0]->nodeValue;
      $busca['telefone'] = $medico->getElementsByTagName('telefone')[0]->nodeValue;
      $busca['CEP'] = $medico->getElementsByTagName('CEP')[0]->nodeValue;
      $busca['endNum'] = $medico->getElementsByTagName('endNum')[0]->nodeValue;
      $busca['especialidade'] = $medico->getElementsByTagName('especialidade')[0]->nodeValue;
      break;
    }
  }
  return $busca;
}

function listaMedicos()
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/medicos.xml";
  $xml->load($arquivoxml);
  $busca = array();
  foreach ($xml->getElementsByTagName('medico') as $medico) {
    $CRM = $medico->getAttribute('CRM');
    $busca[$CRM]['nome'] = $medico->getAttribute('senha');
    $busca[$CRM]['email'] = $medico->getElementsByTagName('email')[0]->nodeValue;
    $busca[$CRM]['senha'] = $medico->getElementsByTagName('nome')[0]->nodeValue;
    $busca[$CRM]['telefone'] = $medico->getElementsByTagName('telefone')[0]->nodeValue;
    $busca[$CRM]['CEP'] = $medico->getElementsByTagName('CEP')[0]->nodeValue;
    $busca[$CRM]['endNum'] = $medico->getElementsByTagName('endNum')[0]->nodeValue;
    $busca[$CRM]['especialidade'] = $medico->getElementsByTagName('especialidade')[0]->nodeValue;
  }
  return $busca;
}
/*
CRM não se altera, é só para a busca, os demais, coloque os valores a serem atualizados
caso não queira atualizar um campo, deixe o respectivo parâmetro NULL (ñ é em branco)
 */
function alteraMedico($CRM, $email, $senha, $telefone, $nome, $CEP, $endNum, $especialidade)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/medicos.xml";
  $xml->load($arquivoxml);
  foreach ($xml->getElementsByTagName('medico') as $medico) {
    if ($medico->getAttribute('CRM') == $CRM) {
      /*verifica o que vai entrar de dados antigos ou atuais*/
      $nome = ($nome ? $nome : $medico->getAttribute('senha'));
      $email = ($email ? $email : $medico->getElementsByTagName('email')[0]->nodeValue);
      $senha = ($senha ? $senha : $medico->getElementsByTagName('nome')[0]->nodeValue);
      $telefone = ($telefone ? $telefone : $medico->getElementsByTagName('telefone')[0]->nodeValue);
      $CEP = ($CEP ? $CEP : $medico->getElementsByTagName('CEP')[0]->nodeValue);
      $endNum = ($endNum ? $endNum : $medico->getElementsByTagName('endNum')[0]->nodeValue);
      $especialidade = ($especialidade ? $especialidade : $medico->getElementsByTagName('especialidade')[0]->nodeValue);
      /*repopula o elemento Medico com a decisão anterior*/
      $medicoatualizado = $xml->createElement('medico');
      $medicoatualizado->setAttribute('CRM', $CRM);
      $medicoatualizado->setAttribute('senha', $senha);
      $medicoatualizado->appendChild(new DOMElement('nome', $nome));
      $medicoatualizado->appendChild(new DOMElement('email', $email));
      $medicoatualizado->appendChild(new DOMElement('senha', $senha));
      $medicoatualizado->appendChild(new DOMElement('telefone', $telefone));
      $medicoatualizado->appendChild(new DOMElement('CEP', $CEP));
      $medicoatualizado->appendChild(new DOMElement('endNum', $endNum));
      $medicoatualizado->appendChild(new DOMElement('especialidade', $especialidade));
      $medico->parentNode->replaceChild($medicoatualizado, $medico);
      $xml->save($arquivoxml);
      break;
    }
  }
}

function excluiMedico($CRM)
{
  $xml = new DOMDocument();
  libxml_use_internal_errors(true); //TOTALMENTE NECESSÁRIO, ÚTIL DESABILITAR SOMENTE PARA VER ERROS HUMANOS
  $arquivoxml = "../../db/medicos.xml";
  $xml->load($arquivoxml);
  foreach ($xml->getElementsByTagName('medico') as $medico) {
    if ($medico->getAttribute('CRM') == $CRM) {
      $parent = $medico->parentNode;
      $parent->removeChild($medico);
      break;
    }
  }
  $xml->save($arquivoxml);
}

// if (isset($_POST["acao"])) {
//   switch ($_POST["acao"]) {
//     case 'incluiMedico':
//       if (isset($_POST["CRM"], $_POST["email"],  $_POST["telefone"], $_POST["senha"], $_POST["nome"], $_POST["CEP"], $_POST["endNum"], $_POST["especialidade"])) {
//         if (!empty($_POST["CRM"]) && !empty($_POST["email"]) &&  !empty($_POST["telefone"]) && !empty($_POST["senha"]) && !empty($_POST["nome"]) && !empty($_POST["CEP"]) && !empty($_POST["endNum"]) && !empty($_POST["especialidade"])) {
//           incluiMedico($_POST["CRM"], $_POST["email"],  $_POST["telefone"], $_POST["senha"], $_POST["nome"], $_POST["CEP"], $_POST["endNum"], $_POST["especialidade"]);
//           $msg="CRM_"+$_POST["CRM"]+"_INCLUIDO";
//         }
//       }
//       header("Location: ../pages/Admin/form_med.html");
//       break;
//     case 'listaMedicos':
//       $medMatriz = listaMedicos();
//       echo "<pre>";
//       print_r($medMatriz);
//       echo "</pre>";
//       break;
//     case 'excluiMedico':
//       if (isset($_POST["CRM"])) { //só preciso saber obrigatoriamente o CRM
//         if (!empty($_POST["CRM"])){
//           excluiMedico($_POST["CRM"]);
//         }
//       }
//       break;
//     case 'alteraMedico':
//       if (isset($_POST["CRM"])) { //só preciso saber obrigatoriamente o CRM
//         //o resto se tiver eu atualizo, senão vai NULL para deixar como está
//         alteraMedico($_POST["CRM"], (!empty($_POST["email"]) ? $_POST["email"] : NULL), (!empty($_POST["senha"]) ? $_POST["senha"] : NULL), (!empty($_POST["telefone"]) ? $_POST["telefone"] : NULL),(!empty($_POST["nome"]) ? $_POST["nome"] : NULL), (!empty($_POST["CEP"]) ? $_POST["CEP"] : NULL), (!empty($_POST["endNum"]) ? $_POST["endNum"] : NULL), (!empty($_POST["especialidade"]) ? $_POST["especialidade"] : NULL));
//       }
//       break;
//     case 'mostraMedico':
//       if (isset($_POST["CRM"])) { //só preciso saber obrigatoriamente o CRM
//         $medico = mostraMedico($_POST["CRM"]);
//         echo "<pre>";
//         print_r($medico);
//         echo "</pre>";
//       }
//       break;
//     default:
//       echo "Ação não encontrada<br>";
//       break;
//   }
// }
// header("Location: index.php");
