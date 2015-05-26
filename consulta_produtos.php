<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";
?>
<h1>Consulta de Produtos</h1>

<table border=1 width=100% class="consultaDados">
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Categoria</th>
			<th>Preço</th>
			<th>Quantidade</th>
			<th>Descrição</th>
			<th>Alterar</th>
			<th>Excluir</th>
		</tr>
<?php
	$sql = "select * from produto;";
	$rs = mysql_query($sql, $con);
	while($vetor = mysql_fetch_array($rs)) {
?>
	<tr>
		<td><?php echo $vetor["id_produto"]; ?></td>
		<td><?php echo $vetor["nm_produto"]; ?></td>
		<td><?php echo $vetor["cat_produto"]; ?></td>
		<td><?php echo $vetor["preco_produto"]; ?></td>
		<td><?php echo $vetor["qtd_produto"]; ?></td>
		<td><?php echo $vetor["desc_produto"]; ?></td>

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
