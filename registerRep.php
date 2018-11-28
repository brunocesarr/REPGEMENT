<?php
$msg = '';
include_once("conexao.php");

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

$sql = "INSERT INTO republica(nome, ano, username, rua, numero, complemento, bairro, cidade, estado,num_integrante) VALUES('$nome', '$ano', '$username', '$rua','$numero','$complemento','$bairro','$cidade','$estado','$num_integrante')";
$salvar = mysqli_query($conexao, $sql);

echo $sql;
if($salvar){
  $msg = "Usuario cadastrado com sucesso!";
}else{
  $msg = "Ocorreu um erro no cadastro!";
}

//mysqli_affected_rows mostra quantas linhas foram afetadas no banco de dados
$linhas = mysqli_affected_rows($conexao);

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REPGEMENT - Registro</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">
    <?php if($msg): ?>
      <p><?php echo $msg; ?></p>
    <?php endif; ?>  
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header text-center">Registre-se</div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <div class="card-header text-center">Dados</div><br>              
              <div class="form-row">
                <div class="col-md-10">
                  <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" placeholder="Nome" name="nome"required="required" autofocus="autofocus">
                    <label for="firstName">Nome</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    <input type="number" id="inputYear" class="form-control" placeholder="Ano" name="ano"required="required" min="0">
                    <label for="inputYear">Ano</label>
                  </div>
                </div>
              </div>
              </div>
            </div>
             <div class="form-group">
               <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="inputYear" class="form-control" placeholder="Username" name="username" required="required">
                    <label for="inputYear">Username</label>
                  </div>
                </div>
            </div>
            <div class="form-group">
               <div class="col-md-4">
                  <div class="form-label-group">
                    <input type="number" id="inputYear" class="form-control" placeholder="NumIntegrante" name="numintegrante"required="required" min="0">
                    <label for="inputYear">Nº Integrantes</label>
                  </div>
                </div>
            </div>
            
            <div class="form-group">
              <div class="card-header text-center">Endereço</div><br>
              <div class="form-row">
                <div class="col-md-10">
                  <div class="form-label-group">
                    <input type="text" id="inputRua" class="form-control" placeholder="Rua" name="rua" required="required">
                    <label for="inputRua">Rua</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                    <input type="number" id="inputNumero" class="form-control" placeholder="Número" name="numero" required="required">
                    <label for="inputNumero">Número</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                    <input type="text" id="inputComplemento" class="form-control" placeholder="Complemento" name="complemento" required="required">
                    <label for="inputComplemento">Complemento</label>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-label-group">
                    <input type="text" id="inputBairro" class="form-control" placeholder="Bairro" name="bairro" required="required">
                    <label for="inputBairro">Bairro</label>
                  </div>
                </div>    
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-8">
                  <div class="form-label-group">
                    <input type="text" id="inputCidade" class="form-control" placeholder="Cidade" name="cidade" required="required">
                    <label for="inputCidade">Cidade</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <input type="text" id="inputEstado" class="form-control" placeholder="Estado" name="estado" required="required">
                    <label for="inputEstado">Estado</label>
                  </div>
                </div>
              </div>
            </div>
             <input type="submit" value="Registrar República" class="btn btn-primary btn-block">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="index.html">Logar</a>
            <a class="d-block small" href="forgot-password.html">Esqueceu a senha?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
