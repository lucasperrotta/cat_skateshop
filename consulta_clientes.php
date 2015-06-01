<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";
?>
<h1>Consulta de Clientes</h1>

<center><h2>Identificação</h2></center>
<table id="table">
		<tr>
			<th>Foto</th>
			<th>Nome</th>			
			<th>CPF</th>
			<th>Sexo</th>
			<th>Altera</th>
			<th>Excluir</th>
		</tr>
<?php
	$sql = "select * from cliente;";
	$rs = mysql_query($sql, $con);
	while($vetor = mysql_fetch_array($rs)) {
?>
	<tr>
		<td align='center'> 
			<img src="img/clientes/<?php echo $vetor['foto_cliente']?>" height='100px'>
		</td>
		<td><?php echo $vetor["nm_cliente"]; ?></td>
		<td><?php echo $vetor["cpf_cliente"]; ?></td>
		<td><?php echo (($vetor["sexo_cliente"] == "m")?"Masculino":"Feminino"); ?></td>
		<td><a href='altera_cliente.php?id= <?php echo $vetor["id_cliente"]; ?>'> <img src="img/icone_editar.png" width="20"></a></td>
		<td><a href='delete_cliente.php?id= <?php echo $vetor["id_cliente"]; ?>'><img src="img/icone_deletar.png" width="20"></a></td>
	</tr>	
<?php
	}
?>
</table>
<?php
	include "templates/rodape.php"
?>
