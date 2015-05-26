<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";
?>
<h1>Consulta de Clientes</h1>

<h2>Identificação</h2>
<table cellspacing=0 align="center" border=1 width=100% class="consultaDados">
		<tr>
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
		<td><?php echo $vetor["nm_cliente"]; ?></td>
		<td><?php echo $vetor["cpf_cliente"]; ?></td>
		<td><?php echo (($vetor["sexo_cliente"] == "m")?"Masculino":"Feminino"); ?></td>
		<td><a href='altera_cliente.php?id= <?php echo $vetor["id_cliente"]; ?>'>Alterar dados de cliente</a></td>
		<td><a href='delete_cliente.php?id= <?php echo $vetor["id_cliente"]; ?>'>Deletar cliente</a></td>
	</tr>	
<?php
	}
?>
</table>
<?php
	include "templates/rodape.php"
?>
