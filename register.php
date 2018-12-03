<!DOCTYPE html>
<html lang="en">

  <head>
    <?php 
      include_once './mysql.php';

      //  Realiza a busca na base de dados isso
      $con = new Conexao();
      $link = $con->conexao();

      $sql = $link->prepare("SELECT id_republica, nome FROM republica ORDER BY nome;");
      
      $sql->execute();
    ?>
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

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header text-center">Registre-se</div>
        <div class="card-body">
          <form method="POST" action="cadastrar.php">
            <div class="form-group">
              <div class="card-header text-center">Dados República</div><br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <div class="text-center">República residente:</div><br>
                    <select class="col-md-12 col-md-12 form-control" name="id_republica">
                      <?php
                        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                          echo '<option value=' . $linha['id_republica'] . '>' . $linha['nome'] . '</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group medium text-center alert">
                    Sua república não está cadastradada? <a class="" href="registerRep.php">Cadastre-a</a>.
                  </div>
                </div>
              </div>
              <br>
            </div>
            <div class="form-group">
              <div class="card-header text-center">Dados Pessoais</div><br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="firstName">Nome</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">
                    <label for="lastName">Sobrenome</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="date" id="inputDate" class="form-control" placeholder="Data de Nascimento" required="required">
                    <label for="inputDate">Data de Nascimento</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="card-header text-center">Dados Usuário</div><br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group larger text-center">
                    Nível do Usuário:
                  </div>
                </div>                
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select class="col-md-12 col-md-12 form-control" name="nivel">
                      <option value="1">Administrador</option>
                      <option value="0">Comum</option>
                    </select>
                  </div>
                </div>
              </div>
              </br>
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="text" id="inputText" class="form-control" placeholder="Username" required="required">
                    <label for="inputText">Username</label>
                  </div>
                </div>
              </div>  
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Senha</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirme a Senha</label>
                  </div>
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Registrar"/>
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
