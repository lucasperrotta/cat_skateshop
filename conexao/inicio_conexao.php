<?php
function conectar ()
{
    $host = "localhost";
    $dbn = "cat_skateshop"; //NOME DO BANCO
    $user = "root"; //USUARIO DO BANCO
    $pass = ""; //SENHA DO USUARIO DO  BANCO

    try {
        $conexao = new PDO("mysql:dbname=$dbn; host=$host", $user, $pass);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch (PDOException $e) { 
        echo "Erro na conexão com o banco de dados.<br/>". $e->getMessage() ;
        die();
    }  
}
$pdo = conectar();   
?>