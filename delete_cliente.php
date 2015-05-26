<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	$id_cliente = $_GET['id'];

	if($con) {
		$sql = "DELETE FROM cliente WHERE id_cliente = $id_cliente";
		$rs = mysql_query($sql, $con);
		if ($rs) {
			echo ("Cliente exluído com sucesso!");
		} else {
			echo ("Erro ao excluir produto ".mysql_error()."<br><b><a href='consulta_clientes.php'>Tente novamente</a></b> ou vá para a <a href='inxex.php'><b>Página inicial.</b></a>");
		}
	} else {
		echo ("Erro de conexão".mysql_error()."<br><b><a href='consulta_clientes.php'>Tente novamente</a></b> ou vá para a <a href='inxex.php'><b>Página inicial.</b></a>");
	}
	include "templates/rodape.php";
?>