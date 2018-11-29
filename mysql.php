<?php
    class Conexao {

    private $link;
    private $servername = "localhost";
    private $username = "u667552060_root";
    private $database = "u667552060_repgm";
    private $password = "host10";

    function __construct() {
        //  Versão WEB
        //  $this->link = new PDO("mysql:host=$servername;dbname=$database", "$username", "$password");
        
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function conexao() {
        if (!$this->link) {
            echo "Error: Conexão interrompida com MySQL." . PHP_EOL;
            return null;
        } else {
            //  echo "Sucesso!</br>";
            return $this->link;
        }
    }

    function busca($query) {
        $consulta = $this->link->prepare($query);
        $consulta->execute();
        $linha = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $linha;
    }

    }
?>