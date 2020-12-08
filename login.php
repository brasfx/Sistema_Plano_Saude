<?php

$operation = $_POST["operacao"];

$xmlFile = simplexml_load_file("AccountInfo.xml");
$xmlLocalCopy = new SimpleXMLElement($xmlFile->asXML());



    $login = $_POST["login"];
    $password = $_POST["senha"];
    $tipo = $_POST["opcao"];
    $flag = 0;
    foreach ($xmlLocalCopy as $Accounts)
    {
        $login_pesquisa = $Accounts->login;
        $pass = $Accounts->senha;
        $opcao = $Accounts->opcao;

        $nome = $Accounts->nome;
        $sobrenome =$Accounts->sobrenome;
    }
    if($login == $login_pesquisa && $password == $pass && $tipo == $opcao)  // Tem que ver um jeito melhor de verificar tipo login e senha
    {
        $nome_arquivo = 'usuario_desta_sessao.txt';
        $text = $nome;
        $text.= " ";
        $text.= $sobrenome;
        $file = fopen($nome_arquivo, 'w+');
        fwrite($file, $text);
        fclose($file);

        if($tipo == "Medico"){


            header("location: capamed.html ");
        }
        else
            {
                if($tipo == "Paciente"){
                header("location: capapaciente.html ");
                }
                else{

                if ($tipo == "Secretaria"){
                    header("location: esp.html ");
                }

            }

        }



    }
else
{
    header("location: login.html ");
}
