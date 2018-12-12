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
      if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
      {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        echo"<script language='javascript' type='text/javascript'>alert('Faça o login primeiro!');window.location.href='./index.php';</script>";
        }
       
      $logado = $_SESSION['login'];
    ?>
        <?php 
      include_once './mysql.php';

      //  Realiza a busca na base de dados isso
      $con = new Conexao();
      $link = $con->conexao();

      $id_rep = $_SESSION['id_republica'];

      $sql = $link->prepare("SELECT c.id_conta, t.nome_tipo, c.valor, c.data_venc FROM conta c, tipo_conta t WHERE t.id_tipo = c.id_tipo;");

      $sql->execute();
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REPGEMENT - altera</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="home.php">REPGEMENT</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
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
            <h6 class="dropdown-header">Dividas:</h6>
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
              <a href="home.php">Painel de Controle</a>
            </li>
            <li class="breadcrumb-item">
              <a href="divida.php">Dividas</a>
            </li>
            <li class="breadcrumb-item active">Alterar Divida</li>
          </ol>         

          <div class=" card bg-secondary mb-3 text-white card-header text-justify">
           Entre com o identificador da dívida para que em seguida possa ser realizado o processo de alteração. 
          </div>

          <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header text-center">Alterar Divida</div>
        <div class="card-body">
          <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <select class="col-md-12 col-md-12 form-control" name="id_conta">
                    <label for="firstCodigoInt">Codigo da Conta</label>
                      <option selected disabled="disabled">Selecione...</option>
                      <?php
                        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                          echo '<option value=' . $linha['id_conta'] . '>' . $linha['data_venc'] . ' - ' . $linha['nome_tipo'] . '</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <input type="submit" value="Pesquisar Conta" class="btn btn-primary btn-block" name="submit">
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php
      if(isset($_POST["submit"])){
        $cod = $_POST['id_conta'];

        if(empty($cod) || ($cod=="Selecione...")) {
          echo "<script language='javascript' type='text/javascript'>alert('Selecione uma opção!');</script>";
        } else {
          echo "<script language='javascript' type='text/javascript'> document.getElementById('formulario').style.display = 'block';</script>";

          $sql = $link->prepare("SELECT * FROM conta WHERE id_conta = $cod LIMIT 1;");
          $sql->execute();
          $linha = $sql->fetch(PDO::FETCH_ASSOC);
    ?>
         
    
    <div class="container" id="formulario">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header text-center">Alterar Conta</div>
            <div class="card-body">
                <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                      <div class="card-header text-center">Dados</div><br>
                      <div class="form-row">
                        <div class="">
                          <div class="form-label-group">
                              <input type="hidden" id="id" class="form-control" placeholder="id_conta" required="required" autofocus="autofocus" name="id_conta" value="<?php echo $linha['id_conta']; ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-label-group">
                            <label for="conta">Tipo de Conta</label>
                            <select class="col-md-12 col-md-12 form-control" name="id_tipo" id="id_tipo" >
                              <option selected disabled="disabled">Selecione...</option>
                              <option selected value="<?php echo $linha['id_tipo']; ?>">...</option>
                              <?php
                                $sql1 = $link->prepare("SELECT id_tipo, nome_tipo FROM tipo_conta ORDER BY nome_tipo;");
        
                                $sql1->execute();
                        
                                while ($linha1 = $sql1->fetch(PDO::FETCH_ASSOC)) {
                                  echo '<option value=' . $linha1['id_tipo'] . '>' . $linha1['nome_tipo'] . '</option>';
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-6">
                          <!--<label for="inputValor">Valor da Conta</label>-->
                          <div class="form-label-group">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                              </div>
                              <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="currency"  minlength="4" name="valor" required="required" autofocus="autofocus" value="<?php echo $linha['valor']; ?>"/>
                              <script type="text/javascript">$("#currency").maskMoney({thousands:'.', decimal:',', allowZero:true, suffix: ''});</script>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <label for="id_int">Codigo do Integrante</label>
                            <select class="col-md-12 col-md-12 form-control" name="id_integrante" id="id_int" >
                              <option selected disabled="disabled">Selecione...</option>
                              <option selected value="<?php echo $linha['id_integrante']; ?>">...</option>
                              <?php
                                $sql2 = $link->prepare("SELECT id_integrante, nome FROM integrante WHERE id_republica = $id_rep ORDER BY nome;");
      
                                $sql2->execute();

                                while ($linha2 = $sql2->fetch(PDO::FETCH_ASSOC)) {
                                  echo '<option value=' . $linha2['id_integrante'] . '>' . $linha2['nome'] . '</option>';
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <div class="form-label-group">
                            <input type="date" id="inputValor" class="form-control" placeholder="Data" name="data_venc" required="required" autofocus="autofocus" id="data" value="<?php echo $linha['data_venc']; ?>">
                            <label for="data">Data de Vencimento</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block" name="alterIntegrante">Alterar Conta</button>
                </form>
            </div>
        </div>
    </div>
    <?php
        }
      }
    ?>

    <?php
      if(isset($_POST["alterIntegrante"])){
        $cod = $_POST['id_conta'];
        $id_tipo = $_POST['id_tipo'];
        $money = $_POST['valor'];
        $valor = str_replace(',', '.', str_replace('.','',$money));
        $data_Nasc = new DateTime($_POST['data_venc']);
        $data = $data_Nasc->format('Y-m-d');
        $id_integrante = $_POST['id_integrante'];
        
        $sql1 = $link->prepare("UPDATE conta SET `id_tipo` = '$id_tipo', `valor` = '$valor', `data_venc` = '$data', `id_integrante` = '$id_integrante' WHERE `conta`.`id_conta` = '$cod';");
        
        // execute the query
        $sql1->execute();
    
        if($sql1->rowCount()){
          echo "<script language='javascript' type='text/javascript'>alert('Alteração Efetuada!');window.location.href='./alteraDivida.php';</script>";
        } else {
          echo mysql_error();
          echo "<script language='javascript' type='text/javascript'>alert('Error na Alteração!');</script>";
        }
      } 
    ?>
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
