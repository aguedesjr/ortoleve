<?php 

# Arquivo de login do usuário no site

	session_start();
	$login = $_SESSION['login'];
	if (!isset($_SESSION["autenticado"])){

		header ("location:index.php");
		exit;
	}
	
	//Requer conexao previa com o banco
	require_once ("configs/conn.php");
	
	//if (isset($_POST["login"])){
	    //$login = utf8_decode($_POST["form_login"]);
	//};
	
	$data = date("m/y");
	//Conta a quantidade de usuários no sistema
	$sql = "SELECT categoria, cod, desconto, nome, valor_desc, valor_tab FROM `procedimento`";
	$resultado = mysqli_query($conn,$sql);	
	
	    
?>

<!DOCTYPE html>
<html lang="en">

  <head>

        <!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Ortoleve | Clínica de Odontologia Especializada" />
<meta name="keywords" content="ortoleve,odontologia,especializada,campos dos goytacazes,keyword5" />
<meta name="author" content="Ortoleve" />

    <title>Ortoleve | Clínica de Odontologia Especializada</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    
    <!-- CSS | Theme Color -->
	<link href="css/colors/theme-skin-color-set3.css" rel="stylesheet" type="text/css">
	
	
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="#">Ortoleve</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

       <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
          <div class="input-group-append">
            <!-- <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button> -->
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <?php include 'supbar.php';?>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php include 'menu.php';?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#" style="color:#ff7351;">Procedimentos</a>
            </li>
            <li class="breadcrumb-item active">Gerar PDF</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                  Usuários com vencimento no mês de 
                  <?php
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    echo strftime('%B de %Y', strtotime('today'));?>
             </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Nome</th>
                      <th>Categoria</th>
                      <th>Valor Tabelado</th>
                      <th>Desconto</th>
                      <th>Valor Desconto</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </tfoot>  -->
                  <tbody>
                    
                      <?php while($result = mysqli_fetch_array($resultado)) {
                      //Conta a quantidade de usuarios com vencimento naquele mes
                      $sql2 = "SELECT nome FROM `categoria` WHERE id = '$result[0]'";
                      $resultado2 = mysqli_query($conn,$sql2);
                      $result2 = mysqli_fetch_array($resultado2);
                        echo "<tr>";
                        echo "<td>".$result[1]."</td>";
                        echo "<td>".utf8_encode($result[3])."</td>";
                        echo "<td>".utf8_encode($result2[0])."</td>";
                        echo "<td>".$result[5]."</td>";
                        echo "<td>".$result[2]."</td>";
                        echo "<td>".$result[4]."</td>";
                        echo "</tr>";
                      }?>
                    
                  </tbody>
                </table>
                
              </div>
              
              <div class="container">
              
              <form method="post" action="pdf.php">
              <div class="form-group">
                      <div class="form-row">
						<div class="col-md-5"></div>
                        <div class="col-md-3">
                           	<input name="form_botcheck" class="form-control" type="hidden" value="" />
                        	<center><button type="submit" class="btn btn-theme-colored btn-block" style="bgcolor: '#ff7351'"> <i class="fa fa-file-pdf"></i> Gerar PDF</button></center>
                        </div>
                      </div>
              </div>
             </form>
             </div>
             
             
            </div>
            
          </div>

          

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include 'footer.php';?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'logout-modal.php';?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
