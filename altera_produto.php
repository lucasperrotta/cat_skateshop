<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	
	$id_produto = $_GET['id'];
	$consultaProduto = $pdo -> prepare("SELECT * FROM produto WHERE id_produto = :id_produto");
	$consultaProduto -> bindValue(":id_produto", $id_produto, PDO::PARAM_INT);
	$consultaProduto -> execute();
	
	$linha = $consultaProduto->fetchAll(PDO::FETCH_OBJ);
	
	foreach ($linha as $linhas) {
?>

<form name="altProduto" action="update_produto.php" method=POST enctype='multipart/form-data'>
	<input type='hidden' name='foto_atual' value="<?php echo $linhas->foto_produto?>">
	<input type=hidden name="id_produto" value=<?php echo $linhas->id_produto ?>>
	<h1>Alterar dados do produto:</h1>

	Nome do Produto <br> <input type="text" name="nm_produto" size=40 maxlength="60" value="<?php echo $linhas->nm_produto ?>"> <br>
	Foto<br><img src="img/produtos/<?php echo $linhas->foto_produto; ?>" height="200"><br>
	Alterar foto: <input type='file' name='foto_produto' id='foto_produto'><br>
	Categoria:<br>
		<input type="radio" name="cat_produto" value="lixa" <?php echo $linhas->cat_produto == "lixa"?"CHECKED":""?>>Lixa</input><br>
		<input type="radio" name="cat_produto" value="shape" <?php echo $linhas->cat_produto == "shape"?"CHECKED":""?>>Shape</input><br>
		<input type="radio" name="cat_produto" value="truck" <?php echo $linhas->cat_produto == "truck"?"CHECKED":""?>>Truck</input><br>
		<input type="radio" name="cat_produto" value="rolamento" <?php echo $linhas->cat_produto == "rolamento"?"CHECKED":""?>>Rolamento</input><br>
		<input type="radio" name="cat_produto" value="rodas" <?php echo $linhas->cat_produto == "rodas"?"CHECKED":""?>>Rodas</input><br>
		<input type="radio" name="cat_produto" value="parafusos" <?php echo $linhas->cat_produto == "parafusos"?"CHECKED":""?>>Parafusos</input><br>
		<input type="radio" name="cat_produto" value="acessorios" <?php echo $linhas->cat_produto == "acessorios"?"CHECKED":""?>>Acessórios</input><br>
		<input type="radio" name="cat_produto" value="stickers" <?php echo $linhas->cat_produto == "stickers"?"CHECKED":""?>>Sticker's</input><br>

	Preço <br> <input type="text" name="preco_produto" size=10 maxlength="10" value=<?php echo $linhas->preco_produto ?>><br>

	Quantidade <br> <input type="text" name="qtd_produto" size=10 maxlength="10" value=<?php echo $linhas->qtd_produto ?>><br>

	Descrição <br>
		<TEXTAREA NAME="desc_produto" colls='8' rows='3'><?php echo $linhas->desc_produto ?></TEXTAREA><br>

	<br>
		<input type="submit" value="Alterar">

</form> 

<?php 
	}
 	include "templates/rodape.php";
?>