<?php
	
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	$tem_erro = False;

	if (!empty($_POST['nm_produto']) and !empty($_POST['cat_produto']) and !empty($_POST['desc_produto']) and !empty($_POST['preco_produto']) and!empty($_POST['qtd_produto']) ) {
		$nm_produto   = $_POST['nm_produto'];
		$cat_produto  = $_POST['cat_produto'];
		$desc_produto = $_POST['desc_produto'];
		$preco_produto = $_POST['preco_produto'];
		$qtd_produto = $_POST['qtd_produto'];
	} else {
		$tem_erro = True;
		echo "Preencha todos os campos obrigatórios para realizar o cadastro do produto! <b><a href='cadastra_cliente.php'>Tente novamente</a></b>";
	}
	
	if($con and $tem_erro == False) {
		$sql = "insert into produto (nm_produto, cat_produto, desc_produto, preco_produto, qtd_produto) values ('$nm_produto', '$cat_produto', '$desc_produto', $preco_produto, $qtd_produto)";
		$rs = mysql_query($sql, $con);
		if ($rs) {
			echo "<h1>Produto cadastrado com sucesso.</h1><br><a href='index.php'><b>Prosseguir</b></a>";
		}else {
			echo ("Erro de inclusão: ".mysql_error());
		}
	} else {
		echo ("Erro de conexão".mysql_error());
	}

	include "templates/rodape.php";
?>
