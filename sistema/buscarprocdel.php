<?php 

# Arquivo de login do usuário no site

	session_start();
	$login = $_SESSION['login'];
	if (!isset($_SESSION["autenticado"])){
		//<meta HTTP-EQUIV="REFRESH" content="0; url=http://www.cstsaraiva.com.br/cliente.php">
		header ("location:index.php");
		exit;
	}
	
	//Requer conexao previa com o banco
	require_once ("configs/conn.php");
	
	    
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
    
    <!-- external javascripts -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.form.js"></script> 
	
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

      <?php include 'menu.php';?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#" style="color:#ff7351;">Procedimentos</a>
            </li>
            <li class="breadcrumb-item active">Excluir Procedimento</li>
          </ol>

          <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-header">Informação do Procedimento</div>
                <div class="card-body">
                  <form method="post" action="delproc.php" id="contact_form" name="contact_form">
                  	<div class="form-group">
                      <div class="form-label-group">
                        <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Código do Procedimento" required="required" autofocus="autofocus">
                        <label for="codigo">Código do Procedimento</label>
                      </div>
                    </div>
                    <div class="form-group">
                    	<input name="form_botcheck" class="form-control" type="hidden" value="" />
                        <button type="submit" class="btn btn-theme-colored btn-block" data-loading-text="Enviando...">Buscar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        
        <!-- User Form Validation-->

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
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
