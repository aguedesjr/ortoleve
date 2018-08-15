<?php
# Arquivo de verificacao de login e senha

//Requer conexao previa com o banco
require_once ("configs/conn.php");

// Obtem os dados do formulario de login
session_start();
$login = $_POST["form_login"]; //Recebe o login
$senha = $_POST["form_password"]; //Recebe a senha

// trata os dados recebidos;
//$login = str_replace(" ", "",$login);
//$login = str_replace("/","",$login);
//$login = str_replace(";","",$login);
//$senha = str_replace(" ", "",$senha);
//$senha = str_replace("/","",$senha);
//$senha = str_replace(";","",$senha);

// Busca no banco de dados o usuario informado
//$resultado = mysql_query("SELECT login, senha, perfil, nome FROM users WHERE login = '$login' AND senha = ENCRYPT('" .$senha. "', senha);");
$resultado = mysqli_query($conn, "SELECT login, senha FROM portal WHERE login = '$login' AND senha = ENCRYPT('" .$senha. "', senha);");
$linhas = mysqli_num_rows($resultado);

if ($linhas > 0){ //Verifica se encontrou algum usuário
    
  $row = mysqli_fetch_array($resultado);
  $_SESSION['autenticado']="sim";
  $_SESSION['login']=($row[0]);
  //$_SESSION['perfil']=($row[1]);
  //$_SESSION['nome']= mysql_result($resultado,0,"nome");
  //echo "<script>alert('Funcionou!!');</script>";
  header ("location:clientelogado.php");
}
else { ?>
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
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

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
  
  <div id="header" class="header">
  	<div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="widget text-white text-center">
              &nbsp;
            </div>
          </div>
          <div class="col-md-6">
            <div class="widget text-white">
              <!-- <ul class="list-inline pull-right flip sm-pull-none sm-text-center">
                <li><i class="fa fa-phone text-white"></i> Telefone: <a href="tel:2227342354" class="text-white">(22) 2734-2354</a></li>
                 <li><i class="fa fa-whatsapp text-white"></i> Whatsapp: <a href="tel:22998377312" class="text-white">(22) 99837-7312</a></li>
                <li><i class="fa fa-envelope-o text-white"></i> <a href="mailto:contato@ortoleve.com.br" class="text-white">contato@ortoleve.com.br</a></li>
              </ul>  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider bg-lighter">
      <div class="display-table">
        <div class="display-table-cell">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-push-3">
                <div class="text-center mb-60"><a href="#" class=""><img alt="" src="images/logo-menu.png"></a></div>
                <h4 class="text-theme-colored mt-0 pt-5"> Faça o Login</h4>
                <hr>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur elit.</p> -->
                <form name="login-form" action="login.php" class="clearfix" method="post">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_login">Login</label>
                      <input id="form_login" name="form_login" class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_password">Senha</label>
                      <input id="form_password" name="form_password" class="form-control" type="text">
                    </div>
                  </div>
                  <!-- <div class="checkbox pull-left mt-15">
                    <label for="form_checkbox">
                      <input id="form_checkbox" name="form_checkbox" type="checkbox">
                      Remember me </label>
                  </div> -->
                  <div class="form-group pull-right mt-10">
                    <button type="submit" class="btn btn-theme-colored btn-sm"><i class="fa fa-sign-in"></i> Login</button>
                  </div>
                  <!-- <div class="clear text-center pt-10">
                    <a class="text-theme-colored font-weight-600 font-12" href="#">Forgot Your Password?</a>
                  </div>
                  <div class="clear text-center pt-10">
                    <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15" href="#" data-bg-color="#3b5998">Login with facebook</a>
                    <a class="btn btn-dark btn-lg btn-block no-border" href="#" data-bg-color="#00acee">Login with twitter</a>
                  </div> -->
                  <p>Login Incorreto</p>
                </form>
              </div>
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