<?php

$operation = $_POST["operacao"];

$xmlFile = simplexml_load_file("Usuarios.xml");
$xmlLocalCopy = new SimpleXMLElement($xmlFile->asXML());

$email_form = (isset($_POST['email']));
$senha_form = (isset($_POST['senha']));

$flag = 0;
foreach ($xmlLocalCopy as $Usuario) {
    $email = $Usuario->email;
    $senha = $Usuario->senha;
    $tipo_form = $Usuario->tipo;
}

if ($email_form == $email  && $senha_form == $senha)   // Tem que ver um jeito melhor de verificar tipo login e senha
{
    if ($tipo_form == "admin") {
        header("location: index.html ");
    } else if ($tipo_form == "medico") {
        header("location: index_medico.html ");
    } else if ($tipo_form == "lab") {
        header("location: index_lab.html ");
    } else if ($tipo_form == "paciente") {
        header("location: index_paciente.html ");
    }
} else {

    header("location: login.html ");
}
