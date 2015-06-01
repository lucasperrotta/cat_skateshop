<?php
	
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";

	$tem_erro = False;
	$erros = 0;

	if ($_FILES["foto_cliente"]["error"] == 0) {
		$ext = substr($_FILES["foto_cliente"]["name"], strpos(strrev($_FILES["foto_cliente"]["name"]), ".") * -1);
		$foto_cliente = md5(time().$_FILES["foto_cliente"]["name"]).".".$ext;
		move_uploaded_file($_FILES['foto_cliente']['tmp_name'], "img/clientes/".$foto_cliente);
	}else{
		$foto_cliente = "nouser.png";
	}
	
	if ( !empty($_POST['nm_cliente']) and !empty($_POST['cpf_cliente']) and !empty($_POST['sexo_cliente']) and !empty($_POST['tel_cliente']) and !empty($_POST['cep_cliente']) and !empty($_POST['uf_cliente']) and !empty($_POST['cidade_cliente']) and !empty($_POST['bairro_cliente']) and !empty($_POST['rua_cliente']) and !empty($_POST['numero_cliente']) and !empty($_POST['email_cliente']) and !empty($_POST['nm_usuario_cliente']) and !empty($_POST['senha_cliente']) ) {
		$nm_cliente = $_POST['nm_cliente'];

		$cpf_cliente = $_POST['cpf_cliente'];

		$sexo_cliente = $_POST['sexo_cliente'];

		$dt_nasc_cliente = $_POST['dt_nasc_cliente'];
		
		$tel_cliente = $_POST['tel_cliente'];
		
		$cel_cliente = $_POST['cel_cliente'];
		
		$cep_cliente = $_POST['cep_cliente'];
		
		$uf_cliente = $_POST['uf_cliente'];
		
		$cidade_cliente = $_POST['cidade_cliente'];
		
		$bairro_cliente = $_POST['bairro_cliente'];
		
		$rua_cliente = $_POST['rua_cliente'];
		
		$numero_cliente = $_POST['numero_cliente'];
		
		$complemento_cliente = $_POST['complemento_cliente'];
		
		$email_cliente = $_POST['email_cliente'];
		
		$nm_usuario_cliente = $_POST['nm_usuario_cliente'];
		
		$confirma_senha = $_POST['confirmasenha_cliente'];
		$senha_teste = $_POST['senha_cliente'];
		if ($confirma_senha == $senha_teste) {
			$senha_cliente = sha1($senha_teste);
		} else {
			echo "Confirma senha não corresponde com sua senha. <b><a href='cadastra_cliente.php'>Tente novamente</a></b><br>";
			$tem_erro = True;
			$erros++;
		}

	} else {
		$tem_erro = True;
		echo "Preencha todos os campos obrigatórios para realizar cadastro! <b><a href='cadastra_cliente.php'>Tente novamente</a></b>";
	}

	if($con and $tem_erro == False) {
		$sql = "insert into cliente (nm_cliente, cpf_cliente, sexo_cliente, dt_nasc_cliente, tel_cliente, cel_cliente, cep_cliente, uf_cliente, cidade_cliente, bairro_cliente, rua_cliente, numero_cliente, complemento_cliente, email_cliente, nm_usuario_cliente, senha_cliente, foto_cliente) values ('$nm_cliente', '$cpf_cliente', '$sexo_cliente', '$dt_nasc_cliente', '$tel_cliente', '$cel_cliente', '$cep_cliente', '$uf_cliente', '$cidade_cliente', '$bairro_cliente', '$rua_cliente', '$numero_cliente', '$complemento_cliente', '$email_cliente', '$nm_usuario_cliente', '$senha_cliente', '$foto_cliente')";
		$rs  = mysql_query($sql, $con);
		if ($rs) {
			echo "<h1>Cadastro realizado com sucesso.</h1><br><a href='index.php'><b>Prosseguir</b></a>";
		}else {
			echo ("Erro de inclusão: ".mysql_error());
		}
	} else {
		echo ("Erro de conexão".mysql_error());
	}

	include "templates/rodape.php";
?>