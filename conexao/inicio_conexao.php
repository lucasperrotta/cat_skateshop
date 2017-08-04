<?php
function conectar ()
{
    $host = "localhost";
    $dbn = "cat_skateshop"; //NOME DO BANCO
    $user = "root"; //USUARIO DO BANCO
    $pass = ""; //SENHA DO USUARIO DO  BANCO

    $conexao = new PDO("mysql:dbname=$dbn; host=$host", $user, $pass);

    return $conexao;
}

conectar();

if (!conectar()) {
    echo "Erro ao tentar conectar com o banco.";
}

$pdo = conectar();
?>