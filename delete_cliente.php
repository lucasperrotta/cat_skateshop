<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	$id_cliente = $_GET['id'];

	if($con) {
		$sql = "SELECT * FROM cliente WHERE id_cliente = $id_cliente";
		$rs = mysql_query($sql, $con);
		if ($rs) {
			if($vetor = mysql_fetch_array($rs)){
				$sql = "DELETE FROM cliente WHERE id_cliente = $id_cliente";
				$rs = mysql_query($sql, $con);
				if ($rs) {
					echo ("Cliente exluído com sucesso!<br><b><a href='consulta_clientes.php'>Voltar a consulta</a></b> ou vá para a <a href='inxex.php'><b>Página inicial.</b></a>");
					if ($vetor["foto_cliente" != "nouser.png"]) {
						unlink('img/clientes/'.$vetor["foto_cliente"]);
					}
				} else {
					echo ("Erro ao excluir cliente ".mysql_error()."<br><b><a href='consulta_clientes.php'>Tente novamente</a></b> ou vá para a <a href='inxex.php'><b>Página inicial.</b></a>");
				}
			}		
		}else{
			echo ("Erro de consulta necessária para deletar cliente.".mysql_error()."<br><b><a href='consulta_clientes.php'>Tente novamente</a></b> ou vá para a <a href='inxex.php'><b>Página inicial.</b></a>");
		}
	}else{
		echo ("Erro de conexão".mysql_error()."<br><b><a href='consulta_produtos.php'>Tente novamente</a></b> ou vá para a <a href='inxex.php'><b>Página inicial.</b></a>");
	}
	include "templates/rodape.php";
?>