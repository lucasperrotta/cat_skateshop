<?php
	
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	$tem_erro = False;

	if (!empty($_POST['nm_produto']) and !empty($_POST['cat_produto']) and !empty($_POST['desc_produto']) and !empty($_POST['preco_produto']) and!empty($_POST['qtd_produto']) and $_FILES["foto_produto"]["error"] == 0) {
		$nm_produto   = $_POST['nm_produto'];
		$cat_produto  = $_POST['cat_produto'];
		$desc_produto = $_POST['desc_produto'];
		$preco_produto = $_POST['preco_produto'];
		$qtd_produto = $_POST['qtd_produto'];

		//FOTO
		$ext = substr($_FILES["foto_produto"]["name"], strpos(strrev($_FILES["foto_produto"]["name"]), ".") * -1);
		$foto_produto = md5(time().$_FILES["foto_produto"]["name"]).".".$ext;
		move_uploaded_file($_FILES['foto_produto']['tmp_name'], "img/produtos/".$foto_produto);
	} else {	
		$tem_erro = True;
		echo "<p class='linkfeedback'>Preencha todos os campos para realizar o cadastro do produto! <b><a href='cadastra_produto.php'>Tente novamente</a></b></p>";
	}
	
	if($con and $tem_erro == False) {
		$sql = "insert into produto (nm_produto, cat_produto, desc_produto, preco_produto, qtd_produto, foto_produto) values ('$nm_produto', '$cat_produto', '$desc_produto', '$preco_produto', $qtd_produto, '$foto_produto')";
		$rs = mysql_query($sql, $con);
		if ($rs) {
			echo "<h1>Produto cadastrado com sucesso.</h1><br><p class='linkfeedback'><a href='index.php'><b>Prosseguir</b></a></p>";
		}else {
			echo ("Erro de inclusão: ".mysql_error());
		}
	} else {
		echo ("Erro de conexão".mysql_error());
	}

	include "templates/rodape.php";
?>
