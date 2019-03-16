<?php

	$c = new PDO("mysql:host=localhost;dbname=sistema_seguro","root","");
	
	$c->exec("INSERT INTO tentativa (ip) VALUES('".$_SERVER['REMOTE_ADDR']."')");
	
	$t = $c->query("SELECT CURRENT_TIMESTAMP as time")->fetch();
	$t = $t['time'];
	$t = date('Y-m-d H:i:s', strtotime('-15 minutes', strtotime($t)));
	
	$check = $c->query("SELECT id FROM tentativa WHERE ip='".$_SERVER['REMOTE_ADDR']."' AND datahora BETWEEN '".$t."' AND CURRENT_TIMESTAMP");
	if($check->rowCount() >= 5){
		die("Limite de tentativas atingido");
	}else{
		
		$s = $c->prepare("SELECT id FROM usuario WHERE login = :l AND senha = :s");
		$s->bindValue(":l",$_POST['login']);
		$s->bindValue(":s",hash('sha256',hash('sha256',$_POST['senha'])));
		$s->execute();
		
		if($s->rowCount() > 0){
			
			$s = $s->fetch();
			
			session_start();
			$_SESSION['id'] = $s['id'];
			
			echo "logado com sucesso";
			
		}else{
			
			echo "login ou senha errados";
			
		}
		
	}

?>