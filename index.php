<?php
require_once 'usuarios.php';
$u = new Usuario;

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
	<h1>ENTRAR</h1>
	<form method="POST">
		<input type="email" placeholder="Email" name="email"> <!-- O PLACEHOLDER SERVE PARA COLOCAR O NOME -->
		<input type="password" placeholder="Senha" name="senha">
		<input type="submit" value="ACESSAR"> <!--BOTÃO-->
		<a href="cadastro.php">Ainda não é inscrito?<br><strong>Cadastre-se!</strong></a>

	</form>
</div>

<?php
if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']); 

	if (!empty($email) && !empty($senha)) 
	{
		$u->conectar("projeto_uninove","localhost","root","");
		if($u->msgErro == "")
		{
			if($u->logar($email,$senha))
			{
				header("location: area_privada.php");
			}
			else
			{
?>
				<div class="msg_erro">
				Email e/ou senha estão incorretos!
				</div>
<?php
			}
		}
		else
		{
?>
				<div class="msg_erro">
				Erro: ".$u->msgErro
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