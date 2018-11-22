<?php
	class Conexao {

    private $link;

    function __construct() {
        //  $this->link = mysqli_connect("localhost", "root", "", "TPBDI");
        $this->link = new PDO("mysql:host=localhost;dbname=SistemaWEB", "root", "");
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