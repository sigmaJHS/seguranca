<?php

session_start();
$_SESSION['token'] = md5("playstation2".time());

?>

<html>

<head>
	<style>
	#loginForm{
		width: 40%;
		margin: 50px 30%;
		padding: 30px;
		background: #999;
	}
	input{
		display: block;
		width: 100%;
		margin-bottom: 25px;
	}
	</style>
</head>

<body>

	<form id="loginForm" action="php/login.php" method="POST">
		<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>">
		<input type="text" name="login" placeholder="login">
		<input type="password" name="senha" placeholder="senha">
		<div align="right">
			<button>Enviar</button>
		</div>
	</form>

</body>

</html>