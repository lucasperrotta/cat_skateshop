<?php 
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

?>
<h1>Cadastro de Produtos:</h1>
<hr>

<form name="incProduto" action="insere_produto.php" method=POST enctype='multipart/form-data'>
	Nome do Produto <br> <input type="text" name="nm_produto" size=40 maxlength="60"> <br>
	Foto:<input type = 'file' name = 'foto_produto' id = 'foto_produto'><br>
	Categoria:<br>
		<input type="radio" name="cat_produto" value="lixa">Lixa</input><br>
		<input type="radio" name="cat_produto" value="shape">Shape</input><br>
		<input type="radio" name="cat_produto" value="truck">Truck</input><br>
		<input type="radio" name="cat_produto" value="rolamento">Rolamento</input><br>
		<input type="radio" name="cat_produto" value="rodas">Rodas</input><br>
		<input type="radio" name="cat_produto" value="parafusos">Parafusos</input><br>
		<input type="radio" name="cat_produto" value="acessorios">Acessórios</input><br>
		<input type="radio" name="cat_produto" value="stickers">Sticker's</input><br>

	Preço <br> <input type="text" name="preco_produto" size=10 maxlength="10"><br>

	Quantidade <br> <input type="text" name="qtd_produto" size=10 maxlength="10"><br>

	Descrição <br>
		<TEXTAREA NAME="desc_produto" colls='8' rows='3'></TEXTAREA><br>

	<br>
		<input type="submit" value="Cadastrar">

</form>	
<?php 
	include "templates/rodape.php";
?>