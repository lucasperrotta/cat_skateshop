<?php 
	include "templates/cabecario.php";
	include "templates/menu_horizontalcomsidebar.php";
?>
<h1>Lançamentos</h1>
<?php 
	$sql = "select * from produto order by id_produto desc;";
	$rs = mysql_query($sql, $con);
	while($vetor = mysql_fetch_array($rs)) {
		$nm_produto = $vetor['nm_produto'];
		$foto_produto = $vetor['foto_produto'];
		$preco_produto = $vetor['preco_produto'];
?>		

	<div class='produto'>
		<div class='imgproduto'>
			<center><img src = 'img/produtos/<?php echo $vetor["foto_produto"]?>' height = '120px' ></center>
		</div>
		<div class='nomeproduto'>
			<?php 
				if (strlen($nm_produto) > 20) {
					echo $nm_produto = substr($nm_produto, 0, 20)."..."; 
				}else{
					echo $nm_produto;
				}
			?>
		</div>
		<div class='precoproduto'>
			R$<?php echo $preco_produto; ?>,00
		</div>
		<center class="linkvermais"><a  href='detalhe_produto.php?id=<?php echo $vetor["id_produto"]; ?>'>Ver mais</a></center>
	</div>

<?php 
	}
	include "templates/rodape.php";
?>