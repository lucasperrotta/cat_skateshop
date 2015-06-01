<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";
	$sql = "select * from produto where id_produto=".$_GET['id'];
	$rs = mysql_query($sql, $con);
	while($vetor = mysql_fetch_array($rs)) {
?>
<h1> <?php echo $vetor["nm_produto"] ?> </h1>		
<center>
	<img src = 'img/produtos/<?php echo $vetor["foto_produto"]?>' height = '250px'>
	<p> <?php echo $vetor["desc_produto"] ?></p>
	R$<?php echo $vetor['preco_produto']; ?>,00
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