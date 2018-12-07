<?php
  include_once("./mysql.php");

  //  Realiza a busca na base de dados
  $con = new Conexao();
  $link = $con->conexao();

  $id_tipo = $_POST['id_tipo'];
  $valor = $_POST['valor'];
  $data_Nasc = new DateTime($_POST['data_venc']);
  $data = $data_Nasc->format('Y-m-d');
  $id_integrante = $_POST['id_integrante'];

  $sql = $link->prepare("INSERT INTO conta(id_tipo, valor, data_venc, id_integrante) VALUES('$id_tipo', '$valor', '$data', '$id_integrante');");

  $sql->bindParam(':tipo', $id_tipo, PDO::PARAM_STR); 
  $sql->bindParam(':valor', $valor, PDO::PARAM_STR); 
  $sql->bindParam(':data', $data, PDO::PARAM_STR); 
  $sql->bindParam(':integrante', $id_integrante, PDO::PARAM_STR); 
  
  //  Verifica o acesso ao usuário e redireciona a página correta
  if(!$sql->execute()){
    //  Usuário não existe
    echo"<script language='javascript' type='text/javascript'>alert('Erro no Lançamento.');window.location.href='./lancamento.php';</script>";
        //  header("Location:./index.html");
  } else {
    echo"<script language='javascript' type='text/javascript'>alert('Lançamento Efetuado.');window.location.href='./lancamento.php';</script>";
  }
?>