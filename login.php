<?php

$operation = $_POST["operacao"];

$xmlFile = simplexml_load_file("Usuarios.xml");
$xmlLocalCopy = new SimpleXMLElement($xmlFile->asXML());

$email = $_POST["email"];
$senha = $_POST["senha"];

$flag = 0;
foreach ($xmlLocalCopy as $Usuario) {
    $email = $Usuario->email;
    $senha = $Usuario->senha;
    $tipo_form = $Usuario->tipo;
}
if (($email == $email)  && ($senha == $senha))  // Tem que ver um jeito melhor de verificar tipo login e senha
{

    if ($tipo_form == "admin") {
        header("location: index.html ");
    }
    if ($tipo_form == "medico") {
        header("location: index_medico.html ");
    }
    if ($tipo_form == "lab") {
        header("location: index_lab.html ");
    }
    if ($tipo_form == "paciente") {
        header("location: index_paciente.html ");
    }
} else {
    echo "Erro ao enviar dados";
    header("location: login.html ");
}
