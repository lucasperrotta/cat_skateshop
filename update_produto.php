<?php 
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	$tem_erro = False;
	$erro_foto = False;
	$foto_produto = $_POST['foto_atual'];
	if($_FILES["foto_produto"]["error"] == 0){
		//FOTO
		$ext = substr($_FILES["foto_produto"]["name"], strpos(strrev($_FILES["foto_produto"]["name"]), ".") * -1);
		$foto_produto = md5(time().$_FILES["foto_produto"]["name"]).".".$ext;
		move_uploaded_file($_FILES["foto_produto"]["tmp_name"], "img/produtos/".$foto_produto);
		unlink('img/produtos/'.$_POST['foto_atual']);
	}

	if (!empty($_POST['nm_produto']) and !empty($_POST['cat_produto']) and !empty($_POST['desc_produto']) and !empty($_POST['preco_produto']) and!empty($_POST['qtd_produto'])) {
		$id_produto = $_POST['id_produto'];
		$nm_produto   = $_POST['nm_produto'];
		$cat_produto  = $_POST['cat_produto'];
		$desc_produto = $_POST['desc_produto'];
		$preco_produto = $_POST['preco_produto'];
		$qtd_produto = $_POST['qtd_produto'];
	} else {
		$tem_erro = True;
		echo "Todos os campos devem estar preenchidos para concluir a alteração! <b><a href='cadastra_cliente.php'>Tente novamente</a></b>";
	}
	
	if($con and $tem_erro == False and $erro_foto == False) {
		$sql = "UPDATE produto set 
					nm_produto = '$nm_produto',
					cat_produto = '$cat_produto',
					desc_produto = '$desc_produto',
					preco_produto = $preco_produto,
					qtd_produto = $qtd_produto,
					foto_produto = '$foto_produto'
				WHERE id_produto = $id_produto";
		$rs = mysql_query($sql, $con);
		if ($rs) {
			echo "<h1>Produto editado com sucesso.</h1><br><a href='consulta_produtos.php'><b>Continuar editando</b></a> ou <a href='index.php'><b>ir para página inicial.</b></a>";
		}else {
			echo ("Erro de atualização de dados: ".mysql_error());
		}
	} else {
		echo ("Erro de conexão".mysql_error());
	}

	include "templates/rodape.php";
?>