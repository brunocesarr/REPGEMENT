<?php
	//	Inclui o arquivo de conexão com a base de dados.
	include_once 'mysql.php';

	// Recupera o login 
	$email = (isset($_POST['email'])) ? $_POST['email'] : ''; 
	// Recupera a senha, a criptografando em MD5 
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';

	//	Realiza a busca na base de dados
	$con = new Conexao();
	$query = "SELECT f_validar3('$email','$senha');";
	$link = $con->conexao();
	$sql = $link->prepare($query);
	$sql->execute();
	$linha = $sql->fetchAll();

	echo "<pre>";

	print_r($linha);

	echo "</pre>";
	//	Verifica o acesso ao usuário e redireciona a página correta
	if($linha != null){
		session_start();
		header("Location:./home.html");
	} else {	
		echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
        die();
        header("Location:./index.html");
	}
?>