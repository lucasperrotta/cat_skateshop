<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";
	/*$sql = "select * from produto where id_produto=".$_GET['id'];
	$rs = mysql_query($sql, $con);
	while($vetor = mysql_fetch_array($rs)) {*/
	$consultaProduto = $pdo -> prepare("SELECT * FROM produto WHERE id_produto = :id_produto");
	$consultaProduto -> bindValue(":id_produto"   , $_GET['id']   , PDO::PARAM_INT);
	//Executando a QUERY
	$consultaProduto -> execute();
	
	$linha = $consultaProduto->fetchAll(PDO::FETCH_OBJ);

	//while($vetor = mysql_fetch_array($rs)) {
	foreach ($linha as $linhas) {
?>
<h1> <?php echo $linhas->nm_produto ?> </h1>		
<center>
	<img src = 'img/produtos/<?php echo $linhas->foto_produto ?>' height = '250px'>
	<p> <?php echo $linhas->desc_produto ?></p>
	R$<?php echo substr($linhas->preco_produto, 0, -3); ?>,<?php echo substr($linhas->preco_produto, -2); ?>
	<form action="insere_produto_compra.php" method=POST>
		Quantidade:<br>
		<input type="text" name="qtd_produto_pedido" value='1'  size=5 maxlength="10"><br>
		<input type="submit" value="Comprar">
	</form>
</center>
<?php
	}
	include "templates/rodape.php";
?>