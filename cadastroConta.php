<?php
  include_once("./mysql.php");

  //  Realiza a busca na base de dados
  $con = new Conexao();
  $link = $con->conexao();

  $id_tipo = $_POST['id_tipo'];
  $valor = $_POST['valor'];
  $data_venc = $_POST['data_venc'];
  $id_integrante = $_POST['id_integrante'];

  $sql = $link->prepare("INSERT INTO conta(id_tipo, valor, data_venc, id_integrante) VALUES('$tipo', '$valor', '$data_venc', '$integrante');");
  $sql->bindParam(':tipo', $id_tipo, PDO::PARAM_STR); 
  $sql->bindParam(':valor', $valor, PDO::PARAM_STR); 
  $sql->bindParam(':data_venc', $data_venc, PDO::PARAM_STR); 
  $sql->bindParam(':integrante', $id_integrante, PDO::PARAM_STR); 
  $sql->execute();
  $linha = $sql->fetchObject();

  //  Verifica o acesso ao usuário e redireciona a página correta
  if(!$linha){
    //  Usuário não existe
    echo"<script language='javascript' type='text/javascript'>alert('Erro no Lançamento.');window.location.href='./lancamento.php';</script>";
        //  header("Location:./index.html");
  } else {
    echo"<script language='javascript' type='text/javascript'>alert('Lançamento Efetuado.');window.location.href='./lancamento.php';</script>";
  }
?>
