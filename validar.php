<?php
	//	Inclui o arquivo de conexão com a base de dados.
	include_once './mysql.php';
	session_start();

	// Recupera o login 
	$post_login = $_POST['email']; 
	// Recupera a senha, a criptografando em MD5 
	$post_senha = $_POST['senha'];	

	//	Realiza a busca na base de dados
	$con = new Conexao();
	$link = $con->conexao();
	
	//	$sql = $link->prepare("SELECT f_validar(:login, :senha);");
	$sql = $link->prepare("SELECT * FROM integrante i WHERE i.email = :login AND i.senha = :senha;");
	$sql->bindParam(":login", $post_login, PDO::PARAM_STR);
	$sql->bindParam(":senha", $post_senha, PDO::PARAM_STR); 
	$sql->execute();
	$linha = $sql->fetchObject();
	
	//	Verifica o acesso ao usuário e redireciona a página correta
	if(!$linha){
		//	Usuário não existe
		unset ($_SESSION['login']);
  		unset ($_SESSION['senha']);
  		unset ($_SESSION['id_integrante']);
  		unset ($_SESSION['id_republica']);
		echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos.');window.location.href='./index.html';</script>";
        //	header("Location:./index.html");
	} else {
        $_SESSION['id_integrante'] = $linha->id_integrante;
        $_SESSION['id_republica'] = $linha->id_republica;
		$_SESSION['login'] = $linha->nome;
		$_SESSION['senha'] = $linha->senha;
		echo"<script language='javascript' type='text/javascript'>alert('Bem Vindo $linha->nome $linha->sobrenome.');window.location.href='./home.php';</script>";
	}
?>