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
	
	$codigo = $_POST["codigo"]; //Recebe o codigo do procedimento
	
	//Seleciona o nome dos usuários
	$sql = "SELECT id, nome, parceria, empresa, contrato, vencimento FROM `usuario` WHERE carteira = '$codigo'";
	$resultado = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($resultado);
	$linhas = mysqli_num_rows($resultado);
	
	//Seleciona o nome das parcerias
	$sql1 = "SELECT nome FROM `planos` WHERE id = '$result[2]'";
	$resultado1 = mysqli_query($conn,$sql1);
	$result1 = mysqli_fetch_array($resultado1);
	
	//Seleciona o nome das empresas
	$sql2 = "SELECT nome FROM `empresas` WHERE id = '$result[2]'";
	$resultado2 = mysqli_query($conn,$sql2);
	$result2 = mysqli_fetch_array($resultado2);
	
	if ($linhas > 0){
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
              <a href="#" style="color:#ff7351;">Usuários</a>
            </li>
            <li class="breadcrumb-item active">Excluir Usuário</li>
          </ol>

          <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-header">Informações do Usuário</div>
                <div class="card-body">
                  <form method="post" action="includes/deluserbd.php" id="contact_form" name="contact_form">
                  	<div class="form-group">
                      <div class="form-label-group">
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do Usuário" value="<?php echo utf8_encode($result[1]);?>" readonly="readonly">
                        <label for="nome">Nome do Usuário</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                          	<input type="text" id="empresa" name="empresa" class="form-control" placeholder="Empresa" value="<?php echo utf8_encode($result2[0]);?>" readonly="readonly">
                        	<label for="empresa">Empresa</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="contrato" name="contrato" class="form-control" placeholder="Contrato" value="<?php echo utf8_encode($result[4]);?>" readonly="readonly">
                            <label for="contrato">Contrato</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                          	<input type="text" id="parceria" name="parceria" class="form-control" placeholder="Parceria" value="<?php echo utf8_encode($result1[0]);?>" readonly="readonly">
                        	<label for="parceria">Parceria</label>
                            <!-- <input type="text" id="parceria" name="parceria" class="form-control" placeholder="Parceria" required="required">  -->
                            
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="carteira" name="carteira" class="form-control" placeholder="Carteria" value="<?php echo utf8_encode($codigo);?>" readonly="readonly">
                            <label for="carteira">Nº Carteira</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                    	<div class="form-row">
                        	
                            <div class="col-md-6">
                              <div class="form-label-group">
                                <input type="text" id="vencimento" name="vencimento" class="form-control" placeholder="vencimento" value="<?php echo utf8_encode($result[5]);?>" readonly="readonly">
                                <label for="vencimento">Vencimento</label>
                              </div>
                        	</div>
                          </div>
                    
                    </div>
                    <!--<a class="btn btn-primary btn-block" href="caduserbd.php">Cadastrar</a>-->
                    <div class="form-group">
                    	<input name="form_botcheck" class="form-control" type="hidden" value="<?php echo utf8_encode($result[0]);?>" />
                        <button type="submit" class="btn btn-theme-colored btn-block" data-loading-text="Enviando...">Excluir</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        
        <!-- User Form Validation-->
            <script>
              $("#contact_form").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status === 'true' ) {
                        $(form).find('.form-control').val(''); 
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
                      setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                  });
                }
              });
            </script>

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
<?php 
	} else {
?>
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
              <a href="#" style="color:#ff7351;">Usuários</a>
            </li>
            <li class="breadcrumb-item active">Excluir Usuário</li>
          </ol>

          <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-header">Informação do Usuário</div>
                <div class="card-body">
                  
                  	<div class="form-group">
                      <div class="form-label-group">
                        <center><p>Código informado não possui nenhum usuário vinculado.....</p></center>
                      </div>
                    </div>
                    <div class="form-group">
                    	<a href="buscaruserdel.php" class="btn btn-theme-colored btn-block">Voltar</a>
                    </div>
                  
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

<?php };?>