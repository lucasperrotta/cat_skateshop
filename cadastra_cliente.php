 	<?php 
	include "templates/cabecario.php";
	include "templates/menu_horizontal.php";
?>
<h1>Cadastro de cliente: (* = Obrigatório!)</h1>
<hr>
<form name="incCliente" action="insere_cliente.php" method=POST enctype='multipart/form-data'>
	
	<h2>Dados Pessoais</h2>
	Nome completo *<br>
	<input type="text" name="nm_cliente" size=20 maxlength="60"> <br>
	CPF(Somente números) *<br>
	<input type="text" name="cpf_cliente" size=13 maxlength="11"><br>
	Sexo *<br>
		<input type="radio" name="sexo_cliente" value="m">Masculino</input>
		<input type="radio" name="sexo_cliente" value="f">Feminino</input><br>
	Data de nascimento *<br> <input type="date" name="dt_nasc_cliente" size=20 maxlength="10"><br>
	Telefone(Somente números) *<br> <input type="text" name="tel_cliente" size=13 maxlength="10"><br>
	Celular(Somente números)<br> <input type="text" name="cel_cliente" size=13 maxlength="11"><br>

	<h2>Endereço</h2>
	CEP(Somente números)*<br> <input type="text" name="cep_cliente" size=10 maxlength="8"><br>
	UF(Estado)*<br> <input type="text" name="uf_cliente" size=20 maxlength="2"><br>
	Cidade*<br> <input type="text" name="cidade_cliente" size=20 maxlength="70"><br>
	Bairro*<br>  <input type="text" name="bairro_cliente" size=20 maxlength="70"><br>
	Rua*<br>  <input type="text" name="rua_cliente" size=20 maxlength="70"><br>
	Número*<br>  <input type="text" name="numero_cliente" size=20 maxlength="20"><br>
	Complemento<br>  <input type="text" name="complemento_cliente" size=20 maxlength="70"><br>

	<h2>Dados usuário</h2>
	Foto<br><input type='file' name='foto_cliente' id='foto_cliente'><br>
	Email*<br> <input type="text" name="email_cliente" size=20 maxlength="70"><br>
	Nome de usuário*<br> <input type="text" name="nm_usuario_cliente" size=20 maxlength="20"><br>
	Senha*<br> <input type="password" name="senha_cliente" size=20 maxlength="20"><br>
	Confirma senha*<br> <input type="password" name="confirmasenha_cliente" size=20 maxlength="20"><br>
	<br>
		<input type="submit" value="Finalizar Cadastro">

</form>	
<?php 
	include "templates/rodape.php";
?>