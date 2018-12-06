<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$data_Nasc = $_POST['data_Nasc'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$senha = $_POST['senha'];
	$nivel = $_POST['nivel'];
	$id_republica = $_POST['id_republica'];

    $sql = $link->prepare("INSERT INTO integrante(nome, sobrenome, data_Nasc, email, username, senha, nivel, id_republica) VALUES('$nome', '$sobrenome', '$data_Nasc', '$email', '$username','$senha','$nivel', '$id_republica');");

    $sql->bindParam(":nome", $nome, PDO::PARAM_STR); 
    $sql->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR); 
    $sql->bindParam(":data_Nasc", $data_Nasc, PDO::PARAM_STR);
    $sql->bindParam(":email", $email, PDO::PARAM_STR); 
    $sql->bindParam(":username", $username, PDO::PARAM_STR); 
    $sql->bindParam(":senha", $senha PDO::PARAM_STR); 
    $sql->bindParam(":nivel", $nivel, PDO::PARAM_STR); 
    $sql->bindParam(":id_republica", $id_republica, PDO::PARAM_STR); 

    if(!$sql->execute()) {
      echo"<script language='javascript' type='text/javascript'>alert('Cadastro não realizado.');window.location.href='./addIntegrante.php';</script>";
    } else {
      echo"<script language='javascript' type='text/javascript'>alert('Cadastro Realizado.');window.location.href='./integrante.php';</script>";
    }
?>
