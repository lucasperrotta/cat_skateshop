<?php 
	include "templates/cabecario.php";
	include "templates/menu_horizontalcomsidebar.php";
?>
<h1>Lançamentos</h1>
<?php 
	/* Código antigo
	$sql = "select * from produto order by id_produto desc;";
	$rs = mysql_query($sql, $con);
	*/
	$buscaPonto = $pdo -> prepare("SELECT * FROM produto ORDER BY id_produto DESC");
	//Executando a QUERY
	$buscaPonto -> execute();
	
	$linha = $buscaPonto->fetchAll(PDO::FETCH_OBJ);
	
	/*Exibição antiga
	while($vetor = mysql_fetch_array($rs)) {
		$nm_produto = $vetor['nm_produto'];
		$foto_produto = $vetor['foto_produto'];
		$preco_produto = $vetor['preco_produto']; */
	foreach ($linha as $linhas) {
		$nm_produto = $linhas->nm_produto;
		$foto_produto = $linhas->foto_produto;
		$preco_produto = $linhas->preco_produto;
?>		

	<div class='produto'>
		<div class='imgproduto'>
			<center><img src = 'img/produtos/<?php echo $foto_produto?>'></center>
		</div>
		<div class='nomeproduto'>
			<?php 
				if (strlen($nm_produto) > 12) {
					echo $nm_produto = substr($nm_produto, 0, 15); 
				}else{
					echo $nm_produto;
				}
			?>
		</div>
		<div class='precoproduto'>
			R$<?php echo substr($preco_produto, 0, -3); ?>,<?php echo substr($preco_produto, -2); ?>
		</div>
		<center class="linkvermais"><a  href='detalhe_produto.php?id=<?php echo $vetor["id_produto"]; ?>'>Ver mais</a></center>
	</div>

<?php 
	}
	include "templates/rodape.php";
?>