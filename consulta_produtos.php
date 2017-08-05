<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";
?>
<h1>Consulta de Produtos</h1>

<table id="table">
		<tr>
			<th>ID</th>
			<th>Foto</th>
			<th>Nome</th>
			<th>Categoria</th>
			<th>Preço</th>
			<th>Quantidade</th>
			<th>Descrição</th>
			<th>Alterar</th>
			<th>Excluir</th>
		</tr>
<?php
	/*$sql = "select * from produto;";
	$rs = mysql_query($sql, $con);*/
	$consultaProduto = $pdo -> prepare("SELECT * FROM produto ORDER BY id_produto DESC LIMIT 12");
	//Executando a QUERY
	$consultaProduto -> execute();
	
	$linha = $consultaProduto->fetchAll(PDO::FETCH_OBJ);

	//while($vetor = mysql_fetch_array($rs)) {
	foreach ($linha as $linhas) {
?>
	<tr>

		<td><?php echo $linhas->id_produto; ?></td>
		<?php $foto_produto = "img/produtos/".$linhas->foto_produto;?>
			<td align='center'> 
				<img src="img/produtos/<?php echo $linhas->foto_produto;?>" height='100px'>
			</td>
		<td><?php echo $linhas->nm_produto   ; ?></td>
		<td><?php echo $linhas->cat_produto  ; ?></td>
		<td><?php echo $linhas->preco_produto; ?></td>
		<td><?php echo $linhas->qtd_produto  ; ?></td>
		<td><?php echo $linhas->desc_produto ; ?></td>

		<td><a href='altera_produto.php?id= <?php echo $vetor["id_produto"]; ?>'> <img src="img/icone_editar.png" width="20"></a></td>
		<td><a href='delete_produto.php?id= <?php echo $vetor["id_produto"]; ?>'><img src="img/icone_deletar.png" width="20"></a></td>
	</tr>	
<?php
	}
?>
</table>
<?php
	include "templates/rodape.php"
?>
