<?php
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	if($con) {
		$sql = "select * from cliente where id_cliente=".$_GET['id'];
		$rs = mysql_query($sql, $con);
		if ($rs) {
			if ($vetor = mysql_fetch_array($rs)) { 
?>
<h1>Cadastro de cliente: (* = Obrigatório!)</h1>
<hr>
<form name="incCliente" action="update_cliente.php" method=POST>
	<input type=hidden name="id_cliente" value=<?php echo $vetor['id_cliente'] ?>>
	
	<h2>Dados Pessoais</h2>
	Nome completo *<br>
	<input type="text" name="nm_cliente" size=20 maxlength="60" value=<?php echo $vetor["nm_cliente"] ?>> <br>
	CPF(Somente números) *<br>
	<input type="text" name="cpf_cliente" size=13 maxlength="11" value=<?php echo $vetor['cpf_cliente'] ?>><br>
	Sexo *<br>
		<input type="radio" name="sexo_cliente" value="m" <?php echo $vetor['sexo_cliente'] == "m"?"CHECKED":""?>>Masculino</input>
		<input type="radio" name="sexo_cliente" value="f" <?php echo $vetor['sexo_cliente'] == "f"?"CHECKED":""?>>Feminino</input><br>
	Data de nascimento *<br> <input type="date" name="dt_nasc_cliente" size=20 maxlength="10" value=<?php echo $vetor['dt_nasc_cliente'] ?>><br>
	Telefone(Somente números) *<br> <input type="text" name="tel_cliente" size=13 maxlength="10" value=<?php echo $vetor['tel_cliente'] ?>><br>
	Celular(Somente números)<br> <input type="text" name="cel_cliente" size=13 maxlength="11" value=<?php echo $vetor['cel_cliente'] ?>><br>

	<h2>Endereço</h2>
	CEP(Somente números)*<br> <input type="text" name="cep_cliente" size=10 maxlength="8" value=<?php echo $vetor['cep_cliente'] ?>><br>
	UF(Estado)*<br> <input type="text" name="uf_cliente" size=20 maxlength="2" value=<?php echo $vetor['uf_cliente'] ?>><br>
	Cidade*<br> <input type="text" name="cidade_cliente" size=20 maxlength="70" value=<?php echo $vetor['cidade_cliente'] ?>><br>
	Bairro*<br>  <input type="text" name="bairro_cliente" size=20 maxlength="70" value=<?php echo $vetor['bairro_cliente'] ?>><br>
	Rua*<br>  <input type="text" name="rua_cliente" size=20 maxlength="70" value=<?php echo $vetor['rua_cliente'] ?>><br>
	Número*<br>  <input type="text" name="numero_cliente" size=20 maxlength="20" value=<?php echo $vetor['numero_cliente'] ?>><br>
	Complemento<br>  <input type="text" name="complemento_cliente" size=20 maxlength="70" value=<?php echo $vetor['complemento_cliente'] ?>><br>

	<h2>Dados usuário</h2>
	Email*<br> <input type="text" name="email_cliente" size=20 maxlength="70" value=<?php echo $vetor['email_cliente'] ?>><br>
	Nome de usuário*<br> <input type="text" name="nm_usuario_cliente" size=20 maxlength="20" value=<?php echo $vetor['nm_usuario_cliente'] ?>><br>
	Senha*<br> <input type="text" name="senha_cliente" size=20 maxlength="20" value=<?php echo $vetor['senha_cliente'] ?>><br>
	Confirma senha*<br> <input type="text" name="confirmasenha_cliente" size=20 maxlength="20" value=<?php echo $vetor['senha_cliente'] ?>><br>

	<br>
		<input type="submit" value="Alterar">

</form> 

<?php 
			}else{
				echo "Cliente não cadastrado. <br><b><a href='consulta_clientes.php'>Voltar</a></b>";
			}

		}else{
			echo "Erro de consulta de consulta de cliente: ".mysql_error();
		}

 	}else{
 		echo "Erro de conexão: ".mysql_error();
 	}

 	include "templates/rodape.php";
?>