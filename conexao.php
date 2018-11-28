<?php

$host = "localhost";
$user = "root";
$password ="root";
$bd = "SistemaWEB";
$conexao = mysqli_connect($host, $user, $password, $bd);


if(!$conexao){
    echo "ERRO!!!";
}
?>