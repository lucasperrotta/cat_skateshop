<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	if($con) {
		$sql = "select * from produto where id_produto=".$_GET['id'];
		$rs = mysql_query($sql, $con);
		if ($rs) {
			if ($vetor = mysql_fetch_array($rs)) { 
?>

<form name="altProduto" action="update_produto.php" method=POST>
	<input type=hidden name="id_produto" value=<?php echo $vetor['id_produto'] ?>>
	<h1>Alterar dados do produto:</h1>

	Nome do Produto <br> <input type="text" name="nm_produto" size=40 maxlength="60" value=<?php echo $vetor['nm_produto'] ?>> <br>

	Categoria:<br>
		<input type="radio" name="cat_produto" value="lixa" <?php echo $vetor['cat_produto'] == "lixa"?"CHECKED":""?>>Lixa</input><br>
		<input type="radio" name="cat_produto" value="shape" <?php echo $vetor['cat_produto'] == "shape"?"CHECKED":""?>>Shape</input><br>
		<input type="radio" name="cat_produto" value="truck" <?php echo $vetor['cat_produto'] == "truck"?"CHECKED":""?>>Truck</input><br>
		<input type="radio" name="cat_produto" value="rolamento" <?php echo $vetor['cat_produto'] == "rolamento"?"CHECKED":""?>>Rolamento</input><br>
		<input type="radio" name="cat_produto" value="rodas" <?php echo $vetor['cat_produto'] == "rodas"?"CHECKED":""?>>Rodas</input><br>
		<input type="radio" name="cat_produto" value="parafusos" <?php echo $vetor['cat_produto'] == "parafusos"?"CHECKED":""?>>Parafusos</input><br>
		<input type="radio" name="cat_produto" value="acessorios" <?php echo $vetor['cat_produto'] == "acessorios"?"CHECKED":""?>>Acessórios</input><br>
		<input type="radio" name="cat_produto" value="stickers" <?php echo $vetor['cat_produto'] == "stickers"?"CHECKED":""?>>Sticker's</input><br>

	Preço <br> <input type="text" name="preco_produto" size=10 maxlength="10" value=<?php echo $vetor['preco_produto'] ?>><br>

	Quantidade <br> <input type="text" name="qtd_produto" size=10 maxlength="10" value=<?php echo $vetor['qtd_produto'] ?>><br>

	Descrição <br>
		<TEXTAREA NAME="desc_produto" colls='8' rows='3'><?php echo $vetor['desc_produto'] ?></TEXTAREA><br>

	<br>
		<input type="submit" value="Alterar">

</form> 

<?php 
			}else{
				echo "Produto não cadastrado. <br><b><a href='consulta_produtos.php'>Voltar</a></b>";
			}

		}else{
			echo "Erro de consulta de consulta de produto: ".mysql_error();
		}

 	}else{
 		echo "Erro de conexão: ".mysql_error();
 	}

 	include "templates/rodape.php";
?>