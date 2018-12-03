<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <?php 
      /* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
       simplesmente não fazer o login e digitar na barra de endereço do seu navegador 
      o caminho para a página principal do site (sistema), burlando assim a obrigação de 
      fazer um login, com isso se ele não estiver feito o login não será criado a session, 
      então ao verificar que a session não existe a página redireciona o mesmo
       para a index.php.*/
      session_start();
      if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['id_integrante']) == true) and (!isset ($_SESSION['id_republica']) == true))
      {
        unset($_SESSION['id_integrante']);
        unset($_SESSION['id_republica']);
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        
        echo"<script language='javascript' type='text/javascript'>alert('Faça o login primeiro!');window.location.href='./index.html';</script>";
        }
       
      $logado = $_SESSION['login'];
    ?>
    <?php 
      include_once './mysql.php';

      //  Realiza a busca na base de dados isso
      $con = new Conexao();
      $link = $con->conexao();

      $cod_rep = $_SESSION['id_republica'];
      
      $sql = $link->prepare("SELECT id_republica, nome FROM republica WHERE id_republica = $cod_rep;");
      
      $sql->execute();

      $linha = $sql->fetch(PDO::FETCH_ASSOC);
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REPGEMENT - INTEGRANTE</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="home.php">REPGEMENT</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="POST" action="cadastrar.php">
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#"> </a>
            <a class="dropdown-item" href="#"><?php echo $logado ?> </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
        </li>
      </ul>
        </form>

    </nav>


    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Painel de controle</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Operações</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Contas:</h6>
            <a class="dropdown-item" href="lancamento.php">Lançamentos</a>
            <a class="dropdown-item" href="divida.php">Dívidas</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">República:</h6>
            <a class="dropdown-item" href="totalgasto.php">Gasto Total</a>
            <a class="dropdown-item" href="integrante.php">Integrantes</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Gráficos</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tabelas</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="home.html">Painel de Controle</a>
            </li>
            <li class="breadcrumb-item">
              <a href="integrante.html">Integrantes</a>
            </li>
            <li class="breadcrumb-item active">Integrantes</li>
          </ol>

   <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header text-center">Adicionar Integrante</div>
        <div class="card-body">
          <form method="POST" action="cadastrar.php">
            <div class="form-group">
              <div class="card-header text-center">Dados</div><br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" placeholder="Nome" name="nome" required="required" autofocus="autofocus">
                    <label for="firstName">Nome</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstSobrenome" class="form-control" placeholder="Sobrenome" name="sobrenome" required="required" autofocus="autofocus">
                    <label for="firstName">Sobrenome</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required="required" autofocus="autofocus">
                    <label for="firstName">E-mail</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="date" id="inputDate" class="form-control" placeholder="Data de Nascimento" required="required">
                    <label for="inputDate">Data de Nascimento</label>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstUsername" class="form-control" placeholder="Username" name="username" required="required" autofocus="autofocus">
                    <label for="firstUsername">Username</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputSenha" class="form-control" placeholder="Senha" name="senha" required="required">
                    <label for="inputSenha">Senha</label>
                  </div>
                </div>    
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                    <label for="inputRep">República Residente</label>
                    <div class="form-label-group">
                      <input class="form-control" id="disabledInput" placeholder="Campo desabilitado" readonly type="text"/>
                      <input type=hidden name=id_republica value="República Residente">
                    </div>
                </div>                
                <div class="col-md-6">
                    <label for="inputState">Tipo de Usuário</label>                  
                    <div class="form-label-group">
                    <select id="inputState" class="form-control form-control-lg" name="nivel">
                      <option selected disabled="disabled">Escolha...</option>
                      <option value="0">Comum</option>
                      <option value="1">Administrador</option>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <input type="submit" value="Registrar Integrante" class="btn btn-primary btn-block">
          </form>
        </div>
      </div>
    </div>

  </div>
        <!-- /.container-fluid -->

         <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © REPGEMENT 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Logout" se você estiver pronto para encerrar sua sessão atual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
