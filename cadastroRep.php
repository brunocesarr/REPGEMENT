<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $username = $_POST['username'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $num_integrante = $_POST['num_integrante'];

    $sql = $link->prepare("INSERT INTO republica(nome, ano, username, rua, numero, complemento, bairro, cidade, estado,num_integrante) VALUES('$nome', '$ano', '$username', '$rua','$numero','$complemento','$bairro','$cidade','$estado','$num_integrante');");

    $sql->bindParam(":nome", $nome, PDO::PARAM_STR); 
    $sql->bindParam(":ano", $ano, PDO::PARAM_STR); 
    $sql->bindParam(":username", $username, PDO::PARAM_STR);
    $sql->bindParam(":rua", $rua, PDO::PARAM_STR); 
    $sql->bindParam(":numero", $numero, PDO::PARAM_STR); 
    $sql->bindParam(":complemento", $complemento, PDO::PARAM_STR); 
    $sql->bindParam(":bairro", $bairro, PDO::PARAM_STR); 
    $sql->bindParam(":cidade", $cidade, PDO::PARAM_STR); 
    $sql->bindParam(":estado", $estado, PDO::PARAM_STR); 
    $sql->bindParam(":num_integrante", $num_integrante, PDO::PARAM_STR); 

    if(!$sql->execute()) {
      echo"<script language='javascript' type='text/javascript'>alert('Cadastro não realizado.');window.location.href='./registerRep.php';</script>";
    } else {
      echo"<script language='javascript' type='text/javascript'>alert('Cadastro Realizado.');window.location.href='./register.php';</script>";
    }
?>
