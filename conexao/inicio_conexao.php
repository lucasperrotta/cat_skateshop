<?php
$con = mysql_connect("localhost", "root", "")
	or die ("A conexão com o servidor não foi executada com sucesso!");
$db = mysql_select_db("cat_skateshop", $con)
	or die ("Não foi possível selecionar o banco de dados!");
?>