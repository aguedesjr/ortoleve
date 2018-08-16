<?php 

# Arquivo de login do usuário no site

	session_start();
	$login = $_SESSION['login'];
	if (!isset($_SESSION["autenticado"])){
		//<meta HTTP-EQUIV="REFRESH" content="0; url=http://www.cstsaraiva.com.br/cliente.php">
		header ("location:cliente.php");
		exit;
	}
	
	//Requer conexao previa com o banco
	require_once ("configs/conn.php");
	
	//if (isset($_POST["login"])){
	    //$login = utf8_decode($_POST["form_login"]);
	//};
	
	//Retorna as informações do usuário
	$sql = "SELECT nome, empresa, contrato, parceria, carteira, vencimento FROM usuario WHERE carteira = '$login';";
	$resultado = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($resultado);
	$linhas = mysqli_num_rows($resultado);
	
	//Retorna as informações da parceria
	$sql1 = "SELECT nome FROM planos WHERE id = '$result[3]';";
	$resultado1 = mysqli_query($conn,$sql1);
	$result1 = mysqli_fetch_array($resultado1);
	
	//Retorna as informações da empresa
	$sql2 = "SELECT nome FROM empresas WHERE id = '$result[1]';";
	$resultado2 = mysqli_query($conn,$sql2);
	$result2 = mysqli_fetch_array($resultado2);
	
	
	if ($linhas > 0){ //Verifica se encontrou algum usuário
	    
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Ortoleve | Clínica de Odontologia Especializada" />
<meta name="keywords" content="ortoleve,odontologia,especializada,campos dos goytacazes,keyword5" />
<meta name="author" content="Ortoleve" />

<!-- Page Title -->
<title>Ortoleve | Clínica de Odontologia Especializada</title>

<!-- Favicon and Touch Icons -->
<link href="images/icone.png" rel="shortcut icon" type="image/png">
<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link href="css/menuzord-megamenu.css" rel="stylesheet"/>
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-border-bottom.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<link href="fonts/fontawesome/css/fontawesome.css" rel="stylesheet" type="text/css">
 <link href="css/style.css" rel="stylesheet" type="text/css">

<!-- CSS | Theme Color -->
<link href="css/colors/theme-skin-color-set3.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img src="images/preloaders/1.gif" alt="">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Desabilitar Preloader</div>
  </div>
  
  <!-- Header -->
  <header id="header" class="header">
    <?php include 'menu.php';?>
  </header>

  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-theme-colored-6">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title text-white">Área do Cliente</h2>
              <!-- <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-theme-colored">Page Title</li>
              </ol>  -->
            </div>
          </div>
        </div>
      </div>
    </section>
 
    <!-- Divider: Contact -->
    <section class="divider">
      <div class="container">
        <div class="row pt-30">
          <div class="col-md-4">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-user text-theme-colored"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0">Nome:</h5>
                    <p><?php echo utf8_encode($result[0])?></p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="fa fa-building-o text-theme-colored"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0">Empresa:</h5>
                    <p><?php echo utf8_encode($result2[0])?></p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="fa fa-file-text-o text-theme-colored"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0">Contrato:</h5>
                    <p><?php echo utf8_encode($result[2])?></p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="fa fa-handshake text-theme-colored"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0">Parceria</h5>
                    <p><?php echo utf8_encode($result1[0])?></p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-credit text-theme-colored"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0">Nº Carteira</h5>
                    <p><?php echo utf8_encode($result[4])?></p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-date text-theme-colored"></i></a>
                  <div class="media-body">
                    <h5 class="mt-0">Vencimento</h5>
                    <p><?php echo utf8_encode($result[5])?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          	
              <div class="col-md-8">
                <h3 class="line-bottom mt-0 mb-30">
                    <table>
                    	<tr><td width="25%">Alterar Senha</td>
                    	<td align="right" width="75%"><a href="clientelogado.php" class="btn btn-theme-colored"><i class="fa fa-dollar-sign"></i> Preços</a></td>
                    	<td><p>&nbsp;</p></td>
                    	<td><a href="logout.php" class="btn btn-theme-colored"><i class="fa fa-sign-out"></i> Sair</a></td></tr>
                    </table>
                </h3>
                <!-- Contact Form -->
                
                <div class="col-md-8">
            
            
            <form id="contact_form" name="contact_form" class="" action="includes/altsenhabd.php" method="post">

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Nova Senha</label>
                    <input name="senha" class="form-control" type="password" placeholder="Nova Senha" required="" autofocus="autofocus">
                    <input name="login" type="hidden" value="<?php echo $login;?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Enviando...">Enviar</button>
                <!-- <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>-->
              </div>
            </form>

            <!-- Contact Form Validation-->
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
          </div>
              </div>
              
          

                  
          
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->

  <!-- Footer -->
  <?php include 'footer.php';?>
  
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

</body>
</html>

<?php }; ?>