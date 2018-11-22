<?php
	//	Inclui o arquivo de conexão com a base de dados.
	include_once 'mysql.php';

	// Recupera o login 
	$post_login = $_POST['email']; 
	// Recupera a senha, a criptografando em MD5 
	$post_senha = $_POST['senha'];	

	//	Realiza a busca na base de dados
	$con = new Conexao();
	$link = $con->conexao();
	//	$sql = $link->prepare("SELECT f_validar3(:login, :senha);");
	$sql = $link->prepare("SELECT * FROM integrante i WHERE i.email = :login AND i.senha = :senha;");
	$sql->bindParam(':login', $post_login, PDO::PARAM_STR);
	$sql->bindParam(':senha', $post_senha, PDO::PARAM_STR); 
	$sql->execute();
	$linha = $sql->fetchObject();

	//	Verifica o acesso ao usuário e redireciona a página correta
	if(!$linha){
		//	Usuário não existe
		echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos.');window.location.href='index.html';</script>";
        die();
        header("Location:./index.html");
	} 
		session_start();
		$_SESSION['user'] = $linha;
		header("Location: ./home.html");
?>