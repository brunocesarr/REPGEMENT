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

  $sql = $link->prepare("INSERT INTO integrante(nome, sobrenome, data_Nasc, email, username, senha, nivel, id_republica) VALUES(':nome', ':sobrenome', ':data', ':email',':username',':senha',':nivel',':republica');");
  
  $sql->bindParam(":nome", $nome, PDO::PARAM_STR); 
  $sql->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR); 
  $sql->bindParam(":data", $data_Nasc, PDO::PARAM_STR); 
  $sql->bindParam(":email", $email, PDO::PARAM_STR); 
  $sql->bindParam(":username", $username, PDO::PARAM_STR); 
  $sql->bindParam(":senha", $senha, PDO::PARAM_STR); 
  $sql->bindParam(":nivel", $nivel, PDO::PARAM_STR); 
  $sql->bindParam(":republica", $id_republica, PDO::PARAM_STR); 
  
  //  Verifica o acesso ao usuário e redireciona a página correta
  if(!$sql->execute()){
    //  Usuário não existe
    echo"<script language='javascript' type='text/javascript'>alert('Erro no Cadastro.');window.location.href='./Lançamento.php';</script>";
        //  header("Location:./index.html");
  } else {
    echo"<script language='javascript' type='text/javascript'>alert('Cadastro Efetuado.');window.location.href='./Lançamento.php';</script>";
  }
?>

