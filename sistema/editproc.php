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
	
	//Seleciona o nome das empresas
	$sql = "SELECT id, categoria, nome, valor_tab, valor_desc, desconto FROM `procedimento` WHERE cod = '$codigo'";
	$resultado = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($resultado);
	$linhas = mysqli_num_rows($resultado);
	
	//Seleciona o nome das empresas do resultado anterior
	$sql1 = "SELECT nome FROM `categoria` WHERE id = '$result[1]'";
	$resultado1 = mysqli_query($conn,$sql1);
	$result1 = mysqli_fetch_array($resultado1);
	
	//Seleciona o nome das empresas
	$sql2 = "SELECT id, nome FROM `categoria` ORDER BY ABS(nome);";
	$resultado2 = mysqli_query($conn,$sql2);
	//$result2 = mysqli_fetch_array($resultado2);
	
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
              <a href="#" style="color:#ff7351;">Procedimentos</a>
            </li>
            <li class="breadcrumb-item active">Editar Procedimento</li>
          </ol>

          <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-header">Informações dos Procedimentos</div>
                <div class="card-body">
                  <form method="post" action="includes/editprocbd.php" id="contact_form" name="contact_form">
                  	
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do Procedimento" value="<?php echo utf8_encode($result[2]);?>" />
                            <label for="nome">Nome do Procedimento</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Código" value="<?php echo $codigo;?>">
                            <label for="codigo">Código</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                          	
                          	
                          	<select id="categoria" name="categoria" class="form-control" placeholder="Categorias" required="required" style="height:3.1em;">
                          		<?php echo "<option value='".$result[1]."'>" . utf8_encode($result1[0]) . "</option>"; ?>
                          		<option>--------------</option>
                              		<?php while($row2 = mysqli_fetch_array($resultado2)) {
                              		    echo "<option value='".$row2[0]."'>" . utf8_encode($row2[1]) . "</option>";
                              		}?>
                          	</select>
                            
                            <!-- <input type="text" id="parceria" name="parceria" class="form-control" placeholder="Parceria" required="required">  -->
                          </div>
                        </div><link href="css/css-plugin-collections.css" rel="stylesheet"/>
                        
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="desconto" name="desconto" class="form-control" placeholder="Desconto" value="<?php echo utf8_encode($result[5]);?>" >
                            <label for="desconto">Desconto</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                    	<div class="form-row">
                        	<div class="col-md-6">
                              <div class="form-label-group">
                                <input type="text" id="valortab" name="valortab" class="form-control" data-thousands="." data-decimal="," placeholder="Valor Tabelado" value="<?php echo utf8_encode($result[3]);?>" >
                                <label for="valortab">Valor Tabelado</label>
                              </div>
                        	</div>
                            
                            <div class="col-md-6">
                              <div class="form-label-group">
                                <input type="text" id="valordesc" name="valordesc" class="form-control" data-thousands="." data-decimal="," placeholder="Valor com Desconto" value="<?php echo utf8_encode($result[4]);?>" >
                                <label for="valordesc">Valor com Desconto</label>
                              </div>
                        	</div>
                          </div>
                    
                    </div>
                    <!--<a class="btn btn-primary btn-block" href="caduserbd.php">Cadastrar</a>-->
                    <div class="form-group">
                    	<input name="form_botcheck" class="form-control" type="hidden" value="<?php echo utf8_encode($result[0]);?>" />
                        <button type="submit" class="btn btn-theme-colored btn-block" style="bgcolor: '#ff7351'" data-loading-text="Enviando...">Editar</button>
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
                        //$(form).find('.form-control').val(''); 
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
              <a href="#" style="color:#ff7351;">Procedimentos</a>
            </li>
            <li class="breadcrumb-item active">Excluir Procedimento</li>
          </ol>

          <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-header">Informação do Procedimento</div>
                <div class="card-body">
                  
                  	<div class="form-group">
                      <div class="form-label-group">
                        <center><p>Código informado não possui nenhum procedimento vinculado.....</p></center>
                      </div>
                    </div>
                    <div class="form-group">
                    	<a href="buscarprocdel.php" class="btn btn-theme-colored btn-block">Voltar</a>
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