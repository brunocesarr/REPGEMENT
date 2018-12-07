<?php
  include_once './mysql.php';

  //  Realiza a busca na base de dados
  $con = new Conexao();
  $link = $con->conexao();

  $nome = ucfirst(strtolower($_POST['nome']));
  $sobrenome = ucfirst(strtolower($_POST['sobrenome']));
  $data_Nasc = new DateTime($_POST['data_Nasc']);
  $data = $data_Nasc->format('Y-m-d');
  $email = $_POST['email'];
  $username = $_POST['username'];
  $senha = $_POST['senha'];
  $nivel = $_POST['nivel'];
  $id_republica = $_POST['id_republica'];

  $link->beginTransaction();

  $sql = $link->prepare("INSERT INTO integrante(nome, sobrenome, data_Nasc, email, username, senha, nivel, id_republica) VALUES('$nome', '$sobrenome', '$data', '$email','$username','$senha','$nivel', '$id_republica');");
  
  $sql->bindParam(":nome", $nome, PDO::PARAM_STR); 
  $sql->bindParam(":sobrenome", $sobrenome, PDO::PARAM_STR); 
  $sql->bindParam(":data", $data, PDO::PARAM_STR); 
  $sql->bindParam(":email", $email, PDO::PARAM_STR); 
  $sql->bindParam(":username", $username, PDO::PARAM_STR); 
  $sql->bindParam(":senha", $senha, PDO::PARAM_STR); 
  $sql->bindParam(":nivel", $nivel, PDO::PARAM_STR);
  $sql->bindParam(":republica", $id_republica, PDO::PARAM_STR); 

  //  Verifica o acesso ao usuário e redireciona a página correta
  if(!$sql->execute()){
    //  Usuário não existe
    $link->commit();
    $link->rollback();
    echo"<script language='javascript' type='text/javascript'>alert('Erro no Cadastro.');</script>";
        //  header("Location:./index.html");
    if (isset($_POST['cadastrar'])){
      echo "<script language='javascript' type='text/javascript'>window.location.href='./register.php';</script>";
    }
    if (isset($_POST['addIntegrante'])){
      echo "<script language='javascript' type='text/javascript'>window.location.href='./addIntegrante.php';</script>";
    }    
  } else {
    $link->commit();
    echo"<script language='javascript' type='text/javascript'>alert('Cadastro Efetuado.');</script>";
    if (isset($_POST['cadastrar'])){
      echo "<script language='javascript' type='text/javascript'>window.location.href='./index.html';</script>";
    }
    if (isset($_POST['addIntegrante'])){
      echo "<script language='javascript' type='text/javascript'>window.location.href='./integrante.php';</script>";
    } 
  }
?>

