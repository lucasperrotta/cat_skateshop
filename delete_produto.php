<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	$id_produto = $_GET['id'];
	$consultaProduto = $pdo -> prepare("SELECT * FROM produto WHERE id_produto = :id_produto");
	$consultaProduto -> bindValue(":id_produto", $id_produto, PDO::PARAM_INT);
	$consultaProduto -> execute();
	
	$linha = $consultaProduto->fetchAll(PDO::FETCH_OBJ);
	
	foreach ($linha as $linhas) {
		$foto_produto = $linhas->foto_produto;
		$deleteProduto = $pdo -> prepare("DELETE FROM produto WHERE id_produto = :id_produto");
		$deleteProduto -> bindValue(":id_produto", $id_produto, PDO::PARAM_INT);
		$deleteProduto -> execute();
		echo ("Produto exluído com sucesso!");
		unlink("img/produtos/".$foto_produto);
	}

	include "templates/rodape.php";
?>