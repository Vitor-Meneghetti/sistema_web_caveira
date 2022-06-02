<?php
	require_once 'usuarios.php';
	$u = new usuario;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Projeto UNINOVE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="corpo-form">
	<h1>Cadastrar</h1>
	<form method="POST">
		<input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
		<input type="text" name="telefone" placeholder="Telefone" maxlength="30"> 
		<input type="email" name="email" placeholder="Email" maxlength="40"> <!-- O PLACEHOLDER SERVE PARA COLOCAR O NOME -->
		<input type="password" name="senha" placeholder="Senha" maxlength="15">
		<input type="password" name="confSenha" placeholder="Confirmar Senha">
		<input type="submit" value="CADASTRAR"> <!-- BOTÃO -->

	</form>
	</div>
<?php
//verificar de clicou no botão cadastrar
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']); 
	$confirmarSenha = addslashes($_POST['confSenha']);
	//verificar se esta tudo preenchido
	if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) 
	{
		$u->conectar("projeto_uninove","localhost","root","");
		if($u->msgErro == "")
		{
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome,$telefone,$email,$senha))
				{
					?>
					<div id="msg_sucesso">
					Cadastrado com sucesso! Acesse parar entrar!
					</div>
					<?php
				}
				else
				{
					?>
					<div class="msg_erro">
					Email já cadastrado!
					</div>
					<?php
				}
			}
			else
			{
					?>
					<div class="msg_erro">
					Senha e confirmar senha não correspondem!
					</div>
					<?php
			}
		}
		else
		{
					?>
					<div class="msg_erro">
						<?php echo "Erro: ".$u->msgErro;?>
					</div>
					<?php
		}

		}else
		{

					?>
					<div class="msg_erro">
					Preencha todos os campos!
					</div>
					<?php  
	}
}
?>

</body>
</html>