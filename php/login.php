<?php

session_start();

function morreu(){
	die("sai daqui vagabundo!!!!");
}

function exists($v){
	return !(!isset($v) || empty($v));
}

if(!exists($_POST['login']) || !exists($_POST['senha']) || !exists($_POST['token'])){
	die("formulário incompleto");
}

$c = new PDO("mysql:host=localhost;dbname=morro_do_dende","root","");

$s = $c->prepare("INSERT INTO tentativa (ip,login,post_token,session_token) VALUES(:ip, :login, :post_token, :session_token)");
$s->bindValue(":ip",$_SERVER['REMOTE_ADDR']);
$s->bindValue(":login",$_POST['login']);
$s->bindValue(":post_token",$_POST['token']);

if(!exists($_SESSION['token'])){
	$s->bindValue(":session_token","");
	$s->execute();
	morreu();
}

$s->bindValue(":session_token",$_SESSION['token']);
$s->execute();

if($_SESSION['token'] != $_POST['token']){
	morreu();
}

$t = $c->query("SELECT CURRENT_TIMESTAMP as time")->fetch();
$t = $t['time'];
$t = date('Y-m-d H:i:s', strtotime('-15 minutes', strtotime($t)));

$check = $c->prepare("SELECT id FROM tentativa WHERE login=:login AND datahora BETWEEN :datahora AND CURRENT_TIMESTAMP");
$check->bindValue(":login",$_POST['login']);
$check->bindValue(":datahora",$t);
$check->execute();
if($check->rowCount() >= 5){
	echo "Limite de tentativas atingido<br>";
	morreu();
}

//	Passou
	
$s = $c->prepare("SELECT id FROM usuario WHERE login = :l AND senha = :s");
$s->bindValue(":l",$_POST['login']);
$s->bindValue(":s",hash('sha256',hash('sha256',$_POST['senha'])));
$s->execute();

if($s->rowCount() > 0){
	$s = $s->fetch();
	$_SESSION['id'] = $s['id'];
	echo "logado com sucesso";
}else{
	die("login ou senha errados");
}

?>
