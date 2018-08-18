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
	
	//Conta a quantidade de usuários no sistema
	$sql = "SELECT COUNT(*) FROM `usuario`";
	$resultado = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($resultado);
	
	//Conta a quantidade de parcerias no sistema
	$sql1 = "SELECT COUNT(*) FROM `planos`";
	$resultado1 = mysqli_query($conn,$sql1);
	$result1 = mysqli_fetch_array($resultado1);
	
	//Conta a quantidade de usuarios com vencimento naquele mes
	$data = date("m/y");
	$sql2 = "SELECT COUNT(*) FROM `usuario` WHERE vencimento = '$data'";
	$resultado2 = mysqli_query($conn,$sql2);
	$result2 = mysqli_fetch_array($resultado2);
	
	//Conta a quantidade de empresas no sistema
	$sql3 = "SELECT COUNT(*) FROM `empresas`";
	$resultado3 = mysqli_query($conn,$sql3);
	$result3 = mysqli_fetch_array($resultado3);
	
	//$linhas = mysqli_num_rows($resultado);
	
	//Retorna as informações da parceria
	/*$sql1 = "SELECT nome FROM planos WHERE id = '$result[3]';";
	$resultado1 = mysqli_query($conn,$sql1);
	$result1 = mysqli_fetch_array($resultado1);*/
	
	
	//if ($linhas > 0){ //Verifica se encontrou algum usuário
	    
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
              <a href="#" style="color:#ff7351;">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Início</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-handshake"></i>
                  </div>
                  <div class="mr-5"><?php echo utf8_encode($result1[0])?> Parceria(s)</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <!-- <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>  -->
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-building"></i>
                  </div>
                  <div class="mr-5"><?php echo utf8_encode($result3[0])?> Empresa(s)</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5"><?php echo utf8_encode($result[0])?> Usuário(s)</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                  </div>
                  <div class="mr-5"><?php echo utf8_encode($result2[0])?> Usuário(s) Vencido(s)</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  
                </a>
              </div>
            </div>
          </div>

          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Gráfico de Usuários x Empresas</div>
            <div class="card-body">
              <canvas id="myBarChart" width="100%" height="30"></canvas> 
              <!-- <div id="chartContainer" style="height: 370px; width: 100%;"></div>-->
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>
          
          <!-- Codigo PHP para gerar o grafico -->
          <?php 
              
              $first = true;
              $count = 0;
              
              $sqlempresa = mysqli_query($conn, "SELECT nome, id FROM empresas;");
              
              while ($rowempresas = mysqli_fetch_array($sqlempresa))
              {
                  
                  $resultuser = mysqli_query($conn, "SELECT COUNT(*) FROM usuario WHERE empresa='$rowempresas[1]';");
                  
                  $rowuser = mysqli_fetch_array($resultuser);
                  
                  if (!$first) { $json .=  ','; } else { $first = false; }
                  
                  $json .= "'".utf8_encode($rowempresas[0])."'";
                  $json1 .= utf8_encode($rowuser[0]).",";
                  
                  if ($count < $rowuser[0]) {
                      $count = $rowuser[0];
                  }
                  
                  
              }

          ?>
          
          
          <!-- Script que monta o gráfico -->
 
          <script type="text/javascript">
          
            	window.onload = function () {
                	// Set new default font family and font color to mimic Bootstrap's default styling
                	Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                	Chart.defaults.global.defaultFontColor = '#292b2c';

                	function getRandomColor() {
                		  var letters = '0123456789ABCDEF';
                		  var color = '#';
                		  for (var i = 0; i < 6; i++) {
                		    color += letters[Math.floor(Math.random() * 16)];
                		  }
                		  return color;
                		}
    
                	// Bar Chart Example
                	var ctx = document.getElementById("myBarChart");
                	var myLineChart = new Chart(ctx, {
                	  type: 'bar',
                	  data: {
                	    //labels: ["January", "February", "March", "April", "May", "June"],
                	    labels: [<?php echo $json;?>],
                	    datasets: [{
                	      label: "Usuários",
                	      backgroundColor: [getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()
                	    	  , getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()],
                	      //borderColor: "rgba(2,117,216,1)",
                	      data: [<?php echo $json1;?>],
                	      //data: [100, 101, 90, 75, 50],
                	    }],
                	  },
                	  options: {
                	    scales: {
                	      xAxes: [{
                	        time: {
                	          unit: ''
                	        },
                	        gridLines: {
                	          display: false
                	        },
                	        ticks: {
                	          maxTicksLimit: <?php echo $result3[0];?>
                	        }
                	      }],
                	      yAxes: [{
                	        ticks: {
                	          min: 0,
                	          max: <?php echo $count;?>,
                	          maxTicksLimit: 5
                	        },
                	        gridLines: {
                	          display: true
                	        }
                	      }],
                	    },
                	    legend: {
                	      display: false
                	    }
                	  }
                	});
            	}            	
            
            </script>

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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <!-- <script src="js/demo/datatables-demo.js"></script> -->
    
    
	

  </body>

</html>
